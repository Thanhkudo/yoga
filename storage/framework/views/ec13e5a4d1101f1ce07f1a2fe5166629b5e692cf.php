<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : url('demos/seo/images/sections/5.jpg');
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_featured'] = true;
    $params['is_type'] = App\Consts::POST_TYPE['product'];
    
    $rows = App\Http\Services\ContentService::getCmsPost($params)->get();
    
    // $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
    // $params['taxonomy'] = App\Consts::TAXONOMY['product'];
    
    // $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)->get();
    
  ?>
  <div class="section m-0" id="themes"
    style="background: url('<?php echo e($background); ?>') no-repeat center center; background-size: cover;padding: 80px 0;">
    <div class="container">
      <div class="heading-block border-bottom-0 center">
        <div class="badge rounded-pill badge-default"><?php echo e($title); ?></div>
        <h2 class="nott ls0"><?php echo e($brief); ?></h2>
      </div>

      <div class="row ">
        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->taxonomy_title, $item->taxonomy_id);
            $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id, 'detail', $item->taxonomy_title);
          ?>
          <article class="portfolio-item col-12 col-sm-6 col-md-6 col-lg-3 pf-media pf-icons text-center mb-5">
            <div class="grid-inner" style="box-shadow: 0 0 10px 0 rgb(0 0 0 / 30%); border-radius: 10px">
              <div class="portfolio-image" style="max-height: 350px; overflow: hidden;">
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

      <div class="center">
        <a href="<?php echo e(route('frontend.cms.product')); ?>"
          class="button button-border button-rounded button-fill button-blue button-large mt-5 ls0 text-uppercase">
          <span><?php echo app('translator')->get('View all'); ?></span>
        </a>
      </div>

    </div>
  </div>
<?php endif; ?>
<?php /**PATH D:\project\fhmvn\resources\views/frontend/blocks/cms_product/styles/default.blade.php ENDPATH**/ ?>