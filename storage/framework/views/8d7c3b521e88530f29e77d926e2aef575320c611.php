<?php if($block): ?>
    <?php
        
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : $web_information->image->background_breadcrumbs ?? '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $image_for_screen = null;
        if ($agent->isDesktop() && $image_background != null) {
            $image_for_screen = $image_background;
        } else {
            $image_for_screen = $image;
        }
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
        
    ?>



    <section class="about_us mb_page_title">
        <?php if($block_childs): ?>
            <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $title_child = $item->json_params->title->{$locale} ?? $item->title;
                    $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                    $content_child = $item->json_params->content->{$locale} ?? $item->content;
                    $image_child = $item->image != '' ? $item->image : null;
                    $backgruod_child = $item->image_background != '' ? $item->image_background : null;
                    $url_link = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
                    $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                    $icon = $item->icon != '' ? $item->icon : '';
                    $style = $item->json_params->style ?? '';
                ?>
                <div class="items" style=" background: url(<?php echo e($backgruod_child); ?>); background-size: 100% 100%; ">
                    <div class="container">
                        <div class="d-flex flex-wrap <?php echo e($style); ?> align-items-lg-center ">
                            <div class="col-12 col-lg-6">
                                <div class="content">
                                    <h3 class="title">
                                        <?php echo $brief_child; ?>

                                    </h3>
                                    <div class="box_bref text-justify">
                                        <?php echo $content_child; ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 img">
                                <img src="<?php echo e($image_child); ?>" alt="<?php echo e($title_child); ?>" />
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        

        
    </section>
<?php endif; ?>
<?php /**PATH D:\FHM\yoga\resources\views/frontend/blocks/custom/styles/about_us.blade.php ENDPATH**/ ?>