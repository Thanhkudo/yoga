<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
        
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>


    <section id="box_list" class="mb-5">
        <div class="d-flex align-items-center justify-content-between padding w-100">
            <div class="col-12 col-lg-6">
                <div class="frame">
                    <?php if($block_childs): ?>
                        <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $title_child = $item->json_params->title->{$locale} ?? $item->title;
                                $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                                $content_child = $item->json_params->content->{$locale} ?? $item->content;
                                $image_child = $item->image != '' ? $item->image : null;
                                $url_link = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
                                $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                                $icon = $item->icon != '' ? $item->icon : '';
                                $style = $item->json_params->style ?? '';
                            ?>

                            <div class="box_item">
                                <div class="item">
                                    <svg width="47" height="48" viewBox="0 0 47 48" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M23.5356 9.1351L11.7856 18.0716L23.5356 27.0081L11.7856 35.9446L0 26.9233L11.7767 17.9868L0 9.1351L11.7767 0.198608L23.5356 9.1351ZM11.7144 38.7538L23.4644 29.8173L35.2144 38.7538L23.4644 47.6903L11.7144 38.7538ZM23.5356 26.9233L35.2856 17.9868L23.5356 9.12449L35.2233 0.198608L47 9.1351L35.2233 18.0716L47 26.9975L35.2233 35.934L23.5356 26.9233Z"
                                            fill="#C1E3E5" />
                                    </svg>
                                    <span class="text-uppercase"><?php echo e($title_child); ?></span>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12 col-lg-6 d-none d-lg-flex box-img">
                <div class="img">
                    <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" />
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\yoga\resources\views/frontend/blocks/custom/styles/core_value.blade.php ENDPATH**/ ?>