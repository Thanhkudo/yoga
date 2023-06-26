

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
  <section class="blog bg-light" id="blog">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <?php if($posts): ?>
            <div class="row">

              <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $title = $item->json_params->title->{$locale} ?? $item->title;
                  $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                  $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                  $date = date('H:i d/m/Y', strtotime($item->created_at));
                  // Viet ham xu ly lay alias bai viet
                  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_title, $item->taxonomy_id);
                  $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $title, $item->id, 'detail');
                ?>

                <div class="col-lg-6 col-12">
                  <div class="post">
                    <!-- Post Image -->
                    <div class="post-img">
                      <a href="<?php echo e($alias); ?>">
                        <img src="<?php echo e($image); ?>" class="img-fluid" alt="<?php echo e($title); ?>">
                      </a>
                    </div>
                    <!-- Post Content -->
                    <div class="post-content">
                      <div class="post-title">
                        <a href="<?php echo e($alias); ?>">
                          <h4><?php echo e($title); ?></h4>
                        </a>
                      </div>
                      <div class="post-text">
                        <p><?php echo e(Str::limit($brief, 100)); ?></p>
                      </div>
                      <ul class="post-info list-unstyled">
                        <li class="pull-left">
                          <a href="<?php echo e($alias); ?>" class="post-more">
                            <?php echo app('translator')->get('Read more'); ?>
                            <i class="fa fa-angle-double-right"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            <?php echo e($posts->withQueryString()->links('frontend.pagination.default')); ?>

          <?php else: ?>
            <div class="row">
              <div class="col-12">
                <p><?php echo app('translator')->get('not_found'); ?></p>
              </div>
            </div>
          <?php endif; ?>
        </div>
        <div class="col-lg-4">
          <div class="blog-sidebar">
            <div class="sidebar-search">
              <form action="<?php echo e(route('frontend.search.index')); ?>" method="GET">
                <div class="form-group">
                  <input type="text" class="form-control" name="keyword" placeholder="<?php echo app('translator')->get('Type and hit enter...'); ?>" required>
                  <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                </div>
              </form>
            </div>

            <?php if(count($latestPosts) > 0): ?>
              <div class="sidebar-posts">
                <h4 class="title-widget text-uppercase"><?php echo app('translator')->get('Latest post'); ?></h4>
                <?php $__currentLoopData = $latestPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $title = $item->json_params->title->{$locale} ?? $item->title;
                    $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                    $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                    $date = date('d/m/Y', strtotime($item->created_at));
                    // Viet ham xu ly lay slug
                    $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_title, $item->taxonomy_id);
                    $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $title, $item->id, 'detail');
                  ?>
                  <div class="post-inner mb-5">
                    <div class="post-image">
                      <a href="<?php echo e($alias); ?>">
                        <img class="img-fluid" src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">
                      </a>
                    </div>
                    <div class="post-info">
                      <h5>
                        <a href="<?php echo e($alias); ?>">
                          <?php echo e(Str::limit($title, 20)); ?>

                        </a>
                      </h5>
                      <p><?php echo e($date); ?></p>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            <?php endif; ?>
            <?php if(count($viewPosts) > 0): ?>
              <div class="sidebar-posts">
                <h4 class="title-widget text-uppercase"><?php echo app('translator')->get('Most viewed post'); ?></h4>
                <?php $__currentLoopData = $viewPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $title = $item->json_params->title->{$locale} ?? $item->title;
                    $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                    $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                    $date = date('d/m/Y', strtotime($item->created_at));
                    // Viet ham xu ly lay slug
                    $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_title, $item->taxonomy_id);
                    $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $title, $item->id, 'detail');
                  ?>
                  <div class="post-inner mb-5">
                    <div class="post-image">
                      <a href="<?php echo e($alias); ?>">
                        <img class="img-fluid" src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">
                      </a>
                    </div>
                    <div class="post-info">
                      <h5>
                        <a href="<?php echo e($alias); ?>">
                          <?php echo e(Str::limit($title, 20)); ?>

                        </a>
                      </h5>
                      <p><?php echo e($date); ?></p>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            <?php endif; ?>

            <?php if(isset($featuredTags) && count($featuredTags) > 0): ?>
              <div class="sidebar-tags">
                <h4 class="text-uppercase"><?php echo app('translator')->get('Tags'); ?></h4>
                <ul class="tags-list list-unstyled">
                  <?php $__currentLoopData = $featuredTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                      $title = $item->json_params->title->{$locale} ?? $item->title;
                      $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['tags'], $title, $item->id);
                    ?>
                    <li>
                      <a href="<?php echo e($alias); ?>">
                        <?php echo e($title); ?>

                      </a>
                    </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\qlady\resources\views/frontend/pages/post/category.blade.php ENDPATH**/ ?>