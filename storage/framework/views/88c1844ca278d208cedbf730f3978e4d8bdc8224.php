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
    <div class="content-wrap">
        <div class="container clearfix">
            <div style="position: relative;">
                <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" class="contact-image">
                <div class="contact-section dark bg-color">
                    <div class="p-5 p-lg-0" style="font-size: 15px; line-height: 1.7;">
                        <address style="line-height: 1.7;">
                            <span class="fw-light"><?php echo app('translator')->get('address'); ?>:</span><br>
                            <span class="h6 text-white ls1 fw-normal">
                                <?php echo $web_information->information->address ?? ''; ?>

                            </span>
                        </address>
                        <span class="fw-light"><?php echo app('translator')->get('phone'); ?>:</span><br>
                        <a href="tel:<?php echo $web_information->information->phone ?? ''; ?>" class="h6 text-white ls1 fw-normal"><?php echo $web_information->information->phone ?? ''; ?></a><br><br>

                        <span class="fw-light">Email:</span><br>
                        <a href="mailto:<?php echo $web_information->information->email ?? ''; ?>"
                            class="h6 text-white ls1 fw-normal"><?php echo $web_information->information->email ?? ''; ?></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\raovat\resources\views/frontend/blocks/banner/styles/contactImg.blade.php ENDPATH**/ ?>