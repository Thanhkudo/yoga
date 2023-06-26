

<?php
  $page_title = $taxonomy->title ?? ($page->title ?? ($page->name ?? ''));
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
?>
<?php $__env->startPush('style'); ?>
  <style>

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

<?php echo $__env->make('frontend.layouts.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\thaiever\resources\views/frontend/pages/custom/index.blade.php ENDPATH**/ ?>