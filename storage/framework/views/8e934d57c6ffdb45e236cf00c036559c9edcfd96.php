<?php if($block): ?>
    <?php

        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $video = $block->json_params->video ?? null;
        $video_background = $block->json_params->video_background ?? null;
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });

    ?>

<section id="slider" class="slider-element min-vh-60 min-vh-md-100 dark include-header include-topbar">
    <div class="slider-inner">
        <div class="fslider h-100 position-absolute" data-speed="3000" data-pause="7500" data-animation="fade" data-arrows="false" data-pagi="false" style="background-color: #333;">
            <div class="flexslider">
                <div class="slider-wrap">
                    <?php if($block_childs): ?>
                        <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                                $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                                $content_childs = $item->json_params->content->{$locale} ?? $item->content;
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
                            <div class="slide" style="background: url('<?php echo e($image); ?>') center center; background-size: cover;"></div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="vertical-middle">
            <div class="container text-center">
                <div class="emphasis-title m-0">
                    <h1><?php echo e($brief); ?></h1>
                    <span class="fw-light text-uppercase" style="font-size: 18px; letter-spacing: 10px; color: rgba(255,255,255,0.9);"><?php echo e($content); ?></span>
                </div>
            </div>
        </div>

        <div class="video-wrap">
            <div class="video-overlay real-estate-video-overlay"></div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php /**PATH /home/fhmagency/domains/fhmagency.vn/public_html/bds/resources/views/frontend/blocks/banner/styles/slide.blade.php ENDPATH**/ ?>