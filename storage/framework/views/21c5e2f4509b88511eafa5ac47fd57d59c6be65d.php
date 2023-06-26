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
  <section id="testimonials" class="testimonials">
    <div class="container">
      <div class="main-title">
        <span class="separator">
          <i class="flaticon-chakra"></i>
        </span>
        <h2 class="text-white"><?php echo e($title); ?></h2>
      </div>
      <div class="row">
        <div class="col-md-12 owl-carousel owl-theme">

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
              <div class="testimonial-box">
                <div class="client-info">
                  <div class="client-pic">
                    <img src="<?php echo e($image_child); ?>" alt="<?php echo e($title_child); ?>" />
                  </div>
                  <div class="client-details">
                    <h6><?php echo e($title_child); ?></h6>
                  </div>
                </div>
                <div class="description">
                  <p class="text-white">
                    "<?php echo e($brief_child); ?>"
                  </p>
                  <div class="star">
                    <?php echo $icon; ?>

                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </section>

<?php endif; ?>
<?php /**PATH D:\project\qlady\resources\views/frontend/blocks/custom/styles/testimonial.blade.php ENDPATH**/ ?>