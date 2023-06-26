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
  <div class="container clearfix py-5 d-none d-md-block" id="process">
    <div class="heading-block border-bottom-0 center">
      <div class="badge rounded-pill badge-default"><?php echo e($title); ?></div>
      <h2 class="nott ls0"><?php echo e($brief); ?></h2>
    </div>

    <?php if($block_childs): ?>
      <ul class="process-steps process-5 row col-mb-30 justify-content-center mb-4">
        <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $title_sub = $item->json_params->title->{$locale} ?? $item->title;
            $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
            $image_sub = $item->image != '' ? $item->image : null;
            $icon_sub = $item->icon != '' ? $item->icon : null;
          ?>
          <li class="col-sm-6 col-lg-1-5">
            <?php echo $icon_sub; ?>

            <h5><?php echo e($title_sub); ?></h5>
          </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    <?php endif; ?>

  </div>
<?php endif; ?>
<?php /**PATH D:\project\fhmvn\resources\views/frontend/blocks/custom/styles/process.blade.php ENDPATH**/ ?>