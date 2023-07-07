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
    <section id="slider" class="">
      <div id="title" class="page-title">
        <div class="bg_page" style="background: url(<?php echo e($image_for_screen); ?>);
        background-size: 100% 100%;
        background-repeat: no-repeat;
        height: calc(100vh - 180px);
        max-height: 570px;">
          <div class="container d-flex justify-content-md-end">
            <div class="col-12 col-md-8 mt_page_title">
              
              <h2 class="title">
                <?php echo $brief; ?>

              </h2>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="container mt-5">
      <p class="grey"><i class="fas fa-play mr-2"></i> <?php echo e($title); ?></p>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\yoga\resources\views/frontend/blocks/banner/styles/banner_image.blade.php ENDPATH**/ ?>