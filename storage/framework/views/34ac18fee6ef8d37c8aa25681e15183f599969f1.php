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
  <div id="contact" class="section bg-transparent m-0">
    <div class="container" style="position: relative;">
      <div class="heading-block border-bottom-0 center">
        <h5 class="text-uppercase ls1 mb-1"><?php echo $title; ?></h5>
        <h2 class="nott ls0"><?php echo nl2br($brief); ?></h2>
        <?php if($url_link != ''): ?>
          <a href="<?php echo e($url_link); ?>"
            class="button button-border button-rounded button-fill button-blue button-large mt-5 ls0 text-uppercase">
            <span><?php echo e($url_link_title); ?></span>
          </a>
        <?php endif; ?>

      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH D:\project\fhmvn\resources\views/frontend/blocks/custom/styles/notice.blade.php ENDPATH**/ ?>