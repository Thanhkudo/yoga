

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
    .page-title-area {
      background-image: url('<?php echo e($image_background); ?>');
      background-position: center center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    .elementor-656 .elementor-element.elementor-element-11ee35d0 {
      padding: 80px 0px 30px 0px;
    }
  </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
  
  <div class="page-title-area">
    <div class="container">
      <span class="page-tag"><?php echo e($page->name ?? ''); ?></span>
      <h2 class="page-title"><?php echo e($page_title); ?></h2>

      <ul class="breadcrumb-nav">
        <li><a href="<?php echo e(route('frontend.home')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
        <li class="active"><?php echo e($page->name ?? ''); ?></li>
      </ul>
    </div>
  </div>

  <div class="entry-page">
    <div class="site-container fullwidth-container">
      <div class="site-content-wrapper no-sidebar">
        <div class="content-area" style="margin-bottom: 50px">

          <div id="post-656" class="page-inner clearfix post-656 page type-page status-publish hentry">
            <div data-elementor-type="wp-page" data-elementor-id="656" class="elementor elementor-656">
              <section
                class="elementor-section elementor-top-section elementor-element elementor-element-11ee35d0 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                data-id="11ee35d0" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                  <div
                    class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5dbd99a"
                    data-id="5dbd99a" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                      <div
                        class="elementor-element elementor-element-6cee3c1c elementor-widget elementor-widget-yankee-fancy-boxes"
                        data-id="6cee3c1c" data-element_type="widget" data-widget_type="yankee-fancy-boxes.default">
                        <div class="elementor-widget-container">
                          <div class="yankee-service-boxes column-d-4 column-t-2 column-s-2 column-xs-1">

                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php
                                $title = $item->json_params->title->{$locale} ?? $item->title;
                                $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                                $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                                $date = date('H:i d/m/Y', strtotime($item->created_at));
                                // Viet ham xu ly lay alias bai viet
                                $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['service'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
                                $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['service'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
                                
                              ?>
                              <div class="service-box">
                                <div class="icon">
                                  <a href="<?php echo e($alias); ?>">
                                    <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">
                                  </a>
                                </div>
                                <h4 class="title"><a href="<?php echo e($alias); ?>"><?php echo e($title); ?></a>
                                </h4><a href="<?php echo e($alias); ?>" class="service-link"><i
                                    class="fal fa-arrow-right"></i></a>
                              </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </div>
          </div>
          <?php echo e($posts->withQueryString()->links('frontend.pagination.default')); ?>

        </div>
      </div>
    </div>
  </div>
  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\kon10ted\resources\views/frontend/pages/service/category.blade.php ENDPATH**/ ?>