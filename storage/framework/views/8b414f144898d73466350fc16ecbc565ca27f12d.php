<?php if($block): ?>
    <?php
        
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        // $video = $block->json_params->video ?? null;
        // $video_background = $block->json_params->video_background ?? null;
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>

    <section class="section-padding container slide_video mt_page_title">
        <div class="box_frame ">
            <div class="box_title text-center mb-3 mb-lg-5">
                <h2 class="title text-uppercase"><?php echo e($title); ?></h2>
            </div>
            <div class="section-container">

                <?php if($block_childs): ?>
                    <div class="slider slider-single p-3 p-md-4">
                        <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $title_childs = $item1->json_params->title->{$locale} ?? $item1->title;
                                $brief_childs = $item1->json_params->brief->{$locale} ?? $item1->brief;
                                $content_childs = $item1->json_params->content->{$locale} ?? $item1->content;
                                $image = $item1->image != '' ? $item1->image : null;
                                $image_background = $item1->image_background != '' ? $item1->image_background : null;
                                $video = $item1->json_params->video ?? '';
                                $icon = $item1->icon ?? '';
                                $url_link = $item1->url_link != '' ? $item1->url_link : '';
                                $url_link_title = $item1->json_params->url_link_title->{$locale} ?? $item1->url_link_title;
                                $image_for_screen = null;
                                if ($agent->isDesktop() && $image_background != null) {
                                    $image_for_screen = $image_background;
                                } else {
                                    $image_for_screen = $image;
                                }
                                
                            ?>
                            <div class="frame-box-video">
                                <?php echo $video; ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>


                    <div class="slider slider-nav p-3 p-md-4">
                        <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $title_childs = $item2->json_params->title->{$locale} ?? $item2->title;
                                $brief_childs = $item2->json_params->brief->{$locale} ?? $item2->brief;
                                $content_childs = $item2->json_params->content->{$locale} ?? $item2->content;
                                $image = $item2->image != '' ? $item2->image : null;
                                $image_background = $item2->image_background != '' ? $item2->image_background : null;
                                $video = $item2->json_params->video ?? '';
                                $icon = $item2->icon ?? '';
                                $url_link = $item2->url_link != '' ? $item2->url_link : '';
                                $url_link_title = $item2->json_params->url_link_title->{$locale} ?? $item2->url_link_title;
                                $image_for_screen = null;
                                if ($agent->isDesktop() && $image_background != null) {
                                    $image_for_screen = $image_background;
                                } else {
                                    $image_for_screen = $image;
                                }
                                
                            ?>
                            <div class="frame-box-img img p-2 pl-lg-4">
                                <img class="custom-slide" src="<?php echo e($image); ?>" />
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        

                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\yoga\resources\views/frontend/blocks/banner_video/styles/slick.blade.php ENDPATH**/ ?>