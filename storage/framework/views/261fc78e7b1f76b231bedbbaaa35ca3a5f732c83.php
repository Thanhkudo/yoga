<header id="header" class="transparent-header no-sticky" data-sticky-shrink="false">
  <div id="header-wrap">
    <div class="container">
      <div class="header-row">
        <a href="<?php echo e(route('frontend.home')); ?>">
          <img src="<?php echo e($web_information->image->logo_header ?? ''); ?>" alt="Logo" height="100" />
        </a>

        <div>
          <div class="primary-menu-trigger hamburger">
            <i class="icon-line-menu"></i>
            <i class="icon-line-cross"></i>
          </div>
          <div class="global-menu">
            <div class="global-menu__wrap">
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
                  
                              $content .= '<a class="global-menu__item" href="' . $url . '">' . $title . '</a>';
                          }
                      }
                      echo $content;
                  }
                ?>
              <?php endif; ?>
            </div>
          </div>
          <svg class="shape-overlays" viewBox="0 0 100 100" preserveAspectRatio="none">
            <path class="shape-overlays__path" d=""></path>
            <path class="shape-overlays__path" d=""></path>
            <path class="shape-overlays__path" d=""></path>
            <path class="shape-overlays__path" d=""></path>
          </svg>
        </div>
      </div>
    </div>
  </div>
  <div class="header-wrap-clone"></div>
</header>

<?php /**PATH D:\project\it\resources\views/frontend/blocks/header/styles/default.blade.php ENDPATH**/ ?>