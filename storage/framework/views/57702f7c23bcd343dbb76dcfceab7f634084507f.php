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
    <section class="section_3banner">
        <div class="container">
          <div class="row">
            <img src="<?php echo e($image_for_screen); ?>" alt="<?php echo e($title); ?>">
          </div>
        </div>
      </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\yogatest\resources\views/frontend/blocks/banner/styles/image.blade.php ENDPATH**/ ?>