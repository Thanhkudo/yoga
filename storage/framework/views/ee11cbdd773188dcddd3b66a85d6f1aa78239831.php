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
    class="elementor-section elementor-top-section elementor-element elementor-element-ea1f0dd elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible"
    data-id="ea1f0dd" data-element_type="section" data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;}">
    <div class="elementor-container elementor-column-gap-default">
      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-bb3af24"
        data-id="bb3af24" data-element_type="column">
        <div class="elementor-widget-wrap elementor-element-populated">
          <section
            class="elementor-section elementor-inner-section elementor-element elementor-element-ac4f05e elementor-section-boxed elementor-section-height-default elementor-section-height-default"
            data-id="ac4f05e" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
              <div
                class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-a61d7c6"
                data-id="a61d7c6" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                  <div
                    class="elementor-element elementor-element-becf543 elementor-widget elementor-widget-yankee-heading"
                    data-id="becf543" data-element_type="widget" data-widget_type="yankee-heading.default">
                    <div class="elementor-widget-container">
                      <div class="yankee-heading">
                        <span class="tag-line"><?php echo e($title); ?></span>
                        <h2 class="title"><?php echo e($brief); ?></h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-2d2aa24 elementor-hidden-tablet elementor-hidden-phone"
                data-id="2d2aa24" data-element_type="column">
                <div class="elementor-widget-wrap">
                </div>
              </div>
            </div>
          </section>
          <div
            class="elementor-element elementor-element-29098ef elementor-widget elementor-widget-yankee-portfolio-filter"
            data-id="29098ef" data-element_type="widget" data-widget_type="yankee-portfolio-filter.default">
            <div class="elementor-widget-container">
              <div class="yankee-portfolio-widgets">
                <div class="portfolio-nav clearfix">
                </div>

                <div class="row portfolio-items portfolio-filter portfolio-layout-masonary">
                  <div class="grid-sizer col-lg-3 col-sm-6"></div>

                  <?php if($block_childs): ?>
                    <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                        $title_child = $item->json_params->title->{$locale} ?? $item->title;
                        $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                        $content_child = $item->json_params->content->{$locale} ?? $item->content;
                        $image_child = $item->image != '' ? $item->image : null;
                        $url_link = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
                        $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                        $icon = $item->icon != '' ? $item->icon : '';
                        $style = $item->json_params->style ?? '';
                      ?>
                      <div
                        class="grid-item <?php echo e($loop->index == 1 ? 'grid-big-item col-lg-6' : 'col-lg-3'); ?> col-sm-6 design game">
                        <div class="portfolio-item">
                          <div class="portfolio-thumb">
                            <div class="thumb" style="background-image: url('<?php echo e($image_child); ?>');">
                            </div>
                          </div>
                          <div class="portfolio-desc">
                            <span class="cat"><?php echo e($brief_child); ?></span>
                            <h5 class="title">
                              <a href="<?php echo e($url_link); ?>">
                                <?php echo e($title_child); ?>

                              </a>
                            </h5>
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
      </div>
    </div>
  </section>
<?php endif; ?>
<?php /**PATH D:\project\it\resources\views/frontend/blocks/custom/styles/about_work.blade.php ENDPATH**/ ?>