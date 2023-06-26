 <!-- Stylesheets ============================================= -->
 <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,900&amp;display=swap" rel="stylesheet"
   type="text/css" />
 <link rel="stylesheet" id="flatsome-googlefonts-css"
   href="//fonts.googleapis.com/css?family=Roboto+Condensed%3Aregular%2Cregular%2C700%7CRoboto%3Aregular%2Cregular%7CDancing+Script%3Aregular%2C400&amp;display=swap&amp;ver=3.9"
   type="text/css" media="all" />

 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/it/css/bootstrap.css')); ?>" type="text/css" />
 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/it/css/swiper.css')); ?>" type="text/css" />
 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/it/style.css')); ?>" type="text/css" />

 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/it/css/dark.css')); ?>" type="text/css" />
 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/it/css/font-icons.css')); ?>" type="text/css" />
 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/it/css/animate.css')); ?>" type="text/css" />
 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/it/css/magnific-popup.css')); ?>" type="text/css" />

 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/it/css/custom.css')); ?>" type="text/css" />

 <!-- Seo Demo Specific Stylesheet -->
 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/it/demos/photographer/css/fonts.css')); ?>" type="text/css" />
 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/it/demos/seo/seo.css')); ?>" type="text/css" />
 <!-- Photographer Specific Stylesheet -->
 <link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/frontend/it/demos/photographer/css/menu.css')); ?>" />

 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/it/demos/photographer/photographer.css')); ?>" type="text/css" />

 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/it/fhm_it-profile.css')); ?>" type="text/css" />
 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/it/fhm_it-profile-repsonsive.css')); ?>" type="text/css" />
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

   .price-number {
     font-family: "Roboto Condensed", sans-serif;
   }

   .pricing-price span.price-tenure {
     color: #333;
   }

   .heading-block h2 {
     font-size: 2rem;
   }

   .dark .top-links-item>a {
     color: #eee;
   }

   .dark #top-social li a {
     color: #eee;
   }

   .main-color {
     color: #0C4DA2 !important;
   }

   h3>span:not(.nocolor):not(.badge) {
     color: gold;
   }


   #page-title.page-title-parallax .breadcrumb {
     justify-content: left;
     margin: 0 0 20px 0 !important;
   }

   #page-title.page-title-parallax h1 {
     text-align: left;
     letter-spacing: 0;
     line-height: 1.25;
   }

   #content-detail ul,
   #content-detail ol {
     margin-bottom: 0px;
   }

   @media (min-width: 992px) {
     .slider-title h1 {
       font-size: 50px;
       line-height: 1.3;
       letter-spacing: -1px;
       font-weight: 700;
       margin-bottom: 26px;
     }
   }

   .text-justify {
     text-align: justify;
   }

   .faqlist li {
     display: block !important;
   }

   .immersion-box {
     -webkit-box-shadow: 20px 30px 50px 0px rgba(0, 0, 0, 0.35);
     -moz-box-shadow: 20px 30px 50px 0px rgba(0, 0, 0, 0.35);
     box-shadow: 20px 30px 50px 0px rgba(0, 0, 0, 0.35);
   }

   a.immersion-link2:link,
   a.immersion-link2:visited {
     color: #fff !important;
     text-decoration: underline !important;
     font-size: inherit !important;
   }

   a.immersion-link2:hover,
   a.immersion-link2:active {
     color: rgba(255, 255, 255, 0.5) !important;
     text-decoration: none !important;
   }

   .im-autow {
     width: auto !important;
   }

   h2 span {
     -webkit-text-stroke: 1px var(--pri-color);
     color: transparent !important;
     display: block;
   }

   .badge {
     padding: 0;
   }
 </style>

 <?php if(isset($web_information->source_code->header)): ?>
   <?php echo $web_information->source_code->header; ?>

 <?php endif; ?>
<?php /**PATH D:\project\it\resources\views/frontend/panels/styles.blade.php ENDPATH**/ ?>