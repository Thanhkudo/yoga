

<?php
$page_title = $taxonomy->title ?? ($page->title ?? $page->name);
$image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');

$title = $taxonomy->json_params->title->{$locale} ?? ($taxonomy->title ?? null);
$image = $taxonomy->json_params->image ?? null;
$seo_title = $taxonomy->json_params->seo_title ?? $title;
$seo_keyword = $taxonomy->json_params->seo_keyword ?? null;
$seo_description = $taxonomy->json_params->seo_description ?? null;
$seo_image = $image ?? null;

?>

<?php $__env->startSection('content'); ?>
  
  <section id="page-title" class="page-title-parallax page-title-center page-title-dark include-header"
    style="background-image: linear-gradient(to top, rgba(254,150,3,0.5), #39384D), url('<?php echo e($image_background); ?>'); background-size: cover; padding: 120px 0;"
    data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">
    <div id="particles-line"></div>

    <div class="container clearfix mt-4">
      
      
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('frontend.home')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('frontend.cms.product')); ?>"><?php echo e($page->name ?? ''); ?></a></li>
      </ol>
      <h1><?php echo e($page_title); ?></h1>
    </div>
  </section>
  
  <section id="content">

    <div class="content-wrap">
      <div class="container mb-3">

        <div class="row mb-5">
          <div class="col-12">

            <?php if(isset($taxonomys)): ?>
              <?php
                $color = ['aqua', 'blue', 'amber', 'red'];
              ?>
              <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $title = $item->json_params->title->{$locale} ?? $item->title;
                  $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                  // Viet ham xu ly lay slug
                  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id);
                  
                ?>
                <a href="<?php echo e($alias_category); ?>"
                  class="button button-border button-rounded button-fill button-<?php echo e($color[$loop->index % 4]); ?> ms-0">
                  <span><?php echo e($title); ?></span>
                </a>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>
        </div>

        <div class="row">
          <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $brief = $item->json_params->brief->{$locale} ?? $item->brief;
              $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
              $date = date('H:i d/m/Y', strtotime($item->created_at));
              // Viet ham xu ly lay slug
              $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->taxonomy_title, $item->taxonomy_id);
              $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id, 'detail', $item->taxonomy_title);
            ?>
            <article class="portfolio-item col-12 col-sm-6 col-md-3 pf-media pf-icons text-center mb-5">
              <div class="grid-inner" style="box-shadow: 0 0 10px 0 rgb(0 0 0 / 30%); border-radius: 10px">
                <div class="portfolio-image" style="max-height: 350px; overflow: hidden; ">
                  <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" style="height: 100%">
                  <div class="bg-overlay">
                    <div class="bg-overlay-content dark" data-hover-animate="fadeIn" data-hover-speed="500">
                      <a href="<?php echo e($alias); ?>" class="overlay-trigger-icon bg-light text-dark"
                        data-hover-animate="fadeIn" data-hover-speed="500"><i class="icon-line-ellipsis"></i></a>
                    </div>
                    <div class="bg-overlay-bg dark" data-hover-animate="fadeIn" data-hover-speed="500"></div>
                  </div>
                </div>
                <div class="portfolio-desc">
                  <h3><a href="<?php echo e($alias); ?>"><?php echo e($title); ?></a></h3>
                  <span><?php echo e($brief); ?></span>
                </div>
              </div>
            </article>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
        
        <?php echo e($posts->withQueryString()->links('frontend.pagination.default')); ?>


      </div>
    </div>
  </section>
  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\kon10ted\resources\views/frontend/pages/product/category.blade.php ENDPATH**/ ?>