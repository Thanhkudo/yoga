<?php
    $title = $detail->json_params->title->{$locale} ?? $detail->title;
    $brief = $detail->json_params->brief->{$locale} ?? null;
    $price = $detail->json_params->price ?? null;
    $price_old = $detail->json_params->price_old ?? null;
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

        .button.button-border.button-fill:hover {
            color: #fff !important;
        }

        .product .entry-image {
            position: relative !important;
        }

        .product .entry-title {
            position: absolute;
            bottom: 0;
            background-color: #FFF;
            opacity: 0.75;
            left: 50%;
            width: 100%;
            transform: translateX(-50%);
            padding: 10px 0px;
        }

        .entry-image a.img-link {
            height: 400px;
            overflow: hidden;
        }

        .link-hover:hover {
            background-color: green !important;
        }

        .entry-image img {
            height: 100%;
        }

        .img-hover:hover {
            opacity: 0.75;
        }

        .img-main:hover {
            transform: scale(1.05);
            transition: all .3s ease-in-out;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    
    <section id="page-title" class="page-title-parallax page-title-center page-title"
        style="background-image: url('<?php echo e($image_background); ?>'); background-size: cover;"
        data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">
        <div id="particles-line"></div>

        <div class="container clearfix mt-4">
            
            
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('frontend.home')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
                <li class="breadcrumb-item"><a href="<?php echo e($alias_category); ?>"><?php echo e($taxonomy_title ?? ''); ?></a></li>
            </ol>
            <h1 class="mt-3"><?php echo e($title); ?></h1>
        </div>
    </section>

    <section id="content">

        <div class="content-wrap">
            <div class="container mb-3">

                <div class="row">
                    <div class="col-md-6">
                        <div style="overflow: hidden">
                            <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" class="mb-5 img-main" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="content-detail" class="pb-3 mb-3">
                            <h2 class="text-uppercase"><?php echo e($title); ?></h2>
                            <div class="clear line my-2"></div>
                            <div class="d-flex align-items-center justify-content-between">
                                <!-- Product Single - Price
              ============================================= -->
                                <div class="product-price">
                                    <del><?php echo e(($price_old!="")?"$".$price_old:""); ?></del> <ins><?php echo e(($price!="")?"$".$price:""); ?></ins>
                                </div>
                                <!-- Product Single - Price End -->

                                <!-- Product Single - Rating
              ============================================= -->
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-half-full"></i>
                                    <i class="icon-star-empty"></i>
                                </div>
                                <!-- Product Single - Rating End -->
                            </div>

                            <div class="line"></div>
                            <form class="cart mb-0 d-flex justify-content-between align-items-center" method="post"
                                enctype="multipart/form-data">
                                <div class="quantity clearfix">
                                    <input type="button" value="-" class="minus" />
                                    <input type="number" step="1" min="1" name="quantity" value="1"
                                        title="Qty" class="qty" />
                                    <input type="button" value="+" class="plus" />
                                </div>
                                <button type="button" data-id="<?php echo e($detail->id); ?>" data-quantity="1"
                                    class="add-to-cart button m-0">
                                    <?php echo app('translator')->get('Add to cart'); ?>
                                </button>

                            </form>

                            <div class="line"></div>


                        </div>
                        <?php if(isset($detail->json_params->catalog)): ?>
                            <a href="<?php echo e($detail->json_params->catalog); ?>" target="_blank"
                                class="button button-border button-rounded button-fill button-green button-large ls0 mt-0 mb-3 mx-0">
                                <span>CATALOG FILE <i class="icon-files"></i></span>
                            </a>
                        <?php endif; ?>
                        <?php if(isset($detail->json_params->shop_online)): ?>
                            <a href="<?php echo e($detail->json_params->shop_online); ?>" target="_blank"
                                class="button button-border button-rounded button-fill button-green button-large ls0 mt-0 mb-3 mx-0">
                                <span>SHOP ONLINE <i class="icon-line-shopping-cart"></i></span>
                            </a>
                        <?php endif; ?>

                        <div class="si-share border-0 d-flex align-items-center">
                            Chia sẻ:
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
                    </div>
                    <div class="col-md-12">
                        <?php echo $content; ?>

                    </div>
                    <div class="col-md-12">
                        <?php if(isset($detail->json_params->gallery_image)): ?>
                            <h3 class="title-widget text-uppercase mt-4"><?php echo app('translator')->get('Gallery Image'); ?></h3>
                            <div class="masonry-thumbs grid-container grid-3" data-lightbox="gallery">
                                <?php $__currentLoopData = $detail->json_params->gallery_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="grid-item img-hover" href="<?php echo e($value); ?>" data-lightbox="gallery-item">
                                        <img src="<?php echo e($value); ?>" alt="<?php echo e($key); ?>">
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>

                        <?php if(isset($relatedPosts) && count($relatedPosts) > 0): ?>
                            <h3 class="title-widget text-uppercase mt-4"><?php echo app('translator')->get('Related Products'); ?></h3>
                            <div class="related-posts row posts-md col-mb-30">
                                <?php $__currentLoopData = $relatedPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $title_item = $item->json_params->title->{$locale} ?? $item->title;
                                        $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                                        $price = $item->json_params->price?? "";
                                        $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                                        $date = date('d/m/Y', strtotime($item->created_at));
                                        // Viet ham xu ly lay slug
                                        $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title_item, $item->id, 'detail', $item->taxonomy_title);
                                    ?>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="product">
                                            <div class="product-image">
                                                <a href="<?php echo e($alias); ?>"><img src="<?php echo e($image); ?>"
                                                        alt="<?php echo e($title_item); ?>"></a>
                                                <a  class="cursor-pointer add-to-cart shop-icon" data-id="<?php echo e($item->id); ?>" data-quantity="1"><i class="icon-shopping-cart"></i></a>
                                            </div>
                                            <div class="product-desc center">
                                                <div class="product-price"><ins>$<?php echo e($price); ?></ins></div>
                                                <div class="product-title">
                                                    <h3><a href="<?php echo e($alias); ?>"><?php echo e($title_item); ?></a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                    <button type="button" class="btn-close btn-sm btn-light" data-bs-dismiss="modal"
                        aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="form-result"></div>
                    <form class="row mb-0" id="form-booking" action="<?php echo e(route('frontend.order.store.service')); ?>"
                        method="post">
                        <?php echo csrf_field(); ?>
                        <div class="col-md-6 form-group mb-3">
                            <label for="name"><?php echo app('translator')->get('Fullname'); ?> *</label>
                            <input type="text" id="name" name="name" class="form-control input-sm required"
                                value="" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="phone"><?php echo app('translator')->get('phone'); ?> *</label>
                            <input type="text" id="phone" name="phone" class="form-control input-sm required"
                                value="" required>
                        </div>
                        <div class="col-12 form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control input-sm"
                                value="">
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
                            <button
                                class="button button-border button-rounded button-fill button-blue w-100 m-0 ls0 text-uppercase"
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
<?php $__env->startPush('js_filter'); ?>
<script>
      jQuery(window).on("pluginCarouselReady", function () {
        let colorValue = $(".product-color-value"),
          productDots = $("#product-color-dots"),
          currentOwl = $(".owl-dot.active").attr("data-value");

        colorValue.text(currentOwl);

        let owl = $("#oc-shop").owlCarousel({
          items: 1,
          dotsContainer: "#product-color-dots",
        });

        productDots.find("button").each(function () {
          let dot = $(this),
            color = dot.attr("data-color");

          dot.css({ "background-color": color });
        });

        owl.on("changed.owl.carousel", function (event) {
          currentOwl = $(".owl-dot.active").attr("data-value");
          colorValue.text(currentOwl);
        });
      });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\barber\resources\views/frontend/pages/product/detail.blade.php ENDPATH**/ ?>