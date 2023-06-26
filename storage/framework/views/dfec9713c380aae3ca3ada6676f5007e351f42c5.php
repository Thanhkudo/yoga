

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

  <div class="entry-posts entry-page-padding">
    <div class="site-container">
      <div class="site-content-wrapper right-sidebar">
        <div class="content-area">
          <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $brief = $item->json_params->brief->{$locale} ?? $item->brief;
              $image = $item->image != '' ? $item->image : ($item->image_thumb != '' ? $item->image_thumb : null);
              // $date = date('H:i d/m/Y', strtotime($item->created_at));
              $date = date('d', strtotime($item->created_at));
              $month = date('M', strtotime($item->created_at));
              $year = date('Y', strtotime($item->created_at));
              // Viet ham xu ly lay slug
              $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
              $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
            ?>
            <div
              class="entry-single-post post-1695 post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized tag-wp">

              <div class="entry-media clearfix">
                <a href="<?php echo e($alias); ?>">
                  <img width="790" height="460" src="<?php echo e($image); ?>"
                    class="attachment-yankee-post-thumbnail size-yankee-post-thumbnail wp-post-image" alt="" />
                </a>
              </div>

              <div class="entry-summary">
                <ul class="post-categories">
                  <li><a href="<?php echo e($alias_category); ?>" rel="category tag"><?php echo e($item->taxonomy_title); ?></a></li>
                </ul>
                <h2 class="entry-title">
                  <a href="<?php echo e($alias); ?>" rel="bookmark">
                    <?php echo e($title); ?>

                  </a>
                </h2>
                <div class="entry-meta">
                  <ul>
                    <li>
                      <a href="javascript:void(0)"><i class="fal fa-eye"></i><?php echo e($item->count_visited); ?></a>
                    </li>
                    <li>
                      <a href="javascript:void(0)"><i class="fal fa-calendar-alt"></i>
                        <?php echo e($date); ?> <?php echo e($month); ?> <?php echo e($year); ?>

                      </a>
                    </li>
                  </ul>
                </div>
                <p><?php echo e($brief); ?></p>
                <div class="summary-footer">
                  <a href="<?php echo e($alias); ?>" class="read-more"><i class="far fa-arrow-right"></i> <?php echo app('translator')->get('Read more'); ?>
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php echo e($posts->withQueryString()->links('frontend.pagination.default')); ?>


        </div>

        <?php echo $__env->make('frontend.components.sidebar.post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\kon10ted\resources\views/frontend/pages/post/category.blade.php ENDPATH**/ ?>