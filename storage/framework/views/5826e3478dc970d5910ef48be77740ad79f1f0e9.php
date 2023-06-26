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
    $items = [];
    $i = 0;
    foreach ($block_childs as $item) {
        $items[$i] = $item;
        $i++;
    }
    
  ?>
  <section
    class="elementor-section elementor-top-section elementor-element elementor-element-ac844f6 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="ac844f6" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
      <div
        class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-cec9156 elementor-invisible"
        data-id="cec9156" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInLeft&quot;}">
        <div class="elementor-widget-wrap elementor-element-populated">
          <div
            class="elementor-element elementor-element-8aa0d73 elementor-widget elementor-widget-yankee-experience-tag"
            data-id="8aa0d73" data-element_type="widget" data-widget_type="yankee-experience-tag.default">
            <div class="elementor-widget-container">
              <div class="experience-tag-wrap style-one">
                <div class="experience-img">
                  <img width="470" height="650" src="<?php echo e($items[0]->image ?? ''); ?>"
                    class="attachment-full size-full" alt="" loading="lazy"
                    sizes="(max-width: 470px) 100vw, 470px" />
                </div>

                <div class="experience-tag tag-right">
                  <div>
                    <span class="year"><?php echo $items[0]->brief ?? ''; ?></span><?php echo $items[0]->title ?? ''; ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div
        class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-57efba6 elementor-hidden-tablet elementor-hidden-phone"
        data-id="57efba6" data-element_type="column">
        <div class="elementor-widget-wrap">
        </div>
      </div>
      <div
        class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-025cd69 elementor-invisible"
        data-id="025cd69" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInRight&quot;}">
        <div class="elementor-widget-wrap elementor-element-populated">
          <div class="elementor-element elementor-element-75c24a0 elementor-widget elementor-widget-yankee-heading"
            data-id="75c24a0" data-element_type="widget" data-widget_type="yankee-heading.default">
            <div class="elementor-widget-container">
              <div class="yankee-heading">
                <span class="tag-line"><?php echo e($title); ?></span>
                <h2 class="title dual-title"><?php echo $items[1]->title ?? ''; ?></h2>

              </div>
            </div>
          </div>
          <div class="elementor-element elementor-widget elementor-widget-text-editor" data-id="92ee008"
            data-element_type="widget" data-widget_type="text-editor.default">
            <div class="elementor-widget-container">
              <div class="section-title mb-30">
                <p><strong style="margin-bottom: 3rem;">
                    <?php echo $items[1]->brief ?? ''; ?>

                  </strong></p>
                <p>
                  <?php echo $items[1]->content ?? ''; ?>

                </p>
              </div>
            </div>
          </div>
          <?php if($items[1]->url_link != ''): ?>
            <div class="elementor-element elementor-element-46fb7bc elementor-widget elementor-widget-button"
              data-id="46fb7bc" data-element_type="widget" data-widget_type="button.default">
              <div class="elementor-widget-container">
                <div class="elementor-button-wrapper">
                  <a href="<?php echo e($items[1]->url_link); ?>" class="elementor-button-link elementor-button elementor-size-sm"
                    role="button">
                    <span class="elementor-button-content-wrapper">
                      <span class="elementor-button-icon elementor-align-icon-right">
                        <i aria-hidden="true" class="fas fa-plus"></i> </span>
                      <span class="elementor-button-text"><?php echo e($items[1]->url_link_title); ?></span>
                    </span>
                  </a>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

<?php endif; ?>
<?php /**PATH D:\project\kon10ted\resources\views/frontend/blocks/custom/styles/about_us.blade.php ENDPATH**/ ?>