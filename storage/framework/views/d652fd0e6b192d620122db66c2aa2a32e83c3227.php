  <!-- ========== Start Upperbar ========== -->

  <div class="upper-bar">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="inner-bar bg-main-pink">
            <div class="row">
              <div class="col-lg-9 col-12 text-center text-lg-left">
                <ul class="contact-bar list-unstyled">
                  <?php if(isset($web_information->information->email)): ?>
                    <li>
                      <a href="mailto:<?php echo e($web_information->information->email); ?>">
                        <i class="fa fa-envelope"></i>
                        <?php echo e($web_information->information->email); ?>

                      </a>
                    </li>
                  <?php endif; ?>
                  <?php if(isset($web_information->information->phone)): ?>
                    <li>
                      <a href="tel:<?php echo e($web_information->information->phone); ?>">
                        <i class="fa fa-phone"></i>
                        <?php echo e($web_information->information->phone); ?>

                      </a>
                    </li>
                  <?php endif; ?>
                  <?php if(isset($web_information->information->address)): ?>
                    <li>
                      <i class="fa fa-map-marker"></i>
                      <?php echo e($web_information->information->address); ?>

                    </li>
                  <?php endif; ?>
                </ul>
              </div>
              <div class="col-lg-3 col-12 text-center text-lg-right">
                <ul class="social-media-bar list-unstyled">

                  <?php if(isset($web_information->social->facebook)): ?>
                    <li>
                      <a href="<?php echo e($web_information->social->facebook); ?>" target="_blank">
                        <i class="fa fa-facebook-f"></i>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ========== End Upperbar ========== -->

  <!-- ========== Start Navbar ========== -->

  <div class="header-inner">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-12 text-md-center">
          <!-- Logo -->
          <a class="my-logo" href="<?php echo e(route('frontend.home')); ?>">
            <img src="<?php echo e($web_information->image->logo_header ?? ''); ?>" alt="Logo" class="logo-img"
              style="max-height: 75px;" /></a>
          <!-- Button Menu -->
          <button class="menu-toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
          </button>
        </div>
        <div class="col-lg-10 col-12">
          <div class="main-menu">
            <ul class="nav-search">
              <li class="search-btn">
                <a href="#" class="fa fa-search"></a>
              </li>
            </ul>

            <form class="search-form" action="<?php echo e(route('frontend.search.index')); ?>" method="get">
              <input type="search" name="keyword" placeholder="<?php echo app('translator')->get('Type and hit enter...'); ?>" value="<?php echo e($params['keyword'] ?? ''); ?>" />
              <button type="submit" class="search-btn">
                <i class="fa fa-paper-plane"></i>
              </button>
            </form>
            <nav class="navbar navbar-expand-lg">
              <div class="navbar-collapse">
                <ul class="nav navbar-nav">
                  <?php if(isset($menu)): ?>
                    <?php
                      $main_menu = $menu->first(function ($item, $key) {
                          return $item->menu_type == 'header' && ($item->parent_id == null || $item->parent_id == 0);
                      });
                      if ($main_menu) {
                          $content = '';
                          foreach ($menu as $item) {
                              $url = $title = '';
                              if ($item->parent_id == $main_menu->id) {
                                  $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                                  $url = $item->url_link;
                                  $active = $url == url()->full() ? 'active' : '';
                      
                                  if ($item->sub > 0) {
                                      $content .= '<li class="' . $active . '"><a href="' . $url . '" >' . $title . '<i class="fa fa-angle-down"></i></a>';
                                      $content .= '<ul class="dropdown">';
                                      foreach ($menu as $item_sub) {
                                          $url = $title = '';
                                          if ($item_sub->parent_id == $item->id) {
                                              $title = isset($item_sub->json_params->title->{$locale}) && $item_sub->json_params->title->{$locale} != '' ? $item_sub->json_params->title->{$locale} : $item_sub->name;
                                              $url = $item_sub->url_link;
                      
                                              $content .= '<li><a href="' . $url . '">' . $title . '</a>';
                      
                                              $content .= '</li>';
                                          }
                                      }
                                      $content .= '</ul>';
                                  } else {
                                      $content .= '<li class="' . $active . '"><a class="nav-link" href="' . $url . '">' . $title . '</a>';
                                  }
                                  $content .= '</li>';
                              }
                          }
                          echo $content;
                      }
                    ?>
                  <?php endif; ?>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ========== End Navbar ========== -->
<?php /**PATH D:\project\qlady\resources\views/frontend/blocks/header/styles/default.blade.php ENDPATH**/ ?>