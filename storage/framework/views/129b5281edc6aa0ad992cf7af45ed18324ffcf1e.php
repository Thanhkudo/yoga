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
    
    $items = [];
    $i = 0;
    foreach ($block_childs as $item) {
        $items[$i] = $item;
        $i++;
    }
  ?>
  <div class="section m-0 bg-transparent">
    <div class="container">
      <div class="row col-mb-30 mt-5">
        <div class="col-md-2 col-12">
          <div class="row">
            <?php if($blocks): ?>
              <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($item->parent_id == $items[0]->id): ?>
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
                  <div class="col-md-12 col-sm-4 col-4">
                    <div class="d-flex flex-column align-items-start justify-content-center">
                      <div class="counter counter-xmedium text-dark fw-bolder">
                        <span data-from="1" data-to="<?php echo e($brief_child); ?>" data-refresh-interval="2"
                          data-speed="600"><?php echo e($brief_child); ?></span>
                      </div>
                      <h6 class="mb-3"><?php echo e($title_child); ?></h6>
                    </div>
                  </div>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-md-10 col-12 archivement-container">
          <div class="row" style="height: 100%">
            <?php if($blocks): ?>
              <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($item->parent_id == $items[1]->id): ?>
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
                  <div class="col-md-3 col-sm-12 d-flex flex-column justify-content-between p-4">
                    <?php echo $icon; ?>

                    <h4 class="fw-bold"><?php echo $title_child; ?></h4>
                    <a href="<?php echo e($url_link); ?>">
                      <i class="i-plain icon-ok"></i>
                    </a>
                  </div>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH D:\project\thaiever\resources\views/frontend/blocks/custom/styles/about_statistic.blade.php ENDPATH**/ ?>