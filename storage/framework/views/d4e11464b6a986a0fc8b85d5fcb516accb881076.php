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

<div class="container clearfix content-wrap mb-0 pb-0">

    <div class="heading-block border-0 mw-100">
        <h2 class="mb-4"><?php echo e($brief); ?></h2>
        <p class="lead"><?php echo e($content); ?></p>
    </div>

    <div class="row clearfix">
        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $title = $item->json_params->title->{$locale} ?? $item->title;
                $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                $content = $item->json_params->content->{$locale} ?? $item->content;
                $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                $date = date('d', strtotime($item->created_at));
                $month = date('M', strtotime($item->created_at));
                $year = date('Y', strtotime($item->created_at));
                // Viet ham xu ly lay slug
                $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
                $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
            ?>
            <div class="col-md-4 bottommargin">
                <div class="card">
                    <img class="card-img-top" src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo e($title); ?></h4>
                        <p class="card-text mb-4"><?php echo e($brief); ?></p>
                        <a href="<?php echo e($alias); ?>" class="button button-3d button-rounded m-0">Xem thêm</a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\raovat\resources\views/frontend/blocks/cms_post/styles/default.blade.php ENDPATH**/ ?>