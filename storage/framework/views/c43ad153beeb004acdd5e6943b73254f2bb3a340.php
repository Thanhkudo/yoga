<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/thaiever/css/bootstrap.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/thaiever/style.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/thaiever/css/swiper.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/thaiever/css/dark.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/thaiever/css/font-icons.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/thaiever/css/animate.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/thaiever/css/magnific-popup.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/thaiever/css/custom.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/thaiever/demos/shop/css/fonts.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/thaiever/fhm_thaiever.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/thaiever/fhm_thaiever-introduce.css')); ?>" />

<!-- Real Estate Demo Specific Stylesheet -->
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/thaiever/demos/real-estate/real-estate.css')); ?>"
  type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/thaiever/demos/real-estate/css/font-icons.css')); ?>"
  type="text/css" />

<style>
  html {
    scroll-behavior: smooth;
  }

  :root {
    scroll-behavior: smooth;
  }

  :target:before {
    content: "";
    display: block;
    margin: 25px 0 0;
  }

  .breadcrumb-item+.breadcrumb-item::before {
    float: left;
    padding-right: 0.5rem;
    color: #6c757d;
    content: var(--bs-breadcrumb-divider, "/");
  }
</style>

<?php if(isset($web_information->source_code->header)): ?>
  <?php echo $web_information->source_code->header; ?>

<?php endif; ?>
<?php /**PATH D:\project\thaiever\resources\views/frontend/panels/styles.blade.php ENDPATH**/ ?>