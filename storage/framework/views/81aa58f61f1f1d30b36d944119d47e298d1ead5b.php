<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $background = $block->image_background != '' ? $block->image_background : url('assets/img/banner.jpg');
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
        // dd($block_)
        // $params['status'] = App\Consts::POST_STATUS['active'];
        // $params['is_featured'] = true;
        // $params['is_type'] = App\Consts::POST_TYPE['service'];
        
        // $rows = App\Http\Services\ContentService::getCmsPost($params)->get();
    ?>

    <div class="box-softwarecar">
        <div class="container">
            <div class="d-flex flex-column">
                <div class="logo-softwarecar text-center">
                    <img class="" width="" src="<?php echo e($image); ?>" alt="icon-logo-software" />
                    <div class="logo-text-software">
                        <span><?php echo e($url_link); ?></span>
                        <span class="text-large"><?php echo e($url_link_title); ?></span>
                    </div>
                </div>
                <div class="row justify-content-between content">
                    <?php if($block_childs): ?>
                        <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $title_child = $item->json_params->title->{$locale} ?? $item->title;
                                $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                                $content_child = $item->json_params->content->{$locale} ?? $item->content;
                                $image_child = $item->image != '' ? $item->image : null;
                                $image_background_child = $item->image_background != '' ? $item->image_background : null;
                                $url_link_child = $item->url_link != '' ? $item->url_link : '';
                                $url_link_title_child = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                                $icon = $item->icon != '' ? $item->icon : '';
                                $style = $item->json_params->style ?? '';
                            ?>

                            <div class="col-12 col-md-4 my-3 box-content">
                                <?php if(!empty($image_background_child)): ?>
                                    <div class="item-content"
                                        style="
                                      background: url(<?php echo e($image_background_child); ?>);
                                      height: 100%;
                                      background-repeat: no-repeat;
                                      background-size: cover;
                                    ">
                                    <?php else: ?>
                                        <div class="item-content">
                                            <?php if(!empty($image_child)): ?>
                                                <div class="box-content-img">
                                                    <img src="<?php echo e($image_child); ?>" alt="" />
                                                </div>
                                            <?php endif; ?>
                                <?php endif; ?>
                                <div class="content">
                                    <?php if(!empty($url_link_child)): ?>
                                        <span class="top-content"><?php echo e($url_link_child); ?></span>
                                        <span class="bottom-content"><?php echo e($title_child); ?></span>
                                    <?php else: ?>
                                        <span><?php echo e($title_child); ?></span>
                                    <?php endif; ?>
                                    <p>
                                        <?php echo e($brief_child); ?>

                                    </p>
                                    <div class="button-learn-more">
                                        <button>Learn More</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\FHM\yoga\resources\views/frontend/blocks/cms_service/styles/default.blade.php ENDPATH**/ ?>