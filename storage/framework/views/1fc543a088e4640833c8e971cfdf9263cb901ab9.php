<?php if($block): ?>
  <?php
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>
  <section
    class="elementor-section elementor-top-section elementor-element elementor-element-7a5cc12 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
    data-id="7a5cc12" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-026bb6c"
        data-id="026bb6c" data-element_type="column">
        <div class="elementor-widget-wrap elementor-element-populated">
          <div class="elementor-element elementor-element-44536c7 elementor-widget elementor-widget-yankee-banner-slider"
            data-id="44536c7" data-element_type="widget" data-widget_type="yankee-banner-slider.default">
            <div class="elementor-widget-container">

              <div class="yankee-banner-widget normal-dots" data-arrow="true" data-dots="false" data-fade="false"
                data-autoplay="true" data-autoplayt="5000" data-arrow-prev="Prev" data-arrow-next="Next">
                <div class="yankee-banner-slider banner-style-one">
                  <?php if($block_childs): ?>
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
                      <div class="single-banner" style="background-image: url('<?php echo e($image); ?>');">
                        <div class="container">
                          <div class="banner-text ">
                            <ul class="banner-tags" data-animation="fadeInUp" data-delay="0.3s">
                              <?php echo $brief; ?>

                            </ul>
                            <h2 class="banner-title dual-title" data-animation="fadeInLeft" data-delay="0.5s">
                              <?php echo $content; ?>

                            </h2>
                            <?php if($url_link != ''): ?>
                              <ul class="banner-btns">
                                <li data-animation="fadeInLeft" data-delay="0.7s">
                                  <a class="banner-btn" href="<?php echo e($url_link); ?>">
                                    <?php echo e($url_link_title); ?>

                                  </a>
                                </li>
                              </ul>
                            <?php endif; ?>

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
<?php /**PATH D:\project\kon10ted\resources\views/frontend/blocks/banner/styles/slide.blade.php ENDPATH**/ ?>