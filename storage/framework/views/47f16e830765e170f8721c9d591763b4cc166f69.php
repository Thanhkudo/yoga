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
    <div id="price" class="section page-section parallax pb-0 mb-0 dark"
        style="background-image: url('<?php echo e($image_background); ?>'); background-size: cover; height: 600px"
        data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;"></div>

    <div class="container bottommargin dark clearfix" style="margin-top: -500px">
        <div class="heading-block bottommargin-lg center clearfix">
            <img src="<?php echo e($image); ?>" alt="Image" height="40" style="margin-bottom: 20px">
            <h2><?php echo e($title); ?></h2>
        </div>

        <!-- Price Items
     ============================================= -->
        <div class="row dark col-padding clearfix" style="background-color: #121212">
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

                    <div class="col-lg-6 price-wrap">
                        <div class="price-header">
                            <div class="price-name">
                                <?php echo e($title_child); ?>

                            </div>
                            <div class="price-dots">
                                <span class="separator-dots"></span>
                            </div>
                            <div class="price-price"><?php echo e($brief_child); ?></div>
                        </div>
                        <p class="price-desc"><?php echo $content_child; ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>


        </div>

    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\raovat\resources\views/frontend/blocks/custom/styles/core_value.blade.php ENDPATH**/ ?>