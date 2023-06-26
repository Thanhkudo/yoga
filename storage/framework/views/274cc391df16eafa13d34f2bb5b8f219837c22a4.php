<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $video = $block->json_params->video ?? null;
        $video_background = $block->json_params->video_background ?? null;
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });

    ?>

    <section id="slider" class="slider-element slider-parallax page-section min-vh-60 min-vh-md-100 include-header">
        <div class="slider-inner"
            style="background: url('<?php echo e($image_background); ?>') center center no-repeat; background-size: cover;">

            <div class="vertical-middle">
                <div class="text-center py-5 py-md-0">
                    <img src="<?php echo e($image); ?>" alt="Logo" height="180">

                    <!-- Slider Navigation
                ============================================= -->
                    <nav class="custom-hero-nav">
                        <?php


                        ?>
                        <ul class="one-page-menu" data-easing="easeInOutExpo" data-speed="1300" data-offset="60">
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

                                        $content .= '<li class="' . $active . '"><a href="' . $url . '">' . $title . '</a>';
                                        $content .= '</li>';
                                    }
                                }
                                echo $content;
                            }
                        ?>

                        </ul>
                    </nav>
                </div>
            </div>

            <div class="video-wrap">
                <div class="video-overlay" style="background: rgba(0,0,0,0.3);"></div>
            </div>

            <!-- Slider Appointment Button
        ============================================= -->
            <a href="#" class="button button-large button-color button-appointment d-none"
                data-scrollto="#contact" data-offset="62" data-easing="easeInOutExpo" data-speed="1300"><i
                    class="icon-calendar2"></i> BOOKING</a>

        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\barber\resources\views/frontend/blocks/banner/styles/slide.blade.php ENDPATH**/ ?>