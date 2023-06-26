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
    #skills {
      background-image: url('<?php echo e($image_background); ?>');
    }
  </style>
  <div id="skills" class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-12">
          <ul class="skills row">
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
                <div class="col-6">
                  <li data-percent="<?php echo e($brief_child); ?>">
                    <span><?php echo e($title_child); ?></span>
                    <div class="progress">
                      <div class="progress-percent">
                        <div class="counter counter-inherit counter-instant">
                          <span data-from="0" data-to="<?php echo e($brief_child); ?>" data-refresh-interval="30"
                            data-speed="1100"></span><?php echo e($content_child); ?>

                        </div>
                      </div>
                    </div>
                  </li>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH D:\project\thaiever\resources\views/frontend/blocks/custom/styles/about_skill.blade.php ENDPATH**/ ?>