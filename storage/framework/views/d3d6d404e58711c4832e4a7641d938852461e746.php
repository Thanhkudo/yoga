<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $id = $block->json_params->id->{$locale} ?? $block->id;
        $sub = $block->json_params->sub->{$locale} ?? $block->sub;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $background = $block->image_background != '' ? $block->image_background : url('assets/img/banner.jpg');
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>

    <div class="form-product-best-seller product-category">
        <div class="container">
            <div class="d-flex flex-column gap-30">
                <div class="product-best-selle-title text-center mb-5">
                    <h2 class="title"
                        style="background: url(<?php echo e($background); ?>);  background-size: 80% 100%;
                    background-repeat: no-repeat;
                    background-position: center center;">
                        <?php echo e($title); ?></h2>
                </div>
                <?php if($block_childs): ?>
                    <div class="form-product-category row">
                        <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                                $sub_childs = $item->json_params->sub->{$locale} ?? $item->sub;
                                $item_childs = $blocks->filter(function ($block_child, $key) use ($item) {
                                    return $block_child->parent_id == $item->id;
                                });
                                // dd($sub_childs)
                            ?>
                            <?php if($sub_childs == 2 && $title_childs == 'Cột trái'): ?>
                                <div
                                    class="col-12 col-md-3 p-0 colum-form-product-category row m-0 justify-content-between">
                                    <?php $__currentLoopData = $item_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $title_childs = $item_child->json_params->title->{$locale} ?? $item_child->title;
                                            $sub_childs = $item_child->json_params->sub->{$locale} ?? $item_child->sub;
                                            $image = $item_child->image != '' ? $item_child->image : null;
                                            $image_background = $item_child->image_background != '' ? $item_child->image_background : null;
                                        ?>
                                        <div class="item-product-category p-1">
                                            <img class="" width="" src="<?php echo e($image); ?>"
                                                alt="" />
                                            <div class="d-flex flex-column content-product-category pt-lg-5">
                                                <span><?php echo e($title_childs); ?></span>
                                                <a href="">Shop now</a>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>
                            <?php if($sub_childs == 1 && $title_childs == 'Cột giữa'): ?>
                                <div class="col-12 col-md-6 p-0">
                                    <?php $__currentLoopData = $item_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $title_childs = $item_child->json_params->title->{$locale} ?? $item_child->title;
                                            $sub_childs = $item_child->json_params->sub->{$locale} ?? $item_child->sub;
                                            $image = $item_child->image != '' ? $item_child->image : null;
                                            $image_background = $item_child->image_background != '' ? $item_child->image_background : null;
                                        ?>
                                        <div class="item-product-category p-1">
                                            <img class="" width="" src="<?php echo e($image); ?>"
                                                alt="" />
                                            <div class="d-flex flex-column content-product-category pt-lg-5">
                                                <span><?php echo e($title_childs); ?></span>
                                                <a href="">Shop now</a>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>
                            <?php if($sub_childs == 2 && $title_childs == 'Cột phải'): ?>
                                <div
                                    class="col-12 col-md-3 p-0 colum-form-product-category row m-0 justify-content-between">
                                    <?php $__currentLoopData = $item_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $title_childs = $item_child->json_params->title->{$locale} ?? $item_child->title;
                                            $sub_childs = $item_child->json_params->sub->{$locale} ?? $item_child->sub;
                                            $image = $item_child->image != '' ? $item_child->image : null;
                                            $image_background = $item_child->image_background != '' ? $item_child->image_background : null;
                                        ?>
                                        <div class="item-product-category p-1">
                                            <img class="" width="" src="<?php echo e($image); ?>"
                                                alt="" />
                                            <div class="d-flex flex-column content-product-category pt-lg-5">
                                                <span><?php echo e($title_childs); ?></span>
                                                <a href="">Shop now</a>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\FHM\yoga\resources\views/frontend/blocks/cms_resource/styles/default.blade.php ENDPATH**/ ?>