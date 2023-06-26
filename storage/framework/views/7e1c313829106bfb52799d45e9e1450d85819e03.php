<footer class="footer">
  <div class="footer-top">
    <i class="flaticon-lotus"></i>
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-6 col-12 footer-menu">
          <div class="footer-logo">
            <a class="my-logo" href="<?php echo e(route('frontend.home')); ?>"><img
                src="<?php echo e($web_information->image->logo_footer ?? ''); ?>" alt="Logo" class="logo-img" /></a>
          </div>
          <ul class="list-unstyled">
            <li class="text-white"> <?php echo e($web_information->information->address ?? ''); ?></li>
            <?php if(isset($web_information->information->email)): ?>
              <li>
                <a href="mailto:<?php echo e($web_information->information->email); ?>">
                  <?php echo e($web_information->information->email); ?>

                </a>
              </li>
            <?php endif; ?>
            <?php if(isset($web_information->information->phone)): ?>
              <li class="tel">
                <a href="tel:<?php echo e($web_information->information->phone); ?>"><?php echo e($web_information->information->phone); ?></a>
              </li>
            <?php endif; ?>
          </ul>
          <ul class="list-unstyled social-media">
            <?php if(isset($web_information->social->facebook)): ?>
              <li>
                <a href="<?php echo e($web_information->social->facebook); ?>" target="_blank">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
            <?php endif; ?>
            <?php if(isset($web_information->social->twitter)): ?>
              <li>
                <a href="<?php echo e($web_information->social->twitter); ?>" target="_blank">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
            <?php endif; ?>
            <?php if(isset($web_information->social->instagram)): ?>
              <li>
                <a href="<?php echo e($web_information->social->instagram); ?>" target="_blank">
                  <i class="fa fa-instagram"></i>
                </a>
              </li>
            <?php endif; ?>
            <?php if(isset($web_information->social->youtube)): ?>
              <li>
                <a href="<?php echo e($web_information->social->youtube); ?>" target="_blank">
                  <i class="fa fa-youtube"></i>
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
        <div class="col-lg-4 col-sm-6 col-12 footer-menu">
          <div class="footer-item">
            <?php if(isset($menu)): ?>
              <?php
                $footer_menu = $menu->filter(function ($item, $key) {
                    return $item->menu_type == 'footer' && ($item->parent_id == null || $item->parent_id == 0);
                });
                
                $content = '';
                foreach ($footer_menu as $main_menu) {
                    $url = $title = '';
                    $title = isset($main_menu->json_params->title->{$locale}) && $main_menu->json_params->title->{$locale} != '' ? $main_menu->json_params->title->{$locale} : $main_menu->name;
                    $content .= '<h4>' . $title . '</h4>';
                    $content .= '<ul class="list-unstyled">';
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
                }
                echo $content;
              ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12 footer-menu">
          <div class="footer-item">
            <h4 class="text-uppercase">Facebook Fanpage</h4>
            <?php if(isset($web_information->source_code->facebook_fanpage)): ?>
              <?php echo $web_information->source_code->facebook_fanpage; ?>

            <?php endif; ?>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="footer-bottom text-center">
    <div class="copyright">
      <p>&copy; 2022 <a href="https://www.fhmvietnam.vn" target="_blank"><span>FHM AGENCY</span></a> All rights reserved
      </p>
    </div>
  </div>
</footer>
<?php /**PATH D:\project\qlady\resources\views/frontend/blocks/footer/styles/default.blade.php ENDPATH**/ ?>