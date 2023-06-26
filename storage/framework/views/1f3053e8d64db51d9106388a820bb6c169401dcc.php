<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image_background = $block->image_background != '' ? $block->image_background : null;
    $image = $block->image != '' ? $block->image : null;
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    
    $image_for_screen = null;
    if ($agent->isDesktop() && $image_background != null) {
        $image_for_screen = $image_background;
    } else {
        $image_for_screen = $image;
    }
    
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
    
  ?>
  <style>
    #contact {
      background-image: url('<?php echo e($image_background); ?>');
    }
  </style>
  <div id="contact" class="section bg-transparent">
    <div class="container d-flex justify-content-center" style="position: relative;">
      <div class="col-lg-8 mb-5 d-flex flex-column align-items-center">
        <div class="badge badge-default"><?php echo $brief; ?></div>
        <h2 class="fw-bold ls0 mb-3 text-center display-4">
          <?php echo $content; ?></span>
        </h2>
        <?php if($url_link != ''): ?>
          <div class="d-flex col-6 justify-content-center">
            <a href="<?php echo e($url_link); ?>" class="button button-large text-center mt-4 button-custom"
              style="width: fit-content">
              <?php echo e($url_link_title); ?>

            </a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div id="contact-image" class="section bg-transparent">
    <div class="container d-flex justify-content-between">
      <div class="row">
        <?php if($block_childs): ?>
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
            <div class="col-md-<?php echo e($loop->index == 0 ? '3' : ($loop->index == 1 ? '5' : '4')); ?> col-12">
              <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" style="height: 100%" />
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH D:\project\thaiever\resources\views/frontend/blocks/banner/styles/static.blade.php ENDPATH**/ ?>