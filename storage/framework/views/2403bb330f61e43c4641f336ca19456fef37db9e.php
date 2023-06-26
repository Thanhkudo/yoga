<link href="https://fonts.googleapis.com/css?family=Lora:400,400i|Roboto:300,400,500,700|Rubik:400,600&amp;display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/css/bootstrap.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/style.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/css/dark.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/demos/real-estate/real-estate.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/demos/real-estate/css/font-icons.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/css/font-icons.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/css/animate.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/css/magnific-popup.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/demos/real-estate/fonts.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/css/components/bs-select.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/css/components/bs-switches.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/css/components/ion.rangeslider.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/css/custom.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/css/colorsbf2e.css?color=2C3E50')); ?>" type="text/css" />

<style>
    .contact-section {
        position: absolute;
        display: block;
        top: 0;
        right: 0;
        width: 50%;
        padding: 60px 60px 60px 180px;
        z-index: 0;
    }

    .contact-image {
        position: relative;
        width: 60%;
        margin-top: 30px;
        z-index: 2;
        box-shadow: 0 0 40px rgba(0, 0, 0, .3);
    }

    .hidden {
        display: none;
    }

    @media (max-width: 991px) {
        .contact-section {
            position: relative;
            display: block;
            width: 100%;
            padding: 20px;
        }

        .contact-image {
            width: 100%;
            margin-top: 0;
        }
    }
</style>

<?php if(isset($web_information->source_code->header)): ?>
    <?php echo $web_information->source_code->header; ?>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\raovat\resources\views/frontend/panels/styles.blade.php ENDPATH**/ ?>