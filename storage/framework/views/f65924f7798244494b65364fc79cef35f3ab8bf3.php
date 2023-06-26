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
  <section class="blog bg-light" id="testimonials_video">
    <div class="container">
      <div class="main-title text-center">
        <span class="separator">
          <i class="flaticon-chakra"></i>
        </span>
        <h2><?php echo e($title); ?></h2>
      </div>
      <div class="row" style="justify-content: center">
        <div class="col-12">
          <?php echo $content; ?>

        </div>

      </div>
      <?php if($url_link != ''): ?>
        <div class="my-btn">
          <a href="<?php echo e($url_link); ?>" target="_blank" class="main-btn"><span><?php echo e($url_link_title); ?></span></a>
        </div>
      <?php endif; ?>
    </div>
  </section>

<?php endif; ?>
<?php /**PATH D:\project\qlady\resources\views/frontend/blocks/custom/styles/testimonial_video.blade.php ENDPATH**/ ?>