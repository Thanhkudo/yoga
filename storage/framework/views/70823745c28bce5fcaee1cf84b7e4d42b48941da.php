<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $background = $block->image_background != '' ? $block->image_background : url('assets/img/banner.jpg');
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
    
    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_featured'] = true;
    $params['is_type'] = App\Consts::POST_TYPE['service'];
    
    $rows = App\Http\Services\ContentService::getCmsPost($params)->get();
    
  ?>

  <style>
    .elementor-118 .elementor-element.elementor-element-57cde65>.elementor-element-populated {
      padding: 0px 15px;
    }

    @media (min-width: 768px) {
      .elementor-118 .elementor-element.elementor-element-57cde65 {
        width: 100%;
      }
    }
  </style>
  <section
    class="elementor-section elementor-top-section elementor-element elementor-element-0ffab45 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="0ffab45" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
      <div
        class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-57cde65 elementor-invisible"
        data-id="57cde65" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInRight&quot;}">
        <div class="elementor-widget-wrap elementor-element-populated">
          <div class="elementor-element elementor-element-c205b8b elementor-widget elementor-widget-yankee-fancy-boxes"
            data-id="c205b8b" data-element_type="widget" data-widget_type="yankee-fancy-boxes.default">
            <div class="elementor-widget-container">
              <div class="yankee-service-boxes column-d-4 column-t-2 column-s-1 column-xs-1">

                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $title = $item->json_params->title->{$locale} ?? $item->title;
                    $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                    $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                    $date = date('H:i d/m/Y', strtotime($item->created_at));
                    // Viet ham xu ly lay slug
                    $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['service'], $item->taxonomy_title, $item->taxonomy_id);
                    $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['service'], $title, $item->id, 'detail', $item->taxonomy_title);
                  ?>
                  <div class="service-box">
                    <div class="icon">
                      <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">
                    </div>
                    <h4 class="title">
                      <a href="<?php echo e($alias); ?>">
                        <?php echo e($title); ?>

                      </a>
                      </h4>
                      <a href="<?php echo e($alias); ?>" class="service-link">
                        <i
                        class="fal fa-arrow-right"></i>
                      </a>
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
<?php /**PATH D:\project\it\resources\views/frontend/blocks/cms_service/styles/default.blade.php ENDPATH**/ ?>