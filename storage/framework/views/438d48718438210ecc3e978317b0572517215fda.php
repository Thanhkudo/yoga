<?php if($block): ?>
    <?php

        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image_old = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';

        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });

        $items = [];
        $i = 0;
        foreach ($block_childs as $item) {
            $items[$i] = $item;
            $i++;
        }

    ?>
    <div class="section mt-5 clearfix">
        <div class="container clearfix">
            <div class="row mw-100 clearfix">
                <div class="col-md-5">
                    <div class="heading-block border-bottom-0">
                        <h3 class="mb-3"><?php echo e($title); ?></h3>
                    </div>

                    <div class="accordion accordion-bg">
                        <?php if($block_childs): ?>
                            <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $title = $item->json_params->title->{$locale} ?? $item->title;
                                    $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                                    $content = $item->json_params->content->{$locale} ?? $item->content;
                                    $image = $item->image != '' ? $item->image : null;
                                    $image_background = $item->image_background != '' ? $item->image_background : null;
                                    $video = $item->json_params->video ?? null;
                                    $video_background = $item->json_params->video_background ?? null;
                                    $url_link = $item->url_link != '' ? $item->url_link : '';
                                    $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                                    $icon = $item->icon != '' ? $item->icon : '';
                                    $style = isset($item->json_params->style) && $item->json_params->style == 'slider-caption-right' ? 'd-none' : '';
                                    $image_for_screen = null;
                                    if ($agent->isDesktop() && $image_background != null) {
                                        $image_for_screen = $image_background;
                                    } else {
                                        $image_for_screen = $image;
                                    }

                                ?>
                                <div class="accordion-header">
                                    <div class="accordion-icon">
                                        <i class="accordion-closed icon-ok-circle"></i>
                                        <i class="accordion-open icon-remove-circle"></i>
                                    </div>
                                    <div class="accordion-title">
                                        <?php echo e($title); ?>

                                    </div>
                                </div>
                                <div class="accordion-content"><?php echo e($content); ?>

                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6 ms-auto">
                    <img src="<?php echo e($image_old); ?>" alt="Image">
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/fhmagency/domains/fhmagency.vn/public_html/bds/resources/views/frontend/blocks/custom/styles/about_us.blade.php ENDPATH**/ ?>