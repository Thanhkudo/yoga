<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $image = $block->image != '' ? $block->image : null;
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';

        $image_for_screen = null;
        if ($agent->isDesktop() && $image_background != null) {
            $image_for_screen = $image_background;
        } else {
            $image_for_screen = $image;
        }

        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });

    ?>
    <section id="page-title" class="page-title-parallax page-title-dark page-title-center include-header include-topbar"
    style="background: url('<?php echo e($image_for_screen); ?>') no-repeat center center / cover; padding: 140px 0;" data-center="background-position: 0px 50%;" data-top-bottom="background-position:0px 0px;">

        <div class="container clearfix">
            <h1><?php echo e($title); ?></h1>
        </div>

        <div class="video-wrap" style="position: absolute; top: 0; left: 0; height: 100%; z-index:1;">
                <div class="video-overlay" style="background: rgba(0,0,0,0.3);"></div>
            </div>

    </section>
<?php endif; ?>
<?php /**PATH /home/fhmagency/domains/fhmagency.vn/public_html/bds/resources/views/frontend/blocks/banner/styles/image.blade.php ENDPATH**/ ?>