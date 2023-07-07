<?php
    if (isset($menu)) {
        $main_menu = $menu->first(function ($item, $key) {
            return $item->menu_type == 'header' && ($item->parent_id == null || $item->parent_id == 0);
        });
    }
?>

<header class="site-navbar js-sticky-header site-navbar-target" role="banner">
    <div class="container">
        <div class="row align-items-center position-relative">
            <div class="site-logo">
                <a href="<?php echo e(route('frontend.home')); ?>" class="text-black"><img
                        src="<?php echo e($web_information->image->logo_header ?? ''); ?>" alt="Logo" /></a>
            </div>

            <div class="col-12">
                <nav class="site-navigation text-right ml-auto" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                        <?php if(isset($main_menu)): ?>
                            <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->parent_id == $main_menu->id): ?>
                                    <?php if($item->sub <= 0): ?>
                                        <li class="nav-item <?php echo e($item->url_link == url()->full() ? 'active' : ''); ?>">
                                            <a class="nav-link text-uppercase f-w-600" href="<?php echo e($item->url_link); ?>"
                                                title="<?php echo e($item->name ?? ''); ?>">
                                                <?php echo e($item->name ?? ''); ?>

                                            </a>
                                        </li>
                                    <?php else: ?>
                                        <li
                                            class="has-children nav-item <?php echo e($item->url_link == url()->full() ? 'active' : ''); ?>">
                                            <a class="a-img caret-down" href="<?php echo e($item->url_link); ?>"
                                                title="<?php echo e($item->name ?? ''); ?>">
                                                <?php echo e($item->name ?? ''); ?>

                                            </a>

                                            <ul class="dropdown arrow-top">
                                                <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($item_sub->parent_id == $item->id): ?>
                                                        <?php if($item_sub->sub <= 0): ?>
                                                            <li class="">
                                                                <a class="" href="<?php echo e($item_sub->url_link); ?>"
                                                                    title="<?php echo e($item_sub->name ?? ''); ?>">
                                                                    <?php echo e($item_sub->name ?? ''); ?>

                                                                </a>
                                                            </li>
                                                        <?php else: ?>
                                                            <li class="has-children">
                                                                <a class="caret-down" href="<?php echo e($item_sub->url_link); ?>"
                                                                    title="<?php echo e($item_sub->name ?? ''); ?>">
                                                                    <?php echo e($item_sub->name ?? ''); ?>

                                                                </a>
                                                                <i class="fa fa-caret-down"></i>
                                                                <ul class="dropdown">
                                                                    <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sub_2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if($item_sub_2->parent_id == $item_sub->id): ?>
                                                                            <?php if($item_sub_2->sub <= 0): ?>
                                                                                <li class="">
                                                                                    <a class=""
                                                                                        href="<?php echo e($item_sub_2->url_link); ?>"
                                                                                        title="<?php echo e($item_sub_2->name ?? ''); ?>">
                                                                                        <?php echo e($item_sub_2->name ?? ''); ?>

                                                                                    </a>
                                                                                </li>
                                                                            <?php else: ?>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </li>
                        <li>
                            <div class="d-lg-flex nav-link">
                                <a href="tel:<?php echo e($web_information->information->phone); ?>" class="nav-link"><button
                                        class="btn btn-success bg_green text-uppercase bora-30 text-uppercase">
                                        <?php echo app('translator')->get('Đăng ký học thử'); ?>
                                    </button></a>
                                <div class="text-left">
                                    <p class="f-w-500">

                                        <svg class="mr-2 mb-1" width="20" height="20" viewBox="0 0 20 20"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 0C4.47581 0 0 4.47581 0 10C0 15.5242 4.47581 20 10 20C15.5242 20 20 15.5242 20 10C20 4.47581 15.5242 0 10 0ZM12.3024 14.1169L8.74597 11.5323C8.62097 11.4395 8.54839 11.2944 8.54839 11.1411V4.35484C8.54839 4.08871 8.76613 3.87097 9.03226 3.87097H10.9677C11.2339 3.87097 11.4516 4.08871 11.4516 4.35484V9.90726L14.0121 11.7702C14.2298 11.9274 14.2742 12.2298 14.1169 12.4476L12.9798 14.0121C12.8226 14.2258 12.5202 14.2742 12.3024 14.1169Z"
                                                fill="#383937" />
                                        </svg>

                                        <?php echo e($web_information->information->appointment); ?>

                                    </p>
                                    <p>
                                        <svg class="mr-2" width="16" height="23" viewBox="0 0 16 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.3344 22.2998C5.88425 21.6669 0.368826 15.1151 1.00083 7.67607C1.0286 7.34921 1.27884 7.08842 1.59894 7.04265L4.67925 6.60222C4.84166 6.57899 5.00708 6.61358 5.14658 6.69993C5.28608 6.78629 5.3908 6.91892 5.44243 7.07466L6.56035 10.4465C6.6081 10.5905 6.60773 10.7462 6.5593 10.89C6.51087 11.0338 6.417 11.158 6.29184 11.2438L4.40865 12.5349C5.28264 14.9004 6.98151 16.887 9.12007 18.1212L10.7104 16.4827C10.8161 16.3738 10.9543 16.3023 11.1042 16.2788C11.2541 16.2553 11.4076 16.2812 11.5415 16.3526L14.6765 18.0233C14.8213 18.1005 14.9343 18.2261 14.9959 18.3782C15.0575 18.5302 15.0637 18.6991 15.0134 18.8553L14.0596 21.8171C14.0111 21.9677 13.913 22.0974 13.7813 22.1851C13.6496 22.2728 13.492 22.3132 13.3344 22.2998ZM7.19599 5.56329C8.09033 5.8766 8.74543 6.65335 8.90337 7.58773C8.95611 7.89968 8.70435 8.17943 8.38863 8.15931L8.05242 8.13793C7.83234 8.12395 7.65073 7.9643 7.60386 7.74885C7.55859 7.5413 7.46333 7.34793 7.32637 7.18554C7.18941 7.02315 7.01489 6.89664 6.81795 6.817C6.61346 6.73448 6.48677 6.52852 6.51011 6.30924L6.54577 5.97423C6.5792 5.65964 6.89741 5.45868 7.19599 5.56329ZM7.65906 0.316686C11.4098 0.966526 14.1451 4.21279 14.1529 8.01635C14.1535 8.29954 13.9138 8.52402 13.6312 8.50605L13.3049 8.48529C13.0483 8.46895 12.8474 8.25714 12.8461 8C12.8297 4.8432 10.561 2.15576 7.45473 1.60751C7.2015 1.5628 7.02658 1.32913 7.0538 1.07341L7.08838 0.748309C7.11834 0.466731 7.38003 0.268337 7.65906 0.316686ZM7.40796 2.92175C9.74552 3.41709 11.4487 5.43291 11.5428 7.82439C11.5542 8.11515 11.3117 8.35215 11.0214 8.33361L10.6939 8.31269C10.4462 8.29688 10.2472 8.0986 10.2358 7.85066C10.1544 6.07862 8.89437 4.58472 7.16157 4.20559C6.91911 4.15255 6.75728 3.92291 6.78345 3.67611L6.81808 3.3498C6.84878 3.06046 7.1233 2.86142 7.40796 2.92175Z" fill="#383937"/>
                                            </svg>
                                            
                                            <span
                                            class="red f-w-500"><?php echo e($web_information->information->phone); ?></span>
                                        <?php echo app('translator')->get('For Appointment'); ?>
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="toggle-button d-inline-block d-lg-none">
                <a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span
                        class="icon-menu h3"></span></a>
            </div>
        </div>
    </div>
</header>
<?php /**PATH C:\xampp\htdocs\yoga\resources\views/frontend/blocks/header/styles/default.blade.php ENDPATH**/ ?>