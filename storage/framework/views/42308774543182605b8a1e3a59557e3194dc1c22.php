

<?php
  $page_title = $taxonomy->title ?? ($page->title ?? ($page->name ?? ''));
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
?>
<?php $__env->startPush('style'); ?>
  <style>
    body {
      line-height: 1.5;
      color: #000000;
      font-family: Muli, sans-serif;
    }

    .highlights-tag {
      position: absolute;
      right: 0px;
      top: -20px;
      padding: 16px 10px 60px 10px;
      font-weight: 700;
      color: #FFE351;
      background-image: url("data:image/svg+xml,%3Csvg width='89' height='100' viewBox='0 0 89 120' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 0H89V120L44.5 72L0 120V0Z' fill='%23D42027'/%3E%3C/svg%3E%0A");
      background-size: contain;
      background-repeat: no-repeat;
    }

    .bg-secondary {
      background-color: #a7acb0 !important;
    }

    .pricing-title {
      padding: 1rem 0;
      background-color: #f9f9f9;
      border-bottom: 1px solid rgba(0, 0, 0, .075);
      letter-spacing: 1px;
    }

    #content-detail ul,
    #content-detail ol {
      list-style: inherit;
      padding: 0 0 0 50px;
    }
  </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
  
  <?php if(isset($page->content) && $page->content != ''): ?>
    <div class="section bg-white m-0" id="content-detail">
      <div class="container">
        <?php echo $page->content ?? ''; ?>

      </div>
    </div>
  <?php endif; ?>
  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\fhmvn\resources\views/frontend/pages/custom/index.blade.php ENDPATH**/ ?>