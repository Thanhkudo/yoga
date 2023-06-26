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
  <div class="section mt-0" id="testimonials"
    style="background: url('<?php echo e($image_background); ?>') no-repeat top center; background-size: cover; padding: 80px 0 70px;">
    <div class="container">
      <div class="heading-block border-bottom-0 center">
        <div class="badge rounded-pill badge-default"><?php echo e($title); ?></div>
        <h2 class="nott ls0"><?php echo $brief; ?></h2>
      </div>

      <div id="oc-testi" class="owl-carousel testimonials-carousel carousel-widget clearfix" data-margin="0"
        data-pagi="true" data-loop="true" data-center="true" data-autoplay="5000" data-items-sm="1" data-items-md="2"
        data-items-xl="3">

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
            <div class="oc-item">
              <div class="testimonial">
                <div class="testi-image">
                  <img src="<?php echo e($image_child); ?>" alt="<?php echo e($title_child); ?>">
                </div>
                <div class="testi-content">
                  <p><?php echo nl2br($brief_child); ?></p>
                  <div class="testi-meta">
                    <?php echo e($title_child); ?>

                    <span><?php echo e($content_child); ?></span>
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
<?php /**PATH D:\project\kon10ted\resources\views/frontend/blocks/custom/styles/testimonial.blade.php ENDPATH**/ ?>