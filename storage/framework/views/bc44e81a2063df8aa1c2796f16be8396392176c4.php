<footer id="site-footer" class="site-footer">
  <div data-elementor-type="wp-post" data-elementor-id="274" class="elementor elementor-274">
    <section
      class="elementor-section elementor-top-section elementor-element elementor-element-0d5f74b elementor-section-boxed elementor-section-height-default elementor-section-height-default"
      data-id="0d5f74b" data-element_type="section"
      data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
      <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-219f7f1"
          data-id="219f7f1" data-element_type="column">
          <div class="elementor-widget-wrap elementor-element-populated">
            <div class="elementor-element elementor-element-b250976 elementor-widget elementor-widget-heading"
              data-id="b250976" data-element_type="widget" data-widget_type="heading.default">
              <div class="elementor-widget-container">
                <h4 class="elementor-heading-title elementor-size-default">
                  <?php echo e($web_information->information->site_name ?? ''); ?></h4>
              </div>
            </div>
            <div class="elementor-element elementor-element-74c3766 elementor-widget elementor-widget-text-editor"
              data-id="74c3766" data-element_type="widget" data-widget_type="text-editor.default">
              <div class="elementor-widget-container">
                <p><?php echo e($web_information->information->slogan ?? ''); ?></p>
              </div>
            </div>
          </div>
        </div>

        <?php if(isset($menu)): ?>
          <?php
            $footer_menu = $menu->filter(function ($item, $key) {
                return $item->menu_type == 'footer' && ($item->parent_id == null || $item->parent_id == 0);
            });
            
            $content = '';
            foreach ($footer_menu as $main_menu) {
                $url = $title = '';
                $title = isset($main_menu->json_params->title->{$locale}) && $main_menu->json_params->title->{$locale} != '' ? $main_menu->json_params->title->{$locale} : $main_menu->name;
                $content .= '<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-c14b77d"
          data-id="c14b77d" data-element_type="column">
          <div class="elementor-widget-wrap elementor-element-populated">';
                $content .=
                    '<div class="elementor-element elementor-element-d9b6a72 elementor-widget elementor-widget-heading"
              data-id="d9b6a72" data-element_type="widget" data-widget_type="heading.default">
              <div class="elementor-widget-container">
                <h4 class="elementor-heading-title elementor-size-default">' .
                    $title .
                    '</h4>
              </div>
            </div>';
                $content .= '<div class="elementor-element elementor-element-f7124f2 elementor-widget elementor-widget-yankee-nav-menu"
              data-id="f7124f2" data-element_type="widget" data-widget_type="yankee-nav-menu.default">
              <div class="elementor-widget-container">
                <div class="yankee-nav-widget">
                  <ul id="menu-our-pages" class="menu">';
                foreach ($menu as $item) {
                    if ($item->parent_id == $main_menu->id) {
                        $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                        $url = $item->url_link;
            
                        $active = $url == url()->current() ? 'active' : '';
            
                        $content .= '<li><a href="' . $url . '">' . $title . '</a>';
                        $content .= '</li>';
                    }
                }
                $content .= '</ul>
                </div>
              </div>
            </div>';
                $content .= '</div></div>';
            }
            echo $content;
          ?>
        <?php endif; ?>

        <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-bfa6076"
          data-id="bfa6076" data-element_type="column">
          <div class="elementor-widget-wrap elementor-element-populated">
            <div class="elementor-element elementor-element-f74e119 elementor-widget elementor-widget-heading"
              data-id="f74e119" data-element_type="widget" data-widget_type="heading.default">
              <div class="elementor-widget-container">
                <h4 class="elementor-heading-title elementor-size-default">NEWSLETTER.</h4>
              </div>
            </div>
            <div class="elementor-element elementor-element-2576b67 elementor-widget elementor-widget-shortcode"
              data-id="2576b67" data-element_type="widget" data-widget_type="shortcode.default">
              <div class="elementor-widget-container">
                <div class="elementor-shortcode">
                  <form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-295"
                    action="<?php echo e(route('frontend.contact.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="mc4wp-form-fields">
                      <div class="input-group">
                        <input type="text" placeholder="<?php echo app('translator')->get('Name'); ?>" name="name" required="">
                        <span class="icon"><i class="fal fa-user"></i></span>
                      </div>
                      <div class="input-group">
                        <input type="email" name="email" required="" placeholder="Email">
                        <span class="icon"><i class="fal fa-envelope"></i></span>
                      </div>
                      <div class="input-group">
                        <button type="submit" class="main-btn">
                          <span class="icon-left fal fa-paper-plane"></span> <?php echo app('translator')->get('Submit'); ?>
                        </button>
                      </div>
                    </div>
                    <input type="hidden" name="is_type" value="call_request">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
</footer>
<?php /**PATH D:\project\kon10ted\resources\views/frontend/blocks/footer/styles/default.blade.php ENDPATH**/ ?>