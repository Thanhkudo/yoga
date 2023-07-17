

<footer class="site-footer">
    <div class="footer">
        <div class="box-sologen d-flex justify-content-between align-items-center">
            <p class="text text-uppercase">
                <?php echo e($web_information->information->footer ?? ''); ?>

            </p>
            <?php if(isset($web_information->information->link_footer)): ?>
                <a href="<?php echo e($web_information->information->link_footer); ?>"><button
                        class="bora-30 btn btn-light font-weight-bold">
                        Đăng ký
                        <svg width="18" height="13" viewBox="0 0 18 13" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.4236 0.870735L11.0767 0.209869C11.3532 -0.0699565 11.8004 -0.0699565 12.0739 0.209869L17.7926 5.99393C18.0691 6.27376 18.0691 6.72624 17.7926 7.00309L12.0739 12.7901C11.7974 13.07 11.3503 13.07 11.0767 12.7901L10.4236 12.1293C10.1442 11.8465 10.1501 11.385 10.4354 11.1082L13.9802 7.69075H0.706009C0.314762 7.69075 0 7.37222 0 6.9763V6.0237C0 5.62778 0.314762 5.30925 0.706009 5.30925H13.9802L10.4354 1.8918C10.1471 1.61495 10.1412 1.15354 10.4236 0.870735Z"
                                fill="black" />
                        </svg>
                    </button>
                </a>
            <?php endif; ?>

        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 col-md-6 mb-5">
                    <div class="block block-image">
                        <img width="100" src="<?php echo e($web_information->image->logo_footer ?? ''); ?>"
                            alt="logo footer" />
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
                        $content .= '<div class="col-12 col-lg-4 col-md-6 mb-4"><div class="block block-menu">';
                        $content .= '<h4 class="block-title green">' . $title . '</h4>';
                        $content .= '<div class="block-content"><ul>';

                        foreach ($menu as $item) {
                            if ($item->parent_id == $main_menu->id) {
                                $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                                $url = $item->url_link;

                                $active = $url == url()->current() ? 'active' : '';

                                $content .= '<li><a href="'.$url.'">' . $title . '</a>';
                                $content .= '</li>';
                            }
                        }
                        $content .= '</ul></div>';
                        $content .= '</div></div>';
                    }
                    echo $content;
                ?>
            <?php endif; ?>

                <div class="col-12 col-lg-4 col-md-6 mb-4">
                    <div class="block block-menu">
                        <h4 class="block-title green">Địa chỉ</h4>
                        <p><?php echo e($web_information->information->address ?? ''); ?></p>
                        <div class="block-content">
                            <ul>
                                <li>Điện thoại: <?php echo e($web_information->information->phone ?? ''); ?></li>
                                <li>Email: <?php echo e($web_information->information->email ?? ''); ?></li>
                                <li>Hotline: <?php echo e($web_information->information->hotline ?? ''); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container row justify-content-between align-items-center text-center text-lg-left m-auto p-2">
            <p class="col-12 col-lg-6 mb-3 mb-lg-0">
                <?php echo e($web_information->information->copyright ?? ''); ?>

            </p>
            <div class="col-12 col-lg-6 list_icon d-flex justify-content-center justify-content-lg-end">
               
                <?php if(isset($web_information->social->facebook)): ?>
                    <a href="<?php echo e($web_information->social->facebook); ?>" class="p-2">
                        <img src="<?php echo e(url('data/cms-image/icon/ic_bl_facebook.png')); ?>" alt="Facebook" />
                    </a>
                <?php endif; ?>
                <?php if(isset($web_information->social->tiktok)): ?>
                    <a href="<?php echo e($web_information->social->tiktok); ?>" class="p-2">
                        <img src="<?php echo e(url('data/cms-image/icon/ic_bl_tiktok.png')); ?>" alt="Tiktok" />
                    </a>
                <?php endif; ?>
                <?php if(isset($web_information->social->instagram)): ?>
                    <a href="<?php echo e($web_information->social->instagram); ?>" class="p-2">
                        <img src="<?php echo e(url('data/cms-image/icon/ic_bl_instagram.png')); ?>" alt="Instagram" />
                    </a>
                <?php endif; ?>
                <?php if(isset($web_information->social->youtube)): ?>
                    <a href="<?php echo e($web_information->social->youtube); ?>" class="p-2">
                        <img src="<?php echo e(url('data/cms-image/icon/ic_bl_youtube.png')); ?>" alt="Youtube" />
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH C:\xampp\htdocs\yoga\resources\views/frontend/blocks/footer/styles/default.blade.php ENDPATH**/ ?>