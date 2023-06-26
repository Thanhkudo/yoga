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
  <section style="margin-top: 50px;"
    class="elementor-section elementor-top-section elementor-element elementor-element-090fc06 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="090fc06" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-container elementor-column-gap-default">
      <div
        class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-fe40eb6 elementor-invisible"
        data-id="fe40eb6" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;}">
        <div class="elementor-widget-wrap elementor-element-populated">
          <div class="elementor-element elementor-element-c85397e elementor-widget elementor-widget-yankee-heading"
            data-id="c85397e" data-element_type="widget" data-widget_type="yankee-heading.default">
            <div class="elementor-widget-container">
              <div class="yankee-heading">
                <span class="tag-line"><?php echo $title; ?></span>
                <h2 class="title"><?php echo $brief; ?></h2>
              </div>
            </div>
          </div>
          <div class="elementor-element elementor-element-1906c52 elementor-widget elementor-widget-yankee-post-grid"
            data-id="1906c52" data-element_type="widget" data-widget_type="yankee-post-grid.default">
            <div class="elementor-widget-container">
              <div class="yankee-recent-post row layout-style-one">

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
                  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="recent-post-box">
                      <div class="post-image">
                        <img width="870" height="520" src="<?php echo e($image); ?>"
                          class="attachment-full size-full wp-post-image" alt="<?php echo e($title); ?>" loading="lazy"
                          sizes="(max-width: 870px) 100vw, 870px" /><span class="post-date">
                          <?php echo e($date); ?> <?php echo e($month); ?> <?php echo e($year); ?>

                        </span>
                      </div>
                      <div class="post-desc">
                        <h3 class="title">
                          <a href="<?php echo e($alias); ?>">
                            <?php echo e($title); ?>

                          </a>
                        </h3>
                        <p><?php echo e(Str::limit($brief, 100)); ?></p>
                      </div>
                    </div>
                  </div>
                  
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
<?php endif; ?>
<?php /**PATH D:\project\kon10ted\resources\views/frontend/blocks/cms_post/styles/default.blade.php ENDPATH**/ ?>