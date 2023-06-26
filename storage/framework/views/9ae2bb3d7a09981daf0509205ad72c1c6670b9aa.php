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
  <div class="section bg-white mt-0 mb-0 pb-0" id="service-function">
    <div class="container">
      <div class="heading-block border-bottom-0 center mx-auto mb-0" style="max-width: 550px">
        <div class="badge rounded-pill badge-default"><?php echo e($title); ?></div>
        <h2 class="nott ls0 mb-3 text-uppercase"><?php echo e($brief); ?></h2>
        <p><?php echo e($content); ?></p>
      </div>
      <div class="row justify-content-between align-items-center">

        <div class="col-lg-4 col-md-6">

          <?php if($block_childs): ?>
            <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                $image_sub = $item->image != '' ? $item->image : null;
              ?>
              <?php if($loop->index < 3): ?>
                <div class="feature-box flex-md-row-reverse text-md-end border-0 mb-5">
                  <div class="fbox-icon">
                    <img src="<?php echo e($image_sub); ?>" alt="<?php echo e($title_sub); ?>" class="bg-transparent rounded-0">
                  </div>
                  <div class="fbox-content">
                    <h3 class="nott ls0"><?php echo e($title_sub); ?></h3>
                    <p><?php echo nl2br($brief_sub); ?></p>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>

        </div>

        <div class="col-lg-3 col-7 col-md-3 offset-3 offset-sm-0 d-none d-lg-block center my-5">
          <img src="<?php echo e($image); ?>" alt="iphone" class="rounded parallax"
            data-bottom-top="transform: translateY(-30px)" data-top-bottom="transform: translateY(30px)">
        </div>

        <div class="col-lg-4 col-md-6">

          <?php if($block_childs): ?>
            <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                $image_sub = $item->image != '' ? $item->image : null;
              ?>
              <?php if($loop->index > 2): ?>
                <div class="feature-box border-0 mb-5">
                  <div class="fbox-icon">
                    <img src="<?php echo e($image_sub); ?>" alt="<?php echo e($title_sub); ?>" class="bg-transparent rounded-0">
                  </div>
                  <div class="fbox-content">
                    <h3 class="nott ls0"><?php echo e($title_sub); ?></h3>
                    <p><?php echo nl2br($brief_sub); ?></p>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>

      </div>
    </div>
  </div>
  
<?php endif; ?>
<?php /**PATH D:\project\kon10ted\resources\views/frontend/blocks/custom/styles/website_function.blade.php ENDPATH**/ ?>