<link
		href="https://fonts.googleapis.com/css?family=PT+Sans+Caption:400,700|PT+Sans:400,700|PT+Serif:400,400i&amp;display=swap"
		rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/css/bootstrap.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/style.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/css/dark.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/demos/barber/barber.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/demos/barber/css/fonts.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/css/font-icons.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/css/animate.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/css/magnific-popup.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/one-page/css/et-line.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/css/custom.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/css/colors7abb.css?color=BF9456')); ?>" />

<!-- Real Estate Demo Specific Stylesheet -->
  <style>
    /* Page Loading Style */
    .css3-spinner {
        height: 100vh;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        background-color: #bF9456;
    }

    @keyframes  pulse {
        0% {
            opacity: 0;
            -webkit-transform: scale3d(.8, .8, .8);
            transform: scale3d(.8, .8, .8);
        }

        50% {
            opacity: 1;
        }
    }

    .infinite.animated.pulse {
        -webkit-animation-duration: 1.7s;
        animation-duration: 1.7s;
    }
</style>

<?php if(isset($web_information->source_code->header)): ?>
  <?php echo $web_information->source_code->header; ?>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\barber\resources\views/frontend/panels/styles.blade.php ENDPATH**/ ?>