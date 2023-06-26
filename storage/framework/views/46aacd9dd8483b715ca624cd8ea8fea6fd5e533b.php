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

        $items = [];
        $i = 0;
        foreach ($block_childs as $item) {
            $items[$i] = $item;
            $i++;
        }

    ?>
    <section id="content" style="border-top: 8px solid #bf9456">
        <div class="content-wrap py-0">

            <div id="about" class="section m-0 bg-transparent page-section" style="padding: 150px 0">
                <div class="container clearfix">
                    <div class="row clearfix">
                        <div class="col-md-6 col-12 center order-2" style="padding: 0 50px;">
                            <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" height="60"
                                style="margin-bottom: 20px">
                            <div class="heading-block bottommargin-sm">
                                <h2><?php echo e($title); ?></h2>
                            </div>
                            <p><?php echo e($brief); ?></p>
                            <img src="<?php echo e($image_background); ?>" alt="<?php echo e($title); ?>" width="200">
                        </div>
                        <?php if($block_childs): ?>
                            <?php
                                $i = 1;
                            ?>
                            <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $title = $item->json_params->title->{$locale} ?? $item->title;
                                    $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                                    $content = $item->json_params->content->{$locale} ?? $item->content;
                                    $image = $item->image != '' ? $item->image : null;
                                    $image_background = $item->image_background != '' ? $item->image_background : null;
                                    $video = $item->json_params->video ?? null;
                                    $video_background = $item->json_params->video_background ?? null;
                                    $url_link = $item->url_link != '' ? $item->url_link : '';
                                    $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                                    $icon = $item->icon != '' ? $item->icon : '';
                                    $style = isset($item->json_params->style) && $item->json_params->style == 'slider-caption-right' ? 'd-none' : '';
                                    $image_for_screen = null;
                                    if ($agent->isDesktop() && $image_background != null) {
                                        $image_for_screen = $image_background;
                                    } else {
                                        $image_for_screen = $image;
                                    }

                                ?>
                                <div class="col-md-3 col-6 d-none d-md-block order-<?php echo e($i); ?>">
                                    <img src="<?php echo e($image); ?>" alt="Image">
                                </div>
                                <?php
                                    $i += 2;
                                ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        </div>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\barber\resources\views/frontend/blocks/custom/styles/about_us.blade.php ENDPATH**/ ?>