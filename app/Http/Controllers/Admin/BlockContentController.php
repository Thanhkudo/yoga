<?php

namespace App\Http\Controllers\Admin;

use App\Consts;
use App\Http\Services\PageBuilderService;
use App\Models\Block;
use App\Models\BlockContent;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlockContentController extends Controller
{
    public function __construct()
    {
        $this->routeDefault  = 'block_contents';
        $this->viewPart = 'admin.pages.block_contents';
        $this->responseData['module_name'] = __('Block Management');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        $params = $request->all();
        $this->responseData['params'] = $params;

        $params['order_by'] = [
            'status' => 'ASC',
            'iorder' => 'ASC',
            'id' => 'DESC'
        ];

        $rows = PageBuilderService::getBlockContent($params)->get();
        $this->responseData['rows'] =  $rows;

        // Get all blocks which have status is active
        $blocks = Block::where('status', 'active')->orderByRaw('iorder ASC, id DESC')->get();
        $this->responseData['blocks'] = $blocks;

        return $this->responseView($this->viewPart . '.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get all parents which have status is active
        $parents = BlockContent::where('status', 'active')->orderByRaw('iorder ASC, id DESC')->get();

        // Get all blocks which have status is active
        $blocks = Block::where('status', 'active')->orderByRaw('iorder ASC, id DESC')->get();

        $this->responseData['parents'] = $parents;
        $this->responseData['blocks'] = $blocks;

        return $this->responseView($this->viewPart . '.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'block_code' => 'required|max:255'
        ]);

        $params = $request->all();

        $params['admin_created_id'] = Auth::guard('admin')->user()->id;
        $params['admin_updated_id'] = Auth::guard('admin')->user()->id;
        
        BlockContent::create($params);
        if(isset($params['parent_id'])){
            return redirect()->back()->with('successMessage', __('Add new successfully!'));
        }
        return redirect()->route($this->routeDefault . '.index')->with('successMessage', __('Add new successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlockContent  $blockContent
     * @return \Illuminate\Http\Response
     */
    public function show(BlockContent $blockContent)
    {
        // Do not use this function
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlockContent  $blockContent
     * @return \Illuminate\Http\Response
     */
    public function edit(BlockContent $blockContent)
    {
        // Get all parents which have status is active
        $parents = BlockContent::where('status', 'active')->where('id', '!=', $blockContent->id)->orderByRaw('iorder ASC, id DESC')->get();

        $parents_child = BlockContent::where('status', 'active')->orderByRaw('iorder ASC, id DESC')->get();
        // Get all child which have status is active
        $child = BlockContent::where('status','!=', 'delete')->where('parent_id', $blockContent->id)->orderByRaw('iorder ASC, id DESC')->get();
        // Get all blocks which have status is active
        $blocks = Block::where('status', 'active')->orderByRaw('iorder ASC, id DESC')->get();

        $this->responseData['parents'] = $parents;
        $this->responseData['status'] = Consts::STATUS;
        $this->responseData['blocks'] = $blocks;
        $this->responseData['child'] = $child;
        $this->responseData['detail'] = $blockContent;
        $this->responseData['parents_child'] = $parents_child;
        return $this->responseView($this->viewPart . '.edit.'.$blockContent->block_code);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlockContent  $blockContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlockContent $blockContent)
    {
        $request->validate([
            'title' => 'required|max:255',
            'block_code' => 'required|max:255'
        ]);
        $params = $request->all();

        $params['admin_updated_id'] = Auth::guard('admin')->user()->id;

        $blockContent->fill($params);
        $blockContent->save();

        return redirect()->back()->with('successMessage', __('Successfully updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlockContent  $blockContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlockContent $blockContent)
    {
        // Update status to delete
        $blockContent->status = Consts::STATUS_DELETE;
        $blockContent->save();

        // Delete sub
        DB::table('tb_block_contents')->where('parent_id', '=', $blockContent->id)->update(['status' => Consts::STATUS_DELETE]);

        return redirect()->back()->with('successMessage', __('Delete record successfully!'));
    }

    /**
     * Get all block_content by params
     */
    public function getBlockContentsByTemplate(Request $request)
    {
        try {
            $request->validate([
                'template' => 'required|string|max:255'
            ]);
            $params = $request->only('template');
            $params['status'] = Consts::STATUS['active'];
            $params['order_by'] = [
                'iorder' => 'ASC',
                'id' => 'DESC'
            ];

            $rows = PageBuilderService::getBlockContent($params)->where('tb_block_contents.parent_id', NULL)->get();

            if (count($rows) > 0) {
                return $this->sendResponse($rows, 'success');
            }

            return $this->sendResponse('', __('No records available!'));
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function updateSort(Request $request)
    {
        $data = request('menu') ?? [];
        $root_id = request('root_id') ?? null;
        $reSort = json_decode($data, true);
        $newTree = [];
        foreach ($reSort as $key => $level_1) {
            $newTree[$level_1['id']] = [
                'parent_id' => $root_id,
                'iorder' => ++$key,
            ];
            if (!empty($level_1['children'])) {
                $list_level_2 = $level_1['children'];
                foreach ($list_level_2 as $key => $level_2) {
                    $newTree[$level_2['id']] = [
                        'parent_id' => $level_1['id'],
                        'iorder' => ++$key,
                    ];
                    if (!empty($level_2['children'])) {
                        $list_level_3 = $level_2['children'];
                        foreach ($list_level_3 as $key => $level_3) {
                            $newTree[$level_3['id']] = [
                                'parent_id' => $level_2['id'],
                                'iorder' => ++$key,
                            ];
                        }
                    }
                }
            }
        }
        $response = (new BlockContent)->reSort($newTree);
        return $response;
    }
}
