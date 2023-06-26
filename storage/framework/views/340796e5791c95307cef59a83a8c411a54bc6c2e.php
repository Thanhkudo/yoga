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
  <div id="value" class="section bg-transparent my-0">
    <div class="container">
      <div class="fancy-title title-border title-center mb-5">
        <h3 class="text-uppercase"><?php echo e($title); ?></h3>
      </div>
      <div class="row justify-content-between col-mb-50 mb-0">
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
            <div class="col-sm-6 col-lg-auto">
              <div class="feature-box fbox-center fbox-bg fbox-light fbox-effect">
                <div class="fbox-icon">
                  <a href="<?php echo e($url_link); ?>"><img src="<?php echo e($image_child); ?>" alt="<?php echo e($title_child); ?>" /></a>
                </div>
                <div class="fbox-content">
                  <h3><?php echo e($title_child); ?></h3>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\thaiever\resources\views/frontend/blocks/custom/styles/core_value.blade.php ENDPATH**/ ?>