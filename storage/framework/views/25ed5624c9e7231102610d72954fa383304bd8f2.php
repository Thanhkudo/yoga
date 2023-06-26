<footer id="footer" class="dark">
  <div class="container">
    <!-- Footer Widgets
    ============================================= -->
    <div class="footer-widgets-wrap">
      <div class="row col-mb-50">
        <div class="col-lg-9">
          <div class="row col-mb-50">
            <div class="col-lg-4">
              <div class="widget clearfix">
                <img src="<?php echo e($web_information->image->logo_footer ?? ''); ?>" alt="Logo footer" class="footer-logo" />

                <div>
                  <address>
                    <strong>Địa chỉ:</strong><br />
                    <?php echo $web_information->information->address ?? ''; ?>

                  </address>
                  <abbr title="Phone Number"><strong><?php echo app('translator')->get('phone'); ?>:</strong></abbr>
                  <?php echo e($web_information->information->phone ?? ''); ?><br />
                  <abbr title="Fax"><strong>Hotline:</strong></abbr>
                  <?php echo e($web_information->information->hotline ?? ''); ?><br />
                  <abbr title="Email Address"><strong>Email:</strong></abbr>
                  <?php echo e($web_information->information->email ?? ''); ?>

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
                    $content .= '<div class="col-lg-4"><div class="widget widget_links clearfix">';
                    $content .= '<h4 class="text-white text-uppercase text-bold ">' . $title . '</h4>';
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

        <div class="col-lg-3">
          <div class="row col-mb-50">
            <div class="col-md-5 col-lg-12">
              <div class="widget  clearfix">
                <h4>Đăng kí nhận bản tin</h4>
                <form action="<?php echo e(route('frontend.contact.store')); ?>" method="post" class="mb-0 form_ajax">
                  <?php echo csrf_field(); ?>
                  <div class="input-group mx-auto">
                    <div class="input-group-text">
                      <i class="icon-email2"></i>
                    </div>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Địa chỉ email"
                      required />
                    <button class="btn bg-light" type="submit">
                      Đăng ký
                    </button>
                    <input type="hidden" name="is_type" value="call_request">
                  </div>
                </form>
              </div>
            </div>

            <div class="col-md-3 col-lg-12">
              <div class="widget clearfix" style="margin-bottom: -20px">
                <div class="row">
                  <div class="col-12 clearfix bottommargin-sm">
                    <?php if(isset($web_information->social->facebook)): ?>
                      <a href="<?php echo e($web_information->social->facebook); ?>"
                        class="social-icon si-dark si-colored si-facebook mb-0" style="margin-right: 10px">
                        <i class="icon-facebook"></i>
                        <i class="icon-facebook"></i>
                      </a>
                    <?php endif; ?>
                    <?php if(isset($web_information->social->twitter)): ?>
                      <a href="<?php echo e($web_information->social->twitter); ?>"
                        class="social-icon si-dark si-colored si-twitter mb-0" style="margin-right: 10px">
                        <i class="icon-twitter"></i>
                        <i class="icon-twitter"></i>
                      </a>
                    <?php endif; ?>
                    <?php if(isset($web_information->social->instagram)): ?>
                      <a href="<?php echo e($web_information->social->instagram); ?>"
                        class="social-icon si-dark si-colored si-instagram mb-0" style="margin-right: 10px">
                        <i class="icon-instagram"></i>
                        <i class="icon-instagram"></i>
                      </a>
                    <?php endif; ?>
                    <?php if(isset($web_information->social->youtube)): ?>
                      <a href="<?php echo e($web_information->social->youtube); ?>"
                        class="social-icon si-dark si-colored si-youtube mb-0" style="margin-right: 10px">
                        <i class="icon-youtube"></i>
                        <i class="icon-youtube"></i>
                      </a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- .footer-widgets-wrap end -->
  </div>

</footer>
<?php /**PATH D:\project\thaiever\resources\views/frontend/blocks/footer/styles/default.blade.php ENDPATH**/ ?>