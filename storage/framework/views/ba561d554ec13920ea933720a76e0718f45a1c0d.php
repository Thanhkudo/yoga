<header class="site-header">

  <div class="container-fluid container-1500">
    <div class="header-nav header-nav-one">
      <div class="nav-container">
        <!-- Site Logo -->
        <div class="site-logo">
          <a href="<?php echo e(route('frontend.home')); ?>">
            <img src="<?php echo e($web_information->image->logo_header ?? ''); ?>" alt="Logo" style="width:200px">
          </a>
        </div>
        <!-- Menu Items -->
        <div class="menu-items">

          <ul id="menu-main-menu" class="primary-menu">
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
                            $active = $url == url()->full() ? 'current-menu-item' : '';
                
                            if ($item->sub > 0) {
                                $content .= '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children ' . $active . '"><a href="' . $url . '">' . $title . '</a>';
                                $content .= '<ul class="sub-menu">';
                                foreach ($menu as $item_sub) {
                                    $url = $title = '';
                                    if ($item_sub->parent_id == $item->id) {
                                        $title = isset($item_sub->json_params->title->{$locale}) && $item_sub->json_params->title->{$locale} != '' ? $item_sub->json_params->title->{$locale} : $item_sub->name;
                                        $url = $item_sub->url_link;
                
                                        if ($item_sub->sub > 0) {
                                            $content .= '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children ' . $active . '"><a href="' . $url . '">' . $title . '</a>';
                                            $content .= '<ul class="sub-menu">';
                                            foreach ($menu as $item_sub_2) {
                                                $url = $title = '';
                                                if ($item_sub_2->parent_id == $item_sub->id) {
                                                    $title = isset($item_sub_2->json_params->title->{$locale}) && $item_sub_2->json_params->title->{$locale} != '' ? $item_sub_2->json_params->title->{$locale} : $item_sub_2->name;
                                                    $url = $item_sub_2->url_link;
                
                                                    $content .= '<li class="menu-item menu-item-type-post_type menu-item-object-services"><a href="' . $url . '">' . $title . '</a></li>';
                                                }
                                            }
                                            $content .= '</ul>';
                                        } else {
                                            $content .= '<li class="menu-item menu-item-type-post_type menu-item-object-page ' . $active . '"><a  href="' . $url . '">' . $title . '</a>';
                                        }
                                        $content .= '</li>';
                                    }
                                }
                                $content .= '</ul>';
                            } else {
                                $content .= '<li class="menu-item menu-item-type-post_type menu-item-object-page ' . $active . '"><a  href="' . $url . '">' . $title . '</a>';
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

        <!-- Navbar Extra  -->
        <div class="d-flex align-items-center">
          <div class="search-wrap">
            <a href="#" class="search-icon">
              <i class="fal fa-search"></i>
            </a>
            <div class="search-form">
              <form class="search-form yankee-search-form" action="<?php echo e(route('frontend.search.index')); ?>" method="get">
                <input type="search" name="keyword" placeholder="<?php echo app('translator')->get('Type and hit enter...'); ?>"
                  value="<?php echo e($params['keyword'] ?? ''); ?>" class="search-field" />
                <button type="submit" class="search-submit"><i class="far fa-search"></i></button>
              </form>
            </div>
          </div>

          <!-- Navbar Toggler -->
          <div class="navbar-toggler">
            <span></span><span></span><span></span>
          </div>
        </div>

      </div>


      <div class="contact-btn">
        <div class="contact-info">
          <i class="fal fa-phone"></i>
          <span class="title">Talk With Us</span>
          <a class="info" href="tel:<?php echo e($web_information->information->phone ?? ''); ?>">
            <?php echo e($web_information->information->phone ?? ''); ?>

          </a>
        </div>
      </div>


      <!-- Mobile Menu  -->
      <div class="mobile-menu">
        <!-- Navbar Close -->
        <div class="navbar-close">
          <div class="cross-wrap"><span></span><span></span></div>
        </div>

        <div class="site-logo">
          <a href="<?php echo e(route('frontend.home')); ?>">
            <img src="<?php echo e($web_information->image->logo_header ?? ''); ?>" alt="Logo">
          </a>
        </div>
        <div class="menu-items">
          <ul id="menu-main-menu-1" class="primary-menu">
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
                            $active = $url == url()->full() ? 'current-menu-item' : '';
                
                            if ($item->sub > 0) {
                                $content .= '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children ' . $active . '"><a href="' . $url . '">' . $title . '</a>';
                                $content .= '<ul class="sub-menu">';
                                foreach ($menu as $item_sub) {
                                    $url = $title = '';
                                    if ($item_sub->parent_id == $item->id) {
                                        $title = isset($item_sub->json_params->title->{$locale}) && $item_sub->json_params->title->{$locale} != '' ? $item_sub->json_params->title->{$locale} : $item_sub->name;
                                        $url = $item_sub->url_link;
                
                                        if ($item_sub->sub > 0) {
                                            $content .= '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children ' . $active . '"><a href="' . $url . '">' . $title . '</a>';
                                            $content .= '<ul class="sub-menu">';
                                            foreach ($menu as $item_sub_2) {
                                                $url = $title = '';
                                                if ($item_sub_2->parent_id == $item_sub->id) {
                                                    $title = isset($item_sub_2->json_params->title->{$locale}) && $item_sub_2->json_params->title->{$locale} != '' ? $item_sub_2->json_params->title->{$locale} : $item_sub_2->name;
                                                    $url = $item_sub_2->url_link;
                
                                                    $content .= '<li class="menu-item menu-item-type-post_type menu-item-object-services"><a href="' . $url . '">' . $title . '</a></li>';
                                                }
                                            }
                                            $content .= '</ul>';
                                        } else {
                                            $content .= '<li class="menu-item menu-item-type-post_type menu-item-object-page ' . $active . '"><a  href="' . $url . '">' . $title . '</a>';
                                        }
                                        $content .= '</li>';
                                    }
                                }
                                $content .= '</ul>';
                            } else {
                                $content .= '<li class="menu-item menu-item-type-post_type menu-item-object-page ' . $active . '"><a  href="' . $url . '">' . $title . '</a>';
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


        <div class="contact-btn">
          <div class="contact-info">
            <i class="fal fa-phone"></i>
            <span class="title">Talk With Us</span>
            <a class="info" href="tel:+4733378901">
              987-987-987-98 </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</header>

<?php /**PATH D:\project\kon10ted\resources\views/frontend/blocks/header/styles/default.blade.php ENDPATH**/ ?>