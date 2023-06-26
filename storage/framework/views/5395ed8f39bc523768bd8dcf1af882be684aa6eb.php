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
  <style>
    .elementor-118 .elementor-element.elementor-element-57cde65>.elementor-element-populated {
      padding: 0px 15px;
    }

    @media (min-width: 768px) {
      .elementor-118 .elementor-element.elementor-element-57cde65 {
        width: 100%;
      }
    }
  </style>
  <section
    class="elementor-section elementor-top-section elementor-element elementor-element-0ffab45 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="0ffab45" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
      <div
        class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-57cde65 elementor-invisible"
        data-id="57cde65" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInRight&quot;}">
        <div class="elementor-widget-wrap elementor-element-populated">
          <div class="elementor-element elementor-element-c205b8b elementor-widget elementor-widget-yankee-fancy-boxes"
            data-id="c205b8b" data-element_type="widget" data-widget_type="yankee-fancy-boxes.default">
            <div class="elementor-widget-container">
              <div class="yankee-service-boxes column-d-4 column-t-2 column-s-1 column-xs-1">

                <div class="service-box">
                  <div class="icon"><i class="flaticon flaticon-three-dimensional"></i></div>
                  <h4 class="title"><a href="services/website-development/index.html">Website
                      Development</a></h4><a href="services/website-development/index.html" class="service-link"><i
                      class="fal fa-arrow-right"></i></a>
                </div>


                <div class="service-box">
                  <div class="icon"><i class="flaticon flaticon-payment-method"></i></div>
                  <h4 class="title"><a href="services/app-development/index.html">App Development</a>
                  </h4><a href="services/app-development/index.html" class="service-link"><i
                      class="fal fa-arrow-right"></i></a>
                </div>


                <div class="service-box">
                  <div class="icon"><i class="flaticon flaticon-computer"></i></div>
                  <h4 class="title"><a href="services/product-development/index.html">Product
                      Development</a></h4><a href="services/product-development/index.html" class="service-link"><i
                      class="fal fa-arrow-right"></i></a>
                </div>


                <div class="service-box">
                  <div class="icon"><i class="flaticon flaticon-puzzle-piece"></i></div>
                  <h4 class="title"><a href="services/game-development/index.html">Game Development</a>
                  </h4><a href="services/game-development/index.html" class="service-link"><i
                      class="fal fa-arrow-right"></i></a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
<?php /**PATH D:\project\kon10ted\resources\views/frontend/blocks/custom/styles/about_statistic.blade.php ENDPATH**/ ?>