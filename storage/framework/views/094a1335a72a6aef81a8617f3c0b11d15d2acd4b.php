<?php
$params['status'] = App\Consts::TAXONOMY_STATUS['active'];
$params['taxonomy'] = App\Consts::TAXONOMY['product_category'];

$taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)->get();
$str_alias = '.html?id=';
?>
<div class="sidebar-widgets-wrap">
  <?php if(isset($taxonomys)): ?>
    <div class="widget widget_links clearfix">

      <h4><?php echo app('translator')->get('Product Categories'); ?></h4>
      <ul>
        <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($item->parent_id == 0 || $item->parent_id == null): ?>
            <?php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $alias = Str::slug($title);
              $url_link = route('frontend.cms.product_category', ['alias' => $alias]) . $str_alias . $item->id;
            ?>
            <li><a href="<?php echo e($url_link); ?>"> <?php echo e(Str::limit($title, 30)); ?></a></li>
            <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($sub->parent_id == $item->id): ?>
                <?php
                  $title_sub = $sub->json_params->title->{$locale} ?? $sub->title;
                  $alias_sub = Str::slug($title_sub);
                  $url_link_sub = route('frontend.cms.product_category', ['alias' => $alias_sub]) . $str_alias . $sub->id;
                ?>
                <li class="ps-3"><a href="<?php echo e($url_link_sub); ?>"><?php echo e(Str::limit($title_sub, 30)); ?></a></li>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>

    </div>
  <?php endif; ?>

  <?php
    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_type'] = App\Consts::POST_TYPE['product'];
    $params['order_by'] = 'id';
    
    $recents = App\Http\Services\ContentService::getCmsPost($params)
        ->limit(App\Consts::DEFAULT_SIDEBAR_LIMIT)
        ->get();
  ?>
  <?php if(isset($recents)): ?>
    <div class="widget clearfix">

      <h4><?php echo app('translator')->get('Latest products'); ?></h4>
      <div class="posts-sm row col-mb-30" id="recent-shop-list-sidebar">
        <?php $__currentLoopData = $recents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias_category = Str::slug($item->taxonomy_title);
            $alias_detail = Str::slug($title);
            $url_link = route('frontend.cms.product', ['alias_category' => $alias_category, 'alias_detail' => $alias_detail]) . $str_alias . $item->id;
          ?>
          <div class="entry col-12">
            <div class="grid-inner row g-0">
              <div class="col-auto">
                <div class="entry-image">
                  <a href="<?php echo e($url_link); ?>"><img src="<?php echo e($image); ?>" alt=""></a>
                </div>
              </div>
              <div class="col ps-3">
                <div class="entry-title">
                  <h4><a href="<?php echo e($url_link); ?>"><?php echo e(Str::limit($title, 30)); ?></a></h4>
                </div>
                <div class="entry-meta no-separator">
                  <ul>
                    <li class="text-danger">
                      <?php echo e(isset($item->json_params->price) && $item->json_params->price > 0 ? number_format($item->json_params->price) . ' ' . $item->json_params->price_currency : __('Contact')); ?>

                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>

    </div>
  <?php endif; ?>

  <?php
    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_type'] = App\Consts::POST_TYPE['product'];
    $params['order_by'] = 'count_visited';
    
    $mostViews = App\Http\Services\ContentService::getCmsPost($params)
        ->limit(App\Consts::DEFAULT_SIDEBAR_LIMIT)
        ->get();
  ?>
  <?php if(isset($mostViews)): ?>
    <div class="widget clearfix">

      <h4><?php echo app('translator')->get('Most viewed products'); ?></h4>
      <div class="posts-sm row col-mb-30" id="recent-shop-list-sidebar">
        <?php $__currentLoopData = $mostViews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias_category = Str::slug($item->taxonomy_title);
            $alias_detail = Str::slug($title);
            $url_link = route('frontend.cms.product', ['alias_category' => $alias_category, 'alias_detail' => $alias_detail]) . $str_alias . $item->id;
          ?>
          <div class="entry col-12">
            <div class="grid-inner row g-0">
              <div class="col-auto">
                <div class="entry-image">
                  <a href="<?php echo e($url_link); ?>"><img src="<?php echo e($image); ?>" alt=""></a>
                </div>
              </div>
              <div class="col ps-3">
                <div class="entry-title">
                  <h4><a href="<?php echo e($url_link); ?>"><?php echo e(Str::limit($title, 30)); ?></a></h4>
                </div>
                <div class="entry-meta no-separator">
                  <ul>
                    <li class="text-danger">
                      <?php echo e(isset($item->json_params->price) && $item->json_params->price > 0 ? number_format($item->json_params->price) . ' ' . $item->json_params->price_currency : __('Contact')); ?>

                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>

    </div>
  <?php endif; ?>

</div>
<?php /**PATH D:\project\fhmvn\resources\views/frontend/components/sidebar/product.blade.php ENDPATH**/ ?>