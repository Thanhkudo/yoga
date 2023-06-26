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
  <div class="section mt-0 bg-transparent">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="badge badge-default text-md-start">
            <?php echo e($title); ?>

          </div>
          <h2 class="display-5 fw-bold">
            <?php echo $brief; ?>

          </h2>
          <h4>
            <?php echo nl2br($content); ?>

          </h4>
          <div class="row">
            <?php if($block_childs): ?>
              <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $title_child = $item->json_params->title->{$locale} ?? $item->title;
                  $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                  $content_child = $item->json_params->content->{$locale} ?? $item->content;
                  $image_child = $item->image != '' ? $item->image : null;
                  $url_link = $item->url_link != '' ? $item->url_link : '';
                  $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                  $icon = $item->icon != '' ? $item->icon : '';
                  $style = $item->json_params->style ?? '';
                ?>
                <div class="col-12">
                  <div class="row">
                    <div class="col-2">
                      <?php echo $icon; ?>

                    </div>
                    <div class="col-10">
                      <h4 class="mb-2"><?php echo e($title_child); ?></h4>
                      <p>
                        <?php echo nl2br($brief_child); ?>

                      </p>
                    </div>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>
        </div>
        <div id="feature-image-container" class="col-lg-6 mt-4 mt-lg-0 justify-content-md-end d-flex"
          style="position: relative">
          <img src="<?php echo e($image_background); ?>" alt="Image" />
          <img src="<?php echo e($image); ?>" alt="Image" />
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH D:\project\it\resources\views/frontend/blocks/custom/styles/about_core_feature.blade.php ENDPATH**/ ?>