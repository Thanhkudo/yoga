<footer id="footer" class="dark" style="background-color: #0B50A1;">
  <div class="container">

    <!-- Footer Widgets
    ============================================= -->
    <div class="footer-widgets-wrap">

      <div class="row col-mb-50">

        <div class="col-md-6 col-lg-4">

          <div class="widget clearfix">

            <img src="<?php echo e($web_information->image->logo_footer ?? ''); ?>"
              alt="<?php echo e($web_information->information->site_name ?? ''); ?>" class="footer-logo">
            <h4 class="text-white"><?php echo e($web_information->information->slogan ?? ''); ?></h4>
          </div>

        </div>
        <div class="col-md-6 col-lg-8">
          <div class="row">
            <div class="col-md-6 col-lg-5">

              <div class="widget clearfix">
                <h3 class="text-white text-uppercase">Thông tin liên hệ</h3>

                <div class="text-white">
                  <address>
                    <strong><?php echo app('translator')->get('address'); ?>:</strong><br>
                    <?php echo e($web_information->information->address ?? ''); ?><br>
                  </address>
                  <abbr title="Phone Number"><strong><?php echo app('translator')->get('phone'); ?>:</strong></abbr>
                  <?php echo e($web_information->information->phone ?? ''); ?><br>
                  <abbr title="Email Address"><strong>Email:</strong></abbr>
                  <?php echo e($web_information->information->email ?? ''); ?>

                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-7">
              <div class="row">
                <?php if(isset($menu)): ?>
                  <?php
                    $footer_menu = $menu->filter(function ($item, $key) {
                        return $item->menu_type == 'footer' && ($item->parent_id == null || $item->parent_id == 0);
                    });
                    
                    $content = '';
                    foreach ($footer_menu as $main_menu) {
                        $url = $title = '';
                        $title = isset($main_menu->json_params->title->{$locale}) && $main_menu->json_params->title->{$locale} != '' ? $main_menu->json_params->title->{$locale} : $main_menu->name;
                        $content .= '<div class="col-md-6 col-lg-6"><div class="widget widget_links clearfix">';
                        $content .= '<h3 class="text-white text-uppercase">' . $title . '</h3>';
                        $content .= '<ul>';
                        foreach ($menu as $item) {
                            if ($item->parent_id == $main_menu->id) {
                                $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                                $url = $item->url_link;
                    
                                $active = $url == url()->current() ? 'active' : '';
                    
                                $content .= '<li><a href="' . $url . '">' . $title . '</a>';
                                $content .= '</li>';
                            }
                        }
                        $content .= '</ul>';
                        $content .= '</div></div>';
                    }
                    echo $content;
                  ?>
                <?php endif; ?>
              </div>

            </div>

          </div>
        </div>


      </div>

    </div>

  </div>

</footer>
<?php /**PATH D:\project\fhmvn\resources\views/frontend/blocks/footer/styles/default.blade.php ENDPATH**/ ?>