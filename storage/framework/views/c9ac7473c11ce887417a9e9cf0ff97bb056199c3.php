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
    <div class="container">
        <div class="promo promo-dark bg-color bottommargin-lg p-4">
            <div class="row align-items-center">
                <div class="col-12 col-lg">
                    <h3 class="fw-normal ls1"><?php echo e($title); ?></h3>
                </div>
                <div class="col-12 col-lg-auto mt-4 mt-lg-0">
                    <a href="<?php echo e($url_link); ?>"
                        class="button button-dark button-large button-rounded m-0"><?php echo e($url_link_title); ?></a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\maison\resources\views/frontend/blocks/banner/styles/contact.blade.php ENDPATH**/ ?>