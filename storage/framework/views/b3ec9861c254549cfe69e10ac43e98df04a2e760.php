<?php
  $page_title = $taxonomy->title ?? ($page->title ?? $page->name);
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');

  $title = $taxonomy->json_params->title->{$locale} ?? ($taxonomy->title ?? null);
  $image = $taxonomy->json_params->image ?? null;
  $seo_title = $taxonomy->json_params->seo_title ?? $title;
  $seo_keyword = $taxonomy->json_params->seo_keyword ?? null;
  $seo_description = $taxonomy->json_params->seo_description ?? null;
  $seo_image = $image ?? null;
  $str_alias = '.html?id=';
?>
<?php $__env->startPush('style'); ?>
  <style>
    #services .article img {
      height: 350px;
    }
  </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
  
  <section id="page-title" class="page-title-parallax page-title-center page-title"
    style="background-image: url('<?php echo e($image_background); ?>'); background-size: cover;"
    data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">
    <div id="particles-line"></div>

    <div class="container clearfix mt-4">
      
      <ol class="breadcrumb d-none">
        <li class="breadcrumb-item"><a href="<?php echo e(route('frontend.home')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo e($page->name ?? ''); ?></li>
      </ol>
      <h1 class=""><?php echo e($page_title); ?></h1>
    </div>
  </section>

  <section id="content">

    <div class="content-wrap">

      <div id="projects" class="container">

        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay alias bai viet
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['resource'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
            $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['resource'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
          ?>
          <div class="row d-flex align-items-center">
            <div class="col-lg-4 col-sm-12 pe-4">
              <a href="<?php echo e($alias); ?>">
                <h3><?php echo e($title); ?></h3>
              </a>
              <p>
                <?php echo e(Str::limit($brief, 500)); ?>

              </p>
              <a href="<?php echo e($alias); ?>" class="button mx-0"><?php echo app('translator')->get('View more'); ?></a>
            </div>
            <div class="col-lg-8 col-sm-12">
              <a href="<?php echo e($alias); ?>"><img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>"
                  style="width: 100%" /></a>
            </div>
          </div>
          <div class="row mt-6">
            <div class="col-sm-6 col-lg-4 mb-3">
              <div class="feature-box fbox-lg fbox-effect">
                <div class="fbox-icon">
                  <i class="icon-line-map-pin"></i>
                </div>
                <div class="fbox-content d-flex flex-column justify-content-center">
                  <h3 class="text-uppercase"><?php echo app('translator')->get('Place'); ?></h3>
                  <p><?php echo e($item->json_params->place ?? ''); ?></p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4 mb-3">
              <div class="feature-box fbox-lg fbox-effect">
                <div class="fbox-icon">
                  <i class="icon-line2-size-fullscreen"></i>
                </div>
                <div class="fbox-content d-flex flex-column justify-content-center">
                  <h3 class="text-uppercase"><?php echo app('translator')->get('Total area'); ?></h3>
                  <p><?php echo e($item->json_params->area ?? ''); ?></p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4 mb-3">
              <div class="feature-box fbox-lg fbox-effect">
                <div class="fbox-icon">
                  <i class="icon-certificate1"></i>
                </div>
                <div class="fbox-content d-flex flex-column justify-content-center">
                  <h3 class="text-uppercase"><?php echo app('translator')->get('Project scale'); ?></h3>
                  <p><?php echo e($item->json_params->scale ?? ''); ?></p>
                </div>
              </div>
            </div>
          </div>
          <?php if(!$loop->last): ?>
            <div class="clear line my-5"></div>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        <?php echo e($posts->withQueryString()->links('frontend.pagination.default')); ?>


      </div>
    </div>
  </section>
  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\raovat\resources\views/frontend/pages/resource/category.blade.php ENDPATH**/ ?>