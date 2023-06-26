

<header id="header" class="transparent-header dark header-size-md" data-sticky-shrink="false">
    <div id="header-wrap">
        <div class="container px-0">
            <div class="header-row">

                <!-- Logo
      ============================================= -->
                <div id="logo">
                    <a href="<?php echo e(route('frontend.home')); ?>" data-dark-logo="<?php echo e($web_information->image->logo_header ?? ''); ?>" class="standard-logo"><img
                            src="<?php echo e($web_information->image->logo_header ?? ''); ?>" alt="Header Logo"></a>
                    <a href="<?php echo e(route('frontend.home')); ?>" data-dark-logo="<?php echo e($web_information->image->logo_header ?? ''); ?>" class="retina-logo"><img
                            src="<?php echo e($web_information->image->logo_header ?? ''); ?>" alt="Header Logo"></a>
                </div><!-- #logo end -->


                <div id="primary-menu-trigger">
                    <svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
                </div>

                <!-- Primary Navigation
      ============================================= -->
                <nav class="primary-menu with-arrows top-links">
                    <ul class="menu-container top-links-container">
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

                                            $content .= '<li class="menu-item ' . $active . '"><a class="menu-link" href="' . $url . '">' . $title . '</a>';

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

                        <?php if(isset($user_auth)): ?>
                            <li class="dropdown user user-menu menu-item top-links-item">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                  <span class="hidden-xs pointer-event">
                                    <?php echo e($user_auth->name); ?>

                                  </span>
                                </a>
                                <ul class="sub-menu-container">
                                  <!-- User image -->
                                  <li class="user-header menu-item">
                                    <p class="menu-link center">
                                      <?php echo e($user_auth->name); ?>

                                      <small><?php echo e($user_auth->email); ?></small>
                                    </p>
                                  </li>
                                  <li class="menu-item center">
                                      <a href="<?php echo e(route('frontend.logout')); ?>" class="menu-link"><?php echo app('translator')->get('Logout'); ?></a>

                                  </li>
                                </ul>
                            </li>
                        <?php else: ?>
                        <li class="menu-item top-links-item menu-link"><p class="d-inline-block m-0 side-panel-trigger ">Đăng nhập </p><p class="d-inline-block m-0 side-panel-trigger-signup"> / Đăng ký</p></li>
                        <?php endif; ?>

                    </ul>

                </nav><!-- #primary-menu end -->
                
            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header>
<?php /**PATH C:\xampp\htdocs\raovat\resources\views/frontend/blocks/header/styles/default.blade.php ENDPATH**/ ?>