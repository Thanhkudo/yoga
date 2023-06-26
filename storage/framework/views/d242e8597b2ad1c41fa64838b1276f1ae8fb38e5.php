<div class="sidebar-area">
  <div id="secondary" class="widget-area primary-sidebar ">
    <div id="search-3" class="widget widget_search">
      <h5 class="widget-title"><?php echo app('translator')->get('Search'); ?></h5>
      <form role="search" method="get" class="search-form yankee-search-form"
        action="<?php echo e(route('frontend.search.index')); ?>">
        <input type="search" class="search-field" placeholder="<?php echo app('translator')->get('Type and hit enter...'); ?>"
          value="<?php echo e($params['keyword'] ?? ''); ?>" name="keyword" />
        <button type="submit" class="search-submit"><i class="far fa-search"></i></button>
      </form>
    </div>
    <?php
      $params_taxonomy['status'] = App\Consts::TAXONOMY_STATUS['active'];
      $params_taxonomy['taxonomy'] = App\Consts::TAXONOMY['post'];
      
      $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params_taxonomy)->get();
    ?>
    <?php if(isset($taxonomys)): ?>
    <div id="categories-3" class="widget widget_categories">
      <h5 class="widget-title"><?php echo app('translator')->get('Post category'); ?></h5>
      <ul>
        <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($item->parent_id == 0 || $item->parent_id == null): ?>
              <?php
                $title = $item->json_params->title->{$locale} ?? $item->title;
                $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id);
                
                $url_current = url()->full();
                $current = $alias_category == $url_current ? 'current-nav-item' : '';
              ?>
              <li class="cat-item <?php echo e($current); ?>">
                <a href="<?php echo e($alias_category); ?>" title="<?php echo e($title); ?>">
                  <?php echo e(Str::limit($title, 100)); ?>

                </a>
              </li>
              <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($sub->parent_id == $item->id): ?>
                  <?php
                    $title_sub = $sub->json_params->title->{$locale} ?? $sub->title;
                    $alias_category_sub = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $sub->alias ?? $title_sub, $sub->id);
                    
                    $current = $alias_category_sub == $url_current ? 'current-nav-item' : '';
                  ?>
                  <li class="cat-item <?php echo e($current); ?>">
                    <a href="<?php echo e($alias_category_sub); ?>" title="<?php echo e($title_sub); ?>">
                      <i class="far fa-angle-double-right" style="padding-right: 5px"></i>
                      <?php echo e(Str::limit($title_sub, 100)); ?>

                    </a>
                  </li>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>

    </div>
    <?php endif; ?>

    <?php
      $params_product['status'] = App\Consts::POST_STATUS['active'];
      $params_product['is_type'] = App\Consts::POST_TYPE['post'];
      $params_product['order_by'] = 'id';
      
      $recents = App\Http\Services\ContentService::getCmsPost($params_product)
          ->limit(App\Consts::PAGINATE['sidebar'])
          ->get();
    ?>
    <?php if(isset($recents)): ?>
      <div id="yankee_recent_post_widget-1" class="widget yankee-recent-post">
        <h5 class="widget-title"><?php echo app('translator')->get('Latest post'); ?></h5>
        <ul class="recent-post-loop">
          <?php $__currentLoopData = $recents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $brief = $item->json_params->brief->{$locale} ?? $item->brief;
              $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
              $date = date('H:i d/m/Y', strtotime($item->created_at));
              // Viet ham xu ly lay slug
              $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
              $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
            ?>
            <li>
              <div class="post-thumb" style="background-image: url('<?php echo e($image); ?>');">
              </div>
              <div class="desc">
                <h6>
                  <a href="<?php echo e($alias); ?>">
                    <?php echo e(Str::limit($title, 500)); ?>

                  </a>
                </h6>
                <span class="time"><i class="far fa-calendar-alt"></i><?php echo e($date); ?></span>
              </div>
            </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    <?php endif; ?>

    <?php
      $params_product['status'] = App\Consts::POST_STATUS['active'];
      $params_product['is_type'] = App\Consts::POST_TYPE['post'];
      $params_product['order_by'] = 'count_visited';
      
      $mostViews = App\Http\Services\ContentService::getCmsPost($params_product)
          ->limit(App\Consts::PAGINATE['sidebar'])
          ->get();
    ?>
    <?php if(isset($mostViews)): ?>
      <div id="yankee_recent_post_widget-1" class="widget yankee-recent-post">
        <h5 class="widget-title"><?php echo app('translator')->get('Most viewed post'); ?></h5>
        <ul class="recent-post-loop">
          <?php $__currentLoopData = $mostViews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $brief = $item->json_params->brief->{$locale} ?? $item->brief;
              $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
              $date = date('H:i d/m/Y', strtotime($item->created_at));
              // Viet ham xu ly lay slug
              $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
              $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
            ?>
            <li>
              <div class="post-thumb" style="background-image: url('<?php echo e($image); ?>');">
              </div>
              <div class="desc">
                <h6>
                  <a href="<?php echo e($alias); ?>">
                    <?php echo e(Str::limit($title, 500)); ?>

                  </a>
                </h6>
                <span class="time"><i class="far fa-calendar-alt"></i><?php echo e($date); ?></span>
              </div>
            </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    <?php endif; ?>

  </div>
</div>
<?php /**PATH D:\project\it\resources\views/frontend/components/sidebar/post.blade.php ENDPATH**/ ?>