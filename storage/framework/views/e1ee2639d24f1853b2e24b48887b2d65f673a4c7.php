

<?php
$page_title = $taxonomy->title ?? ($page->title ?? $page->name);
$image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
$str_alias = '.html?id=';
?>
<?php $__env->startPush('style'); ?>
  <style>

  </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
  
  <section class="page-title" id="page-title" style="background: url('<?php echo e($image_background); ?>') center center no-repeat;">
    <div class="container">
      <div class="content">
        <h2 class="text-uppercase"><?php echo e($page_title); ?></h2>
      </div>
    </div>
  </section>

  <section class="events bg-light">
    <div class="container">
      <div class="row">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay alias bai viet
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['service'], $item->taxonomy_title, $item->taxonomy_id);
            $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['service'], $title, $item->id, 'detail');
          ?>
          <div class="col-lg-6">
            <div class="event">
              <div class="event-img">
                <a href="<?php echo e($alias); ?>">
                  <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">
                </a>
              </div>
              <div class="event-content">
                <div class="event-title">
                  <a href="<?php echo e($alias); ?>">
                    <h4><?php echo e($title); ?></h4>
                  </a>
                </div>
                <div class="event-text">
                  <p><?php echo e(Str::limit($brief, 100)); ?></p>
                </div>
                <a class="event-more" href="<?php echo e($alias); ?>"><?php echo app('translator')->get('View detail'); ?></a>
              </div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <?php echo e($posts->withQueryString()->links('frontend.pagination.default')); ?>


    </div>
  </section>

  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\fhmvn\resources\views/frontend/pages/service/default.blade.php ENDPATH**/ ?>