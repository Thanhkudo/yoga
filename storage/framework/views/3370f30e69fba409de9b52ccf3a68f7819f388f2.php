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

    <div class="section bg-transparent mb-0 topmargin-sm clearfix">
        <div class="container clearfix">
            <div class="heading-block center">
                <img src="<?php echo e($image); ?>" alt="Image" height="50" style="margin-bottom: 20px">
                <h3 class="ls2"><?php echo e($title); ?></h3>
                <span><?php echo e($brief); ?></span>
            </div>
            <div class="row">
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
                        <div class="col-md-4 bottommargin">
                            <div class="team">
                                <div class="team-image">
                                    <img src="<?php echo e($image_child); ?>" alt="<?php echo e($title); ?>">
                                    <div class="bg-overlay">
                                        <div
                                            class="bg-overlay-content p-2 flex-column-reverse justify-content-between align-items-center">
                                            <div class="d-flex mb-3" data-hover-animate="fadeInUp"
                                                data-hover-animate-out="fadeOutDown" data-hover-speed="400"
                                                data-hover-parent=".team">
                                                <a href="#"
                                                    class="social-icon si-rounded si-colored si-small si-facebook"
                                                    title="Facebook">
                                                    <i class="icon-facebook"></i>
                                                    <i class="icon-facebook"></i>
                                                </a>
                                                <a href="#"
                                                    class="social-icon si-rounded si-colored si-small si-gplus"
                                                    title="gplus">
                                                    <i class="icon-gplus"></i>
                                                    <i class="icon-gplus"></i>
                                                </a>
                                                <a href="#"
                                                    class="social-icon si-rounded si-colored si-small si-instagram"
                                                    title="instagram">
                                                    <i class="icon-instagram"></i>
                                                    <i class="icon-instagram"></i>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="team-desc">
                                    <div class="team-title">
                                        <h4><?php echo e($title_child); ?></h4><span><?php echo e($brief_child); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\barber\resources\views/frontend/blocks/custom/styles/about_client.blade.php ENDPATH**/ ?>