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
    <section class="section_intro">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-12 col-intro-1">
                    <div class="banner_intro">
                        <a href="<?php echo e($url_link); ?>" title="<?php echo e($url_link_title); ?>">
                            <img class="lazyload" src="<?php echo e(asset('images/load.gif')); ?>" data-src="<?php echo e($image_for_screen); ?>"
                                alt="<?php echo e($url_link_title); ?>" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-12 col-intro-2">
                    <div class="title_module_main no-bg clearfix">
                        <h3>
                            <span><?php echo e($title); ?></span>
                        </h3>
                        <h2>
                            <span><?php echo e($brief); ?></span>
                        </h2>
                    </div>
                    <div class="contentpage clearfix">
                        <?php echo $content; ?>

                    </div>
                    <div class="img_intro_list">
                        <div class="intro_img_swiper swiper-container">
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
                                            <a href="<?php echo e($url_link); ?>" title="<?php echo e($url_link_title); ?>">
                                                <img class="img-responsive lazyload" width="186" height="173"
                                                    src="<?php echo e(asset('images/load.gif')); ?>"
                                                    data-src="<?php echo e($image_for_screen); ?>" alt="<?php echo e($url_link_title); ?>" />
                                            </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\maison\resources\views/frontend/blocks/custom/styles/about_client.blade.php ENDPATH**/ ?>