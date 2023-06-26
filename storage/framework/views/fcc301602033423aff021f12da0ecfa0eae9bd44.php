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
  <style>
    #future-vision {
      background-image: url('<?php echo e($image_background); ?>');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }
  </style>
  <div id="future-vision" class="section m-0">
    <div class="container">
      <div class="row col-mb-50 mb-0">
        <h3 class="text-uppercase dark text-center">
          <?php echo e($title); ?>

        </h3>
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
            <div class="col-sm-6 col-lg-4 dark">
              <div class="feature-box fbox-center fbox-effect">
                <div class="fbox-icon">
                  <a href="<?php echo e($url_link); ?>"><img src="<?php echo e($image_child); ?>" alt="<?php echo e($title_child); ?>" /></a>
                </div>
                <div class="fbox-content">
                  <h3><?php echo e($title_child); ?></h3>
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
  </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\thaiever\resources\views/frontend/blocks/custom/styles/about_vision.blade.php ENDPATH**/ ?>