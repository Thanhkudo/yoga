

<?php
  $title = $detail->json_params->title->{$locale} ?? $detail->title;
  $brief = $detail->json_params->brief->{$locale} ?? null;
  $content = $detail->json_params->content->{$locale} ?? null;
  $image = $detail->image != '' ? $detail->image : null;
  $image_thumb = $detail->image_thumb != '' ? $detail->image_thumb : null;
  $date = date('H:i d/m/Y', strtotime($detail->created_at));
  
  // For taxonomy
  $taxonomy_json_params = json_decode($detail->taxonomy_json_params);
  $taxonomy_title = $taxonomy_json_params->title->{$locale} ?? $detail->taxonomy_title;
  $image_background = $taxonomy_json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? null);
  $taxonomy_alias = Str::slug($taxonomy_title);
  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $taxonomy_alias, $detail->taxonomy_id);
  
  $seo_title = $detail->json_params->seo_title ?? $title;
  $seo_keyword = $detail->json_params->seo_keyword ?? null;
  $seo_description = $detail->json_params->seo_description ?? $brief;
  $seo_image = $image ?? ($image_thumb ?? null);
  
?>

<?php $__env->startPush('style'); ?>
  <style>
    #content-detail h2 {
      font-size: 30px;
    }

    #content-detail h3 {
      font-size: 24px;
    }

    #content-detail h4 {
      font-size: 18px;
    }

    #content-detail h5,
    #content-detail h6 {
      font-size: 16px;
    }

    #content-detail p {
      margin-top: 0;
      margin-bottom: 0;
    }

    #content-detail h1,
    #content-detail h2,
    #content-detail h3,
    #content-detail h4,
    #content-detail h5,
    #content-detail h6 {
      margin-top: 0;
      margin-bottom: .5rem;
    }

    #content-detail p+h2,
    #content-detail p+.h2 {
      margin-top: 1rem;
    }

    #content-detail h2+p,
    #content-detail .h2+p {
      margin-top: 1rem;
    }

    #content-detail p+h3,
    #content-detail p+.h3 {
      margin-top: 0.5rem;
    }

    #content-detail h3+p,
    #content-detail .h3+p {
      margin-top: 0.5rem;
    }

    #content-detail ul,
    #content-detail ol {
      list-style: inherit;
      padding: 0 0 0 50px;

    }

    #content-detail ul li,
    #content-detail ol li {
      display: list-item;
      list-style: inherit;
    }

    .posts-sm .entry-image {
      width: 75px;
    }
  </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  
  <section id="page-title" class="page-title-parallax page-title-center page-title-dark include-header"
    style="background-image: linear-gradient(to top, rgba(254,150,3,0.5), #39384D), url('<?php echo e($image_background); ?>'); background-size: cover; padding: 120px 0;"
    data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">
    <div id="particles-line"></div>

    <div class="container clearfix mt-4">
      
      
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('frontend.home')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e($alias_category); ?>"><?php echo e($taxonomy_title ?? ''); ?></a></li>
      </ol>
      <h1><?php echo e($title); ?></h1>
    </div>
  </section>

  <section id="content">

    <div class="content-wrap">
      <div class="container mb-3">

        <div class="row mb-5 d-none">
          <div class="col-12">

            <?php if(isset($taxonomys)): ?>
              <?php
                $color = ['aqua', 'blue', 'amber', 'red'];
              ?>
              <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $title_taxonomy = $item->json_params->title->{$locale} ?? $item->title;
                  $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                  // Viet ham xu ly lay slug
                  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id);
                  
                ?>
                <a href="<?php echo e($alias_category); ?>"
                  class="button button-border button-rounded button-fill button-<?php echo e($color[$loop->index % 4]); ?> ms-0">
                  <span><?php echo e($title_taxonomy); ?></span>
                </a>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>"
              style="box-shadow: 0 0 10px 0 rgb(0 0 0 / 30%); border-radius: 10px" class="mb-5" />
          </div>
          <div class="col-md-6">

            <button data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"
              class="button button-border button-rounded button-fill button-blue button-large ls0 mt-0 mb-3 mx-0">
              <span>Liên hệ mua mẫu này</span>
            </button>
            <div class="si-share border-0 d-flex justify-content-between align-items-center">
              <div>
                <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo e(Request::fullUrl()); ?>"
                  class="social-icon si-borderless si-facebook">
                  <i class="icon-facebook"></i>
                  <i class="icon-facebook"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?url=<?php echo e(Request::fullUrl()); ?>"
                  class="social-icon si-borderless si-twitter">
                  <i class="icon-twitter"></i>
                  <i class="icon-twitter"></i>
                </a>
                <a href="https://www.instagram.com/cws/share?url=<?php echo e(Request::fullUrl()); ?>"
                  class="social-icon si-borderless si-instagram">
                  <i class="icon-instagram"></i>
                  <i class="icon-instagram"></i>
                </a>
              </div>
            </div>

            <div class="clear line my-4"></div>

            <div id="content-detail" class="pb-3 mb-3 border-bottom">
              <h2 class="text-uppercase">Giới thiệu về mẫu web này</h2>
              <?php echo $content; ?>

            </div>

            <?php if(isset($relatedPosts) && count($relatedPosts) > 0): ?>
              <h3 class="title-widget text-uppercase"><?php echo app('translator')->get('Related Products'); ?></h3>
              <div class="related-posts row posts-md col-mb-30">
                <?php $__currentLoopData = $relatedPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $title_item = $item->json_params->title->{$locale} ?? $item->title;
                    $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                    $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                    $date = date('d/m/Y', strtotime($item->created_at));
                    // Viet ham xu ly lay slug
                    $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
                    $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title_item, $item->id, 'detail', $item->taxonomy_title);
                  ?>
                  <article class="portfolio-item col-12 col-sm-6 col-md-6 pf-media pf-icons text-center mb-5">
                    <div class="grid-inner" style="box-shadow: 0 0 10px 0 rgb(0 0 0 / 30%); border-radius: 10px">
                      <div class="portfolio-image" style="max-height: 350px; overflow: hidden; ">
                        <img src="<?php echo e($image); ?>" alt="<?php echo e($title_item); ?>" style="height: 100%">
                        <div class="bg-overlay">
                          <div class="bg-overlay-content dark" data-hover-animate="fadeIn" data-hover-speed="500">
                            <a href="<?php echo e($alias); ?>" class="overlay-trigger-icon bg-light text-dark"
                              data-hover-animate="fadeIn" data-hover-speed="500"><i class="icon-line-ellipsis"></i></a>
                          </div>
                          <div class="bg-overlay-bg dark" data-hover-animate="fadeIn" data-hover-speed="500"></div>
                        </div>
                      </div>
                      <div class="portfolio-desc">
                        <h3><a href="<?php echo e($alias); ?>"><?php echo e($title_item); ?></a></h3>
                        <span><?php echo e($brief); ?></span>
                      </div>
                    </div>
                  </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </section>

  
  <div class="modal fade bs-example-modal-lg" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
    role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-color">
          <h4 class="modal-title text-white" id="myModalLabel">Đặt mua mẫu <?php echo e($title); ?></h4>
          <button type="button" class="btn-close btn-sm btn-light" data-bs-dismiss="modal" aria-hidden="true"></button>
        </div>
        <div class="modal-body">
          <div class="form-result"></div>
          <form class="row mb-0" id="form-booking" action="<?php echo e(route('frontend.order.store.service')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="col-md-6 form-group mb-3">
              <label for="name"><?php echo app('translator')->get('Fullname'); ?> *</label>
              <input type="text" id="name" name="name" class="form-control input-sm required" value=""
                required>
            </div>
            <div class="col-md-6 form-group mb-3">
              <label for="phone"><?php echo app('translator')->get('phone'); ?> *</label>
              <input type="text" id="phone" name="phone" class="form-control input-sm required"
                value="" required>
            </div>
            <div class="col-12 form-group mb-3">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" class="form-control input-sm" value="">
            </div>
            <div class="col-12 form-group mb-4">
              <label for="address"><?php echo app('translator')->get('address'); ?></label>
              <textarea type="text" id="address" name="address" class="form-control input-sm"></textarea>
            </div>
            <div class="col-12 form-group mb-4">
              <label for="customer_note"><?php echo app('translator')->get('Content note'); ?></label>
              <textarea type="text" id="customer_note" name="customer_note" class="form-control input-sm"></textarea>
            </div>

            <div class="col-12 form-group mb-0">
              <button class="button button-border button-rounded button-fill button-blue w-100 m-0 ls0 text-uppercase"
                type="submit" id="submit" name="submit" value="submit">
                <span>Gửi đăng ký</span>
              </button>
            </div>
            <input type="hidden" name="item_id" value="<?php echo e($detail->id); ?>">
          </form>
        </div>
      </div>
    </div>
  </div>

  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\it\resources\views/frontend/pages/product/detail.blade.php ENDPATH**/ ?>