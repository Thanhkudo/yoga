

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
<?php $__env->startPush('style'); ?>
  <style>
    .product .entry-image {
      position: relative !important;
    }

    .product .entry-title {
      position: absolute;
      bottom: 0;
      background-color: #FFF;
      opacity: 0.75;
      left: 50%;
      width: 100%;
      transform: translateX(-50%);
      padding: 10px 0px;
    }

    .entry-image a.img-link {
      height: 400px;
      overflow: hidden;
    }

    .link-hover:hover {
      background-color: green !important;
    }

    .entry-image img {
      height: 100%;
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
      <div class="container mb-3">

        <div class="row mb-5 clearfix">
          <div class="postcontent col-lg-12">
            <div class="row">
              <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $title = $item->json_params->title->{$locale} ?? $item->title;
                  $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                  $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                  // $date = date('H:i d/m/Y', strtotime($item->created_at));
                  $date = date('d', strtotime($item->created_at));
                  $month = date('M', strtotime($item->created_at));
                  $year = date('Y', strtotime($item->created_at));
                  // Viet ham xu ly lay slug
                  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
                  $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
                ?>
                <div class="col-md-6 col-lg-4 product">
                  <article class="entry">
                    <div class="entry-image mb-3">
                      <a href="<?php echo e($alias); ?>" class="img-link"><img src="<?php echo e($image); ?>"
                          alt="<?php echo e($title); ?>"></a>

                      <div class="bg-overlay">
                        <div class="bg-overlay-content dark flex-column" data-hover-animate="fadeIn">
                          <div class="d-flex mb-3" style="width:75%">
                            <a href="<?php echo e($alias); ?>" data-hover-animate="fadeInDownSmall"
                              data-hover-animate-out="fadeOutDownSmall" data-hover-speed="1000"
                              style="border: 1px solid #FFFFFF;width:100%; text-align:center;"
                              class="bg-transparent text-light animated py-2 px-5 fadeOutDownSmall link-hover">
                              XEM CHI TIẾT
                              <i class="icon-line-arrow-right"></i>
                            </a>
                          </div>
                          <?php if(isset($item->json_params->shop_online)): ?>
                            <div class="d-flex" style="width:75%">
                              <a href="<?php echo e($item->json_params->shop_online ?? ''); ?>" data-hover-animate="fadeInUpSmall"
                                data-hover-animate-out="fadeOutDownSmall" data-hover-speed="1000"
                                style="border: 1px solid #FFFFFF; width:100%; text-align:center;"
                                class="bg-transparent text-light animated py-2 px-5 fadeOutDownSmall link-hover">
                                SHOP ONLINE
                                <i class="icon-line-shopping-cart"></i>
                              </a>
                            </div>
                          <?php endif; ?>

                        </div>
                        <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                      </div>
                    </div>
                    <div class="entry-title text-center">
                      <h3><a href="<?php echo e($alias); ?>"><?php echo e($title); ?></a></h3>
                    </div>
                  </article>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php echo e($posts->withQueryString()->links('frontend.pagination.default')); ?>

            </div>
          </div>

          

        </div>
      </div>
    </div>
  </section>
  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\thaiever\resources\views/frontend/pages/product/category.blade.php ENDPATH**/ ?>