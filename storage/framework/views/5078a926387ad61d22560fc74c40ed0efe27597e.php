<?php if($block): ?>
    <?php
        
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
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

    <div class="our-featured">
        <div class="container">
            <div class="form-our-featured d-flex flex-column">
                <div class="our-featured-content d-flex flex-column">
                    <span class="our-featured-content-top"><?php echo e($title); ?></span>
                    <span class="our-featured-content-bottom"><?php echo e($brief); ?></span>
                    <div class="content">
                        <?php echo $content; ?>

                    </div>
                </div>
                <div class="d-flex d-flex justify-content-between row">
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

                            <div class="col-6 col-md-3 box-icon-our-featured d-flex flex-column">
                                <div class="icon-our-featured d-flex align-items-center justify-content-center">
                                    <?php echo $icon; ?>

                                </div>
                                <div class="title-box-icon-our-featured">
                                    <span><?php echo e($title_child); ?></span>
                                    <p><?php echo e($brief_child); ?></p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\FHM\yoga\resources\views/frontend/blocks/custom/styles/our_featured.blade.php ENDPATH**/ ?>