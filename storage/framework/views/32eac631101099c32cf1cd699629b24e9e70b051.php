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
            ->limit(6)
            ->get();
    ?>


    <section class="section-padding container blog mt_page_title">
        <div class="box_frame">
            <div class="box_title text-center mb-3 mb-lg-5">
                <h2 class="title text-uppercase"><?php echo e($title); ?></h2>
            </div>

            <div class="section-container">
                <div class="d-flex flex-wrap">
                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $title = $item->json_params->title->{$locale} ?? $item->title;
                            $name_admin = $item->name ??'';
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
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 p-3 p-md-4">
                            <div class="post-entry clearfix post-wapper">
                                <div class="post-image img">
                                    <a href="<?php echo e($alias); ?>">
                                        <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" />
                                    </a>
                                </div>
                                <div class="post-content">
                                    <div class="post-author">Viết bởi: <?php echo e($name_admin); ?></div>
                                    <hr class="post-line" />
                                    <h2 class="post-title">
                                        <a href="<?php echo e($alias); ?>"><?php echo e($title); ?></a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\yoga\resources\views/frontend/blocks/cms_post/styles/default.blade.php ENDPATH**/ ?>