<header id="header" class=" dark header-size-md" data-sticky-shrink="false">
  <div id="header-wrap">
    <div class="container">
      <div class="header-row">
        <!-- Logo
        ============================================= -->
        <div id="logo">
          <a href="<?php echo e(route('frontend.home')); ?>" data-dark-logo="<?php echo e($web_information->image->logo_header ?? ''); ?>"
            class="standard-logo"><img src="<?php echo e($web_information->image->logo_header ?? ''); ?>" alt="Header Logo" /></a>
          <a href="<?php echo e(route('frontend.home')); ?>" data-dark-logo="<?php echo e($web_information->image->logo_header ?? ''); ?>"
            class="retina-logo"><img src="<?php echo e($web_information->image->logo_header ?? ''); ?>" alt="Header Logo" /></a>
        </div>
        <!-- #logo end -->

        <div class="header-misc">
          <!-- Top Search
        ============================================= -->
          <div id="top-search" class="header-misc-icon">
            <a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i
                class="icon-line-cross"></i></a>
          </div>
          <!-- #top-search end -->
        </div>

        <div id="primary-menu-trigger">
          <svg class="svg-trigger" viewBox="0 0 100 100">
            <path
              d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
            </path>
            <path d="m 30,50 h 40"></path>
            <path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
            </path>
          </svg>
        </div>

        <!-- Primary Navigation
        ============================================= -->
        <nav class="primary-menu with-arrows">
          <ul class="menu-container">
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
                            $active = $url == url()->full() ? 'current' : '';
                
                            $content .= '<li class="menu-item ' . $active . '"><a class="menu-link fw-bold" href="' . $url . '"><div>' . $title . '</div></a>';
                
                            if ($item->sub > 0) {
                                $content .= '<ul class="sub-menu-container">';
                                foreach ($menu as $item_sub) {
                                    $url = $title = '';
                                    if ($item_sub->parent_id == $item->id) {
                                        $title = isset($item_sub->json_params->title->{$locale}) && $item_sub->json_params->title->{$locale} != '' ? $item_sub->json_params->title->{$locale} : $item_sub->name;
                                        $url = $item_sub->url_link;
                
                                        $content .= '<li class="menu-item"><a class="menu-link fw-bold" href="' . $url . '"><div>' . $title . '</div></a>';
                
                                        if ($item_sub->sub > 0) {
                                            $content .= '<ul class="sub-menu-container">';
                                            foreach ($menu as $item_sub_2) {
                                                $url = $title = '';
                                                if ($item_sub_2->parent_id == $item_sub->id) {
                                                    $title = isset($item_sub_2->json_params->title->{$locale}) && $item_sub_2->json_params->title->{$locale} != '' ? $item_sub_2->json_params->title->{$locale} : $item_sub_2->name;
                                                    $url = $item_sub_2->url_link;
                
                                                    $content .= '<li class="menu-item"><a class="menu-link fw-bold" href="' . $url . '"><div>' . $title . '</div></a></li>';
                                                }
                                            }
                                            $content .= '</ul>';
                                        }
                                        $content .= '</li>';
                                    }
                                }
                                $content .= '</ul>';
                            }
                            $content .= '</li>';
                        }
                    }
                    echo $content;
                }
              ?>
            <?php endif; ?>
          </ul>
        </nav>
        <!-- #primary-menu end -->
        <form class="top-search-form" action="<?php echo e(route('frontend.search.index')); ?>" method="get">
          <input type="search" name="keyword" placeholder="<?php echo app('translator')->get('Type and hit enter...'); ?>" value="<?php echo e($params['keyword'] ?? ''); ?>"
            class="form-control" />
        </form>

      </div>
    </div>
  </div>
  <div class="header-wrap-clone"></div>
</header>

<?php /**PATH D:\project\thaiever\resources\views/frontend/blocks/header/styles/default.blade.php ENDPATH**/ ?>