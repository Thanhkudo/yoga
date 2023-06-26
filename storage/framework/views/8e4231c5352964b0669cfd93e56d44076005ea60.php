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
    <section class="section_slider">
        <div class="home-slider swiper-container">
            <div class="swiper-wrapper">
                <?php if($block_childs): ?>
                    <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                            $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                            $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                            $image = $item->image != '' ? $item->image : null;
                            $image_background = $item->image_background != '' ? $item->image_background : null;
                            $url_link = $item->url_link != '' ? $item->url_link : '';
                            $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                            $image_for_screen = null;
                            if ($agent->isDesktop() && $image_background != null) {
                                $image_for_screen = $image_background;
                            } else {
                                $image_for_screen = $image;
                            }
                            
                        ?>
                        <div class="swiper-slide">
                            <a href="#" class="clearfix" title="<?php echo e($title_childs); ?>">
                                <img src="<?php echo e($image_for_screen); ?>" alt="<?php echo e($title_childs); ?>">
                            </a>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\yoga\resources\views/frontend/blocks/banner/styles/slide.blade.php ENDPATH**/ ?>