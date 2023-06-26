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

  <section
    class="elementor-section elementor-top-section elementor-element elementor-element-008e6a1 elementor-reverse-tablet elementor-reverse-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="008e6a1" data-element_type="section">
    <div class="elementor-background-overlay"></div>
    <div class="elementor-container elementor-column-gap-default">
      <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-6db2de8"
        data-id="6db2de8" data-element_type="column">
        <div class="elementor-widget-wrap elementor-element-populated">
          <div class="elementor-element elementor-element-bbd62a1 elementor-widget elementor-widget-yankee-heading"
            data-id="bbd62a1" data-element_type="widget" data-widget_type="yankee-heading.default">
            <div class="elementor-widget-container">
              <div class="yankee-heading">
                <span class="tag-line"><?php echo e($title); ?></span>
                <h2 class="title dual-title"><?php echo $brief; ?></h2>
              </div>
            </div>
          </div>
          <div class="elementor-element elementor-element-0e4e802 elementor-widget elementor-widget-text-editor"
            data-id="0e4e802" data-element_type="widget" data-widget_type="text-editor.default">
            <div class="elementor-widget-container">
              <div class="section-title mb-30">
                <p><?php echo nl2br($content); ?></p>
              </div>
            </div>
          </div>
          <div
            class="elementor-element elementor-element-5afbccf elementor-invisible elementor-widget elementor-widget-yankee-feature-box"
            data-id="5afbccf" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}"
            data-widget_type="yankee-feature-box.default">
            <div class="elementor-widget-container">
              <div class="yankee-feature-boxes row">
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
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="feature-box text-left icon-left elementor-repeater-item-50a27e6">
                        <div class="icon">
                          <?php echo $icon; ?>

                        </div>
                        <div class="desc">
                          <h5 class="title"><?php echo e($title_child); ?></h5>
                          <p><?php echo nl2br($brief_child); ?></p>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-6309421"
        data-id="6309421" data-element_type="column">
        <div class="elementor-widget-wrap elementor-element-populated">
          <div
            class="elementor-element elementor-element-a47d4c0 elementor-invisible elementor-widget elementor-widget-image"
            data-id="a47d4c0" data-element_type="widget"
            data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;}" data-widget_type="image.default">
            <div class="elementor-widget-container">
              <img width="468" height="468" src="<?php echo e($image_background); ?>" class="attachment-full size-full"
                alt="Image Background" loading="lazy" sizes="(max-width: 468px) 100vw, 468px" />
            </div>
          </div>
          <div
            class="elementor-element elementor-element-a2fd683 elementor-invisible elementor-widget elementor-widget-image"
            data-id="a2fd683" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}"
            data-widget_type="image.default">
            <div class="elementor-widget-container">
              <img width="341" height="220" src="<?php echo e($image); ?>" class="attachment-full size-full"
                alt="Image" loading="lazy" sizes="(max-width: 341px) 100vw, 341px" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
<?php /**PATH D:\project\kon10ted\resources\views/frontend/blocks/custom/styles/about_core_feature.blade.php ENDPATH**/ ?>