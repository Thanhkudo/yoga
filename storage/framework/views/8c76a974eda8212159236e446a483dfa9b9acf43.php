<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>
  <section class="services" id="why_choose">
    <div class="container">
      <div class="main-title text-center">
        <span class="separator">
          <i class="flaticon-chakra"></i>
        </span>
        <h2><?php echo e($title); ?></h2>
      </div>
      <div class="row">

        <?php if($block_childs): ?>
          <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
              $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
              $image_sub = $item->image != '' ? $item->image : null;
            ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
              <div class="service <?php echo e($loop->index == 1 ? 'two' : 'one'); ?>">
                <div class="service-bg"><i class="flaticon-lotus"></i></div>
                <div class="service-item">
                  <div class="service-icon">
                    <img src="<?php echo e($image_sub); ?>" alt="<?php echo e($title_sub); ?>">
                  </div>
                  <h4><?php echo e($title_sub); ?></h4>
                  <p>
                    <?php echo nl2br($brief_sub); ?>

                  </p>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
    </div>
  </section>
<?php endif; ?>
<?php /**PATH D:\project\fhmvn\resources\views/frontend/blocks/custom/styles/why_choose.blade.php ENDPATH**/ ?>