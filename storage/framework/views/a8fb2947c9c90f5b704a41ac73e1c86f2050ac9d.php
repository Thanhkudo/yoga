<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $background = $block->image_background != '' ? $block->image_background : url('assets/img/banner.jpg');
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        
        $params['status'] = App\Consts::POST_STATUS['active'];
        $params['is_featured'] = true;
        $params['is_type'] = App\Consts::POST_TYPE['post'];
        $rows = App\Http\Services\ContentService::getCmsPost($params)
            ->limit(3)
            ->get();
    ?>


    

    <div class="our-discover">
        <div class="container">
            <div class="our-discover-tittle">
                <span><?php echo e($url_link); ?></span>
                <p><?php echo e($title); ?></p>
            </div>
            <div class="row d-flex justify-content-between our-discover-content">
                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $title = $item->json_params->title->{$locale} ?? $item->title;
                        $name_admin = $item->name ?? '';
                        $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                        $content = $item->json_params->content->{$locale} ?? $item->content;
                        $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                        $date = date('d', strtotime($item->created_at));
                        $month = date('m', strtotime($item->created_at));
                        $year = date('Y', strtotime($item->created_at));
                        // Viet ham xu ly lay slug
                        $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
                        $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
                    ?>
                    <div class="col-12 col-md-4 p-md-4">
                        <div class="row">
                            <div class="content-img col-5 col-md-12">
                                <img src="<?php echo e($image); ?>" alt="" />
                            </div>
                            <div class="content col-7 col-md-12">
                                <span><?php echo e($brief); ?></span>
                                <p><?php echo e($title); ?></p>
                                <div class="button-read-more d-none d-md-flex">
                                    <button>Read More</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\FHM\yoga\resources\views/frontend/blocks/cms_post/styles/default.blade.php ENDPATH**/ ?>