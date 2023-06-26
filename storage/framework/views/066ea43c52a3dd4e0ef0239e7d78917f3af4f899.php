<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
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
    <div id="testimonial" class="section page-section parallax pb-0 dark clearfix position-relative"
        style="background-image: url('<?php echo e($image_background); ?>'); background-size: cover;"
        data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">
        <div class="container clearfix position-relative">

            <div class="heading-block center">
                <img src="<?php echo e($image); ?>" alt="Image" height="50" style="margin-bottom: 20px">
                <h3 class="ls2"><?php echo e($title); ?></h3>
            </div>

            <!-- Testimonial Slider
      ============================================= -->
            <div class="fslider testimonial testimonial-full bg-transparent border-0 shadow-none p-0 bottommargin-sm mx-auto center clearfix"
                data-arrows="false" style="max-width: 700px">
                <div class="flexslider">
                    <div class="slider-wrap">
                        <?php if($items[0]->sub > 0): ?>
                            <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item_sub->parent_id == $items[0]->id): ?>
                                    <?php
                                        $title = $item_sub->json_params->title->{$locale} ?? $item_sub->title;
                                        $brief = $item_sub->json_params->brief->{$locale} ?? $item_sub->brief;
                                        $content = $item_sub->json_params->content->{$locale} ?? $item_sub->content;
                                    ?>
                                    <div class="slide">
                                        <div class="testi-content">
                                            <p><?php echo e($content); ?></p>
                                            <div class="testi-meta">
                                                <?php echo e($title); ?>

                                                <span class="ls0"><?php echo e($brief); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>

        <!-- Clients Logo Carousel Area
     ============================================= -->
        <div id="oc-clients" class="owl-carousel owl-carousel-full image-carousel carousel-widget topmargin-lg mb-0"
            data-margin="0" data-nav="false" data-pagi="false" data-autoplay="3000" data-items-xs="3" data-items-sm="3"
            data-items-md="5" data-items-lg="6" data-items-xl="6" data-loop="true"
            style="z-index: 2; padding: 30px 0; border-top: 1px solid rgba(255,255,255,0.15);">

            <?php if($items[1]->sub > 0): ?>
                <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item_sub->parent_id == $items[1]->id): ?>
                        <?php
                            $title = $item_sub->json_params->title->{$locale} ?? $item_sub->title;
                            $brief = $item_sub->json_params->brief->{$locale} ?? $item_sub->brief;
                            $content = $item_sub->json_params->content->{$locale} ?? $item_sub->content;
                            $image = $item_sub->image != '' ? $item_sub->image : '';
                        ?>
                        <div class="oc-item"><img
                            src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">
                </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <!-- Clients items
      ============================================= -->
        </div>

        <div class="video-wrap" style="position: absolute; height: 100%; z-index: 1;">
            <div class="video-overlay" style="background: rgba(0,0,0,0.7);"></div>
        </div>

    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\barber\resources\views/frontend/blocks/custom/styles/about_development.blade.php ENDPATH**/ ?>