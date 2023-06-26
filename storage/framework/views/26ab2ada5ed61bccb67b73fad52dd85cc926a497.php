<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : url('assets/img/banner.jpg');
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_featured'] = true;
    $params['is_type'] = App\Consts::POST_TYPE['post'];
    
    $rows = App\Http\Services\ContentService::getCmsPost($params)
        ->limit(3)
        ->get();
  ?>
  <div class="section mb-0 bg-dark">
    <div class="container clearfix">
      <!-- Posts
        ============================================= -->
      <div id="posts" class="post-grid row grid-container gutter-40 clearfix" data-layout="fitRows">
        <div class="col-lg-12 d-flex justify-content-start align-items-start flex-column">
          <div class="badge badge-default"><?php echo $title; ?></div>
          <h2 class="fw-bold ls0 mb-3 text-light display-4">
            <?php echo $brief; ?>

          </h2>
        </div>
        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
          <div class="entry col-md-4 col-sm-6 col-12">
            <div class="grid-inner">
              <div class="entry-image">
                <a href="<?php echo e($alias); ?>">
                  <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" />
                </a>
              </div>
              <div class="entry-title">
                <h2>
                  <a class="text-light" href="<?php echo e($alias); ?>"><?php echo e($title); ?></a>
                </h2>
              </div>
              <div class="entry-meta"></div>
              <div class="entry-content">
                <p class="text-light">
                  <?php echo e(Str::limit($brief, 100)); ?>

                </p>
              </div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>

<?php endif; ?>
<?php /**PATH D:\project\thaiever\resources\views/frontend/blocks/cms_post/styles/default.blade.php ENDPATH**/ ?>