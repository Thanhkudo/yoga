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

    <div class="container clearfix">
        <div class="heading-block border-0 mw-100">
            <h2 class="mb-4"><?php echo e($title); ?></h2>
            <p class="lead"><?php echo e($brief); ?></p>
        </div>

        <div class="row col-mb-50 mb-0">
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
                    <div class="col-lg-6 col-12">

                        <div class="team team-list row align-items-center">
                            <div class="team-image col-sm-6">
                                <img src="<?php echo e($image_child); ?>" alt="<?php echo e($title_child); ?>">
                            </div>
                            <div class="team-desc col-sm-6">
                                <div class="team-title">
                                    <h4><?php echo e($title_child); ?></h4><span><?php echo e($brief_child); ?></span>
                                </div>
                                <div class="team-content">
                                    <p><?php echo e($content); ?></p>
                                </div>

                            </div>
                        </div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>




<?php endif; ?>
<?php /**PATH /home/fhmagency/domains/fhmagency.vn/public_html/bds/resources/views/frontend/blocks/custom/styles/about_client.blade.php ENDPATH**/ ?>