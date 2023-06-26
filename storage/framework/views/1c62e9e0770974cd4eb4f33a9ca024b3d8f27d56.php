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
  <style>
    .elementor-118 .elementor-element.elementor-element-494fb2f:not(.elementor-motion-effects-element-type-background) {
      background-image: url("<?php echo e($image_background); ?>");
      background-position: center center;
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
  <section
    class="elementor-section elementor-top-section elementor-element elementor-element-494fb2f elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="494fb2f" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-background-overlay"></div>
    <div class="elementor-container elementor-column-gap-default">
      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b2937ea"
        data-id="b2937ea" data-element_type="column">
        <div class="elementor-widget-wrap elementor-element-populated">
          <div
            class="elementor-element elementor-element-d877363 elementor-invisible elementor-widget elementor-widget-yankee-heading"
            data-id="d877363" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;}"
            data-widget_type="yankee-heading.default">
            <div class="elementor-widget-container">
              <div class="yankee-heading">
                <span class="tag-line"><?php echo $brief; ?></span>
                <h2 class="title dual-title"><?php echo $content; ?></h2>
              </div>
            </div>
          </div>
          <?php if($url_link != ''): ?>
            <div
              class="elementor-section elementor-inner-section elementor-element elementor-element-f898842 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible"
              data-id="f898842" data-element_type="section"
              data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;}">
              <div class="elementor-container elementor-column-gap-default">
                <div
                  class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-94c9ffa"
                  data-id="94c9ffa" data-element_type="column">
                  <div class="elementor-widget-wrap elementor-element-populated">
                    <div
                      class="elementor-element elementor-element-ddd5a8f elementor-mobile-align-center elementor-widget__width-auto elementor-widget elementor-widget-button"
                      data-id="ddd5a8f" data-element_type="widget" data-widget_type="button.default">
                      <div class="elementor-widget-container">
                        <div class="elementor-button-wrapper">
                          <a href="<?php echo e($url_link); ?>" class="elementor-button-link elementor-button elementor-size-sm"
                            role="button">
                            <span class="elementor-button-content-wrapper">
                              <span class="elementor-button-text"><?php echo e($url_link_title); ?></span>
                            </span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </section>

  <?php if($block_childs): ?>
    <section
      class="elementor-section elementor-top-section elementor-element elementor-element-045aa8d elementor-section-full_width elementor-section-height-default elementor-section-height-default elementor-invisible"
      data-id="045aa8d" data-element_type="section" data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;}">
      <div class="elementor-container elementor-column-gap-default">
        <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $content = $item->json_params->content->{$locale} ?? $item->content;
            $image = $item->image != '' ? $item->image : null;
            $image_background = $item->image_background != '' ? $item->image_background : null;
            $video = $item->json_params->video ?? null;
            $video_background = $item->json_params->video_background ?? null;
            $url_link = $item->url_link != '' ? $item->url_link : '';
            $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
            $icon = $item->icon != '' ? $item->icon : '';
            $style = isset($item->json_params->style) && $item->json_params->style == 'slider-caption-right' ? 'd-none' : '';
            
            $image_for_screen = null;
            if ($agent->isDesktop() && $image_background != null) {
                $image_for_screen = $image_background;
            } else {
                $image_for_screen = $image;
            }
            
          ?>
          <div class="elementor-column elementor-col-33 elementor-top-column elementor-element " style="padding: 10px"
            data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
              <div class="elementor-element elementor-element-fe8b396 elementor-widget elementor-widget-image"
                data-id="fe8b396" data-element_type="widget" data-widget_type="image.default">
                <div class="elementor-widget-container">
                  <img width="auto" height="auto" src="<?php echo e($image); ?>" class="attachment-full size-full"
                    alt="<?php echo e($title); ?>" loading="lazy" sizes="(max-width: 403px) 100vw, 403px" />
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </section>
  <?php endif; ?>

<?php endif; ?>
<?php /**PATH D:\project\kon10ted\resources\views/frontend/blocks/banner/styles/static.blade.php ENDPATH**/ ?>