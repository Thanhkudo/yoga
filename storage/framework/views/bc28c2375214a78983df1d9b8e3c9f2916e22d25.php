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
  <div class="section mb-0">
    <div class="container">
      <div class="heading-block border-bottom-0 center">
        <h3 class="nott ls0">
          <?php echo e($title); ?>

        </h3>
      </div>
      <div class="row col-mb-30 align-content-stretch">
        <?php if($block_childs): ?>
          <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
              $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
              $image_sub = $item->image != '' ? $item->image : null;
              $icon_sub = $item->icon != '' ? $item->icon : null;
            ?>
            <div class="col-lg-4 col-md-6 d-flex">
              <div class="card">
                <div class="card-body p-5">
                  <div class="feature-box flex-column">
                    <div class="fbox-icon mb-3">
                      <img src="<?php echo e($image_sub); ?>" alt="<?php echo e($title_sub); ?>" class="bg-transparent rounded-0" />
                    </div>
                    <div class="fbox-content">
                      <h3 class="nott ls0 text-larger">
                        <?php echo e($title_sub); ?>

                      </h3>
                      <p class="text-smaller">
                        <?php echo nl2br($brief_sub); ?>

                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH D:\project\kon10ted\resources\views/frontend/blocks/custom_website/styles/website_benefit.blade.php ENDPATH**/ ?>