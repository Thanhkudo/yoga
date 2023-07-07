<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/yoga/css/all.min.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/yoga/fonts/icomoon/style.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/yoga/css/owl.carousel.min.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/yoga/css/bootstrap.min.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/yoga/css/magnific-popup.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/yoga/css/slick.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/yoga/css/slick-theme.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/yoga/css/style.css')); ?>" type="text/css" />


<style>
    .section_tab_product .tab-container {
        position: relative;
        width: 100%;
    }

    .section_tab_product .tab-container .tab-item-product {
        display: block;
        position: absolute;
        top: 0px;
        left: 0px;
        z-index: 0;
        width: 100%;
        opacity: 0;
    }

    .section_tab_product .tab-container .tab-item-product.current {
        display: block;
        position: relative;
        z-index: 1;
        opacity: 1;
    }

    @media (min-width: 992px) {
        .header .site-nav:before {
            content: "";
            background-image: url(<?php echo e(asset('images/bg_menu1.png')); ?>);
            position: absolute;
            width: 100%;
            height: 36px;
            top: 100%;
            left: 0;
            z-index: 9;
        }
    }

    .alert-fixed {
        padding-right: 2rem;
    }
</style>

<?php if(isset($web_information->source_code->header)): ?>
    <?php echo $web_information->source_code->header; ?>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\yoga\resources\views/frontend/panels/styles.blade.php ENDPATH**/ ?>