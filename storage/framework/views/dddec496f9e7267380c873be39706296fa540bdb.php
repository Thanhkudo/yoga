<?php if($block): ?>
    <?php
        
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>

    <section id="find_more">
        <div class="box_title text-center mb-3 mb-lg-5">
            <h2 class="title text-uppercase"><?php echo e($title); ?></h2>
            <p class="bref">
                <?php echo e($brief); ?>

            </p>
        </div>
        <div class="col-12 col-md-10 m-auto row">

            <?php if($block_childs): ?>
                <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $title_childs = $items->json_params->title->{$locale} ?? $items->title;
                        $brief_childs = $items->json_params->brief->{$locale} ?? $items->brief;
                        $content_childs = $items->json_params->content->{$locale} ?? $items->content;
                        $image = $items->image != '' ? $items->image : null;
                        $image_background = $items->image_background != '' ? $items->image_background : null;
                        $video = $items->json_params->video ?? '';
                        $icon = $items->icon ?? '';
                        
                        $url_link = $items->url_link != '' ? $items->url_link : '';
                        $url_link_title = $items->json_params->url_link_title->{$locale} ?? $items->url_link_title;
                        $image_for_screen = null;
                        if ($agent->isDesktop() && $image_background != null) {
                            $image_for_screen = $image_background;
                        } else {
                            $image_for_screen = $image;
                        }
                        // Filter all blocks by parent_id
                        $block_childs2 = $blocks->filter(function ($item, $key) use ($items) {
                            return $item->parent_id == $items->id;
                        });
                    ?>
                    <div class="item col-12 col-lg-4 pl-md-5 pr-md-5 mb-3">
                        <div class="logo d-flex align-items-center mb-3">
                            <div class="img mr-2">
                                <img src="<?php echo e($image); ?>" alt="Instagram" />
                            </div>
                            <div class="text">
                                <p><?php echo e($title_childs); ?></p>
                                <p class="text-uppercase">
                                    <?php echo $brief_childs; ?>

                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <?php if($block_childs2): ?>
                                <?php $__currentLoopData = $block_childs2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $title_childs2 = $items2->json_params->title->{$locale} ?? $items2->title;
                                        $brief_childs2 = $items2->json_params->brief->{$locale} ?? $items2->brief;
                                        $content_childs2 = $items2->json_params->content->{$locale} ?? $items2->content;
                                        $image2 = $items2->image != '' ? $items2->image : null;
                                        $image_background2 = $items2->image_background != '' ? $items2->image_background : null;
                                        $video2 = $items2->json_params->video ?? '';
                                        $icon2 = $items2->icon ?? '';
                                        $url_link2 = $items2->url_link != '' ? $items2->url_link : '';
                                        $url_link_title2 = $items2->json_params->url_link_title->{$locale} ?? $items2->url_link_title;
                                    ?>
                                    <div class="col-6 data_iframe" data ="<?php echo e($video2); ?>">
                                        
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <a href="<?php echo e($url_link); ?>">
                            <p class="text-right">
                                <?php echo e($url_link_title); ?>

                                <svg width="19" height="9" viewBox="0 0 19 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.6364 0L13 1.63636L15.7273 4.36364L13 7.09091L14.6364 8.72727L19 4.36364L14.6364 0Z"
                                        fill="#282829" />
                                    <path
                                        d="M4.36364 8.72705L6 7.09069L3.27273 4.36341L6 1.63614L4.36364 -0.000221395L3.81481e-07 4.36341L4.36364 8.72705Z"
                                        fill="#282829" />
                                </svg>
                            </p>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\yoga\resources\views/frontend/blocks/banner/styles/video_social.blade.php ENDPATH**/ ?>