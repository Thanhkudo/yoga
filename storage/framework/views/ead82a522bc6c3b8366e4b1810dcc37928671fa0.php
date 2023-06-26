  <!-- Font Awesome Css -->
  <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/qlady/css/font-awesome.min.css')); ?>" />
  <!-- Flaticon -->
  <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/qlady/fonts/flaticon.css')); ?>" />
  <!-- Bootstrap 4 Css -->
  <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/qlady/css/bootstrap.min.css')); ?>" />
  <!-- Owl Carousel Css -->
  <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/qlady/css/owl.carousel.min.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/qlady/css/owl.theme.default.min.css')); ?>" />
  <!-- Animate Css -->
  <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/qlady/css/animate.min.css')); ?>" />
  <!-- Main Style Css -->
  <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/qlady/css/main.css')); ?>" />

  <!-- Inner Pages Style Css -->
  <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/qlady/css/inner-pages.css')); ?>">

  <style>
    .services .service .service-icon img {
      background: gold;
      display: inline-block;
      width: 70px;
      height: 70px;
      color: #fff;
      line-height: 70px;
      text-align: center;
      border-radius: 50%;
      -webkit-transition: all 0.2s cubic-bezier(0.47, 0, 0.745, 0.715);
      transition: all 0.2s cubic-bezier(0.47, 0, 0.745, 0.715);
      -webkit-animation: pulse 2s infinite cubic-bezier(0.66, 0, 0, 1);
      animation: pulse 2s infinite cubic-bezier(0.66, 0, 0, 1);
      -webkit-box-shadow: 0 0 0 0 rgba(123, 108, 213, 0.6);
      box-shadow: 0 0 0 0 rgba(123, 108, 213, 0.6);
    }

    @media  screen and (max-width: 991px) {
      .home .owl-carousel {
        height: 100vw;
      }

      .home {
        height: 100vw;
      }

      .display-table-cell {
        height: 100vw;
      }

      .about-us .info {
        order: -1;
      }
    }

    html {
      scroll-behavior: smooth;
    }

    :target:before {
      content: "";
      display: block;
      margin: 25px 0 0;
    }

    .blog .blog-sidebar .sidebar-posts .post-info h5 a:hover,
    .blog .blog-sidebar .tags-list li a:hover {
      color: goldenrod;
    }

    .blog .post .post-content .post-text p {
      padding: 0 !important;
      margin-bottom: 10px;
      color: #000000;
    }
  </style>
  <?php if(isset($web_information->source_code->css)): ?>
    <style>
      <?php echo $web_information->source_code->css; ?>

    </style>
  <?php endif; ?>
<?php /**PATH D:\project\qlady\resources\views/frontend/panels/styles.blade.php ENDPATH**/ ?>