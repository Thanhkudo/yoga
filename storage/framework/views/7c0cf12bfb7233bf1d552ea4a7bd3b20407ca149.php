<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $background = $block->image_background != '' ? $block->image_background : url('assets/img/banner.jpg');
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;

        $params['status'] = App\Consts::POST_STATUS['active'];
        $params['is_featured'] = true;
        $params['is_type'] = App\Consts::POST_TYPE['service'];

        $rows = App\Http\Services\ContentService::getCmsPost($params)
            ->limit(3)
            ->get();
    ?>

    <div class="container topmargin-lg clearfix">
        <div class="row">
            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $title = $item->json_params->title->{$locale} ?? $item->title;
                    $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                    $content = $item->json_params->content->{$locale} ?? $item->content;
                    $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                    // $date = date('H:i d/m/Y', strtotime($item->created_at));
                    $date = date('d', strtotime($item->created_at));
                    $month = date('M', strtotime($item->created_at));
                    $year = date('Y', strtotime($item->created_at));
                    // Viet ham xu ly lay slug
                    $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
                    $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
                ?>
                <div class="col-md-4 center bottommargin-lg">
                    <div class="feature-box media-box">
                        <div class="fbox-media" style="padding: 0 40px;">
                            <a href="<?php echo e($alias); ?>"><img class="rounded-circle img-thumbnail"
                                    src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>"><span><?php echo e($title); ?></span>
                                
                            </a>
                        </div>
                        <div class="fbox-content">
                            <h3><span class="ls0 subtitle font-primary"><?php echo e(Str::limit($brief, 100)); ?></span></h3>
                            <p><?php echo $content; ?></p>
                            <a href="<?php echo e($alias); ?>" class="more-link text-uppercase ls1 fw-bold"
                                style="margin: 20px 0 0 0; font-style: normal;">Read More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\barber\resources\views/frontend/blocks/cms_post/styles/default.blade.php ENDPATH**/ ?>