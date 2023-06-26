<?php
    $title = $detail->json_params->title->{$locale} ?? $detail->title;
    $brief = $detail->json_params->brief->{$locale} ?? null;
    $price = $product_detail->price ?? null;
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
    $image_product_screen = null;
    if ($agent->isDesktop() && $image != null) {
        $image_product_screen = $image;
    } else {
        $image_product_screen = $image_thumb;
    }

    $array_icon = $product_detail->json_product->convenient->icon??"";
    $array_name = $product_detail->json_product->convenient->name??"";
?>

<?php $__env->startPush('style'); ?>
    <style>
        .slider-element .real-estate-info-wrap {
            position: absolute;
            left: auto;
            bottom: 20px;
            width: 100%;
        }

        .real-estate-price {
            position: absolute;
            top: auto;
            left: auto;
            right: 0;
            bottom: 50px;
            z-index: 1;
        }

        .real-estate-price h3 {
            display: block;
            color: #FFF;
            font-size: 44px;
            margin: 0;
            font-weight: 400;
        }

        @media (max-width: 991px) {
            .real-estate-price {
                position: relative;
                top: auto;
                bottom: auto;
                right: 0;
                margin-top: 15px;
            }

            .slider-element .heading-block>h2 {
                font-size: 24px;
            }

            .slider-element .heading-block {
                width: auto !important;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    
    <section id="slider" class="slider-element dark parallax include-header include-topbar"
        style="background-image: url('<?php echo e($image_product_screen); ?>'); background-size: cover; height: 550px;"
        data-bottom-top="background-position:0px 200px;" data-top-bottom="background-position:0px -200px;">

        <div class="container clearfix" style="z-index: 2;">
            <div class="real-estate-info-wrap">
                <div class="heading-block mb-0 border-bottom-0 d-md-flex d-block align-items-center justify-content-between">
                    <h2 class="me-auto"><?php echo e($title); ?>

                        
                    </h2>
                    <div class="d-flex flex-shrink-1" data-lightbox="gallery">
                        <a href="<?php echo e($image); ?>"
                            class="button button-color button-rounded nott m-0 fw-medium align-self-end"
                            data-lightbox="gallery-item"><i class="icon-picture"></i> Xem bộ sưu tập</a>
                        <?php if(isset($detail->json_params->gallery_image)): ?>
                            <?php $__currentLoopData = $detail->json_params->gallery_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e($value); ?>" class="d-none" data-lightbox="gallery-item"></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>


                    </div>
                </div>
                <div class="real-estate-price mb-md-0 mb-lg-4 mb-xl-0">
                    <h3><?php echo e(number_format($price, 0, ',', '.')); ?> VNĐ<span
                            class="text-light h6"><?php echo e($product_detail->type == 1 ? '/ ' . $Type_price[$product_detail->type_price] : ''); ?></span>
                    </h3>
                </div>
            </div>
        </div>
        <div class="video-wrap" style="position: absolute; top: 0; left: 0; height: 100%;z-index: 1">
            <div class="video-overlay"
                style="background:linear-gradient(180deg,rgba(0,0,0,.3) 0,transparent 40%,transparent 60%,rgba(0,0,0,.8));">
            </div>
        </div>

    </section>

    <section id="content">
        <div class="content-wrap pt-0">
            <div class="section mt-0" style="padding: 30px 0">
                <div class="container clearfix">
                    <div class="row justify-content-around">
                        <div class="col-md-2 col-6 center">
                            <img src="<?php echo e(asset('public/data/cms-image/img_ns.png')); ?>" alt="Image" class="img-circle"
                                style="width: 60px; height: 60px;">
                            <h5 class="my-2">
                                <p><?php echo e($product_detail->json_user->name??""); ?></p>
                            </h5>
                        </div>
                        <div class="col-md-2 col-6 center">
                            <i class="icon-realestate-rent i-plain i-xlarge mx-auto mb-0"></i>
                            <h5 class="my-1">Tin <?php echo e($Product_type[$product_detail->type]); ?></h5>
                        </div>
                        <div class="col-md-2 col-6 center">
                            <i class="icon-realestate-bed i-plain i-xlarge mx-auto mb-0"></i>
                            <h5 class="my-1"><?php echo e($product_detail->bedrooom); ?> Phòng ngủ</h5>
                        </div>
                        <div class="col-md-2 col-6 center">
                            <i class="icon-realestate-plan2 i-plain i-xlarge mx-auto mb-0"></i>
                            <h5 class="my-1"><?php echo e($product_detail->spft); ?> Mét vuông</h5>
                        </div>
                        <div class="col-md-2 col-6 center">
                            <i class="icon-realestate-bathtub i-plain i-xlarge mx-auto mb-0"></i>
                            <h5 class="my-1"><?php echo e($product_detail->bathrooom); ?> Phòng tắm</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container clearfix">

                <div class="row gutter-40 col-mb-80">
                    <div class="postcontent col-lg-9">
                        <p>
                            <?php echo $brief; ?>

                        </p>

                        <h4 class="mb-0 topmargin">Không gian</h4>
                        <div class="line line-sm mt-1 mb-3"></div>
                        <div class="clearfix">
                            <ul class="iconlist row">
                                <?php if(isset($product_detail->json_product->space)): ?>
                                    <?php $__currentLoopData = $product_detail->json_product->space; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="mb-1 col-md-4"><i class="icon-line2-check"></i><?php echo e($val); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>



                            </ul>
                        </div>

                        <h4 class="mb-0 mt-3">Tiện ích</h4>
                        <div class="line line-sm mt-1 mb-3"></div>
                        <div class=" clearfix">
                            <ul class="row iconlist">
                                <?php if($array_name != ""): ?>
                                    <?php $__currentLoopData = $array_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="mb-1 col-md-4"><i class="<?php echo e($array_icon[$key]); ?>"></i><?php echo e($val); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                            </ul>
                        </div>

                        <p class="mt-3">
                            <?php echo $content; ?>

                        </p>

                        <div class="line"></div>

                        <?php echo $__env->make('frontend.components.reviews.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    </div>

                    <div class="col-lg-3">
                        <div class="quick-contact-widget">
                            <div class="card bg-light">
                                <div class="card-header">Đặt ngay</div>
                                <div class="card-body">
                                    <form action="<?php echo e(route('frontend.order.store.product')); ?>"
                                        method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden"  name="product_id" value="<?php echo e($detail->id); ?>">
                                        <div class="col-md-12 form-group">
                                            <label for="name"><?php echo app('translator')->get('Fullname'); ?> <small class="text-danger">*</small></label>
                                            <input type="text" class="sm-form-control" placeholder="<?php echo app('translator')->get('Fullname'); ?> *"
                                                id="name" name="name" required
                                                value="<?php echo e($user_auth->name ?? old('name')); ?>" />
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <input type="email" class="sm-form-control" placeholder="<?php echo app('translator')->get('Email'); ?>"
                                                id="email" name="email" value="<?php echo e(old('email')); ?>" />
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <input type="text" class="sm-form-control" placeholder="<?php echo app('translator')->get('Phone'); ?> *"
                                                id="phone" name="phone" required
                                                value="<?php echo e($user_auth->phone ?? old('phone')); ?>" />
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <input type="text" class="sm-form-control" placeholder="<?php echo app('translator')->get('Address'); ?>"
                                                id="address" name="address" value="<?php echo e(old('address')); ?>" />
                                        </div>

                                        <div class="col-md-12 form-group">
                                            <textarea class="sm-form-control" id="customer_note" name="customer_note" rows="5" cols="30"
                                                placeholder="<?php echo app('translator')->get('Content note'); ?>" autocomplete="off"><?php echo e(old('customer_note')); ?></textarea>
                                        </div>
                                        <button type="submit"
                                            class="button  w-100 m-0" value="submit">Đặt ngay</button>

                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="clear topmargin"></div>
            <?php if(isset($relatedPosts)): ?>
                <div class="container clearfix">
                    <h3>Tin liên quan</h3>
                    <div class="row col-mb-50">
                        <?php $__currentLoopData = $relatedPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $title_item = $item->json_params->title->{$locale} ?? $item->title;
                                $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                                $price = $item->price ?? '';
                                $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                                $date = date('d/m/Y', strtotime($item->created_at));
                                $convenient = $item->json_product;

                                $city_name = '';
                                if (isset($item->city) && $item->city > 0) {
                                    $city_name = '';
                                    foreach ($City as $val) {
                                        if ($val['id'] == $item->city) {
                                            $city_name = $val['name'];
                                            break;
                                        }
                                    }
                                }
                                $i = 0;
                                // Viet ham xu ly lay slug
                                $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title_item, $item->id, 'detail', $item->taxonomy_title);
                            ?>
                            <div class="real-estate-item portfolio-item col-12 col-md-6 col-lg-4">
                                <div class="real-estate-item-image">
                                    <div class="label badge bg-success">Ưu đãi</div>
                                    <a href="<?php echo e($alias); ?>">
                                        <img src="<?php echo e($image); ?>" alt="<?php echo e($title_item); ?>">
                                    </a>
                                    <div class="real-estate-item-price">
                                        <?php echo e(number_format($price, 0, ',', '.')); ?> VNĐ<span><?php echo e($Product_type[$item->type]); ?>

                                            <?php echo e($item->type == 1 ? '/ ' . $Type_price[$item->type_price] : ''); ?></span>
                                    </div>
                                    <div class="real-estate-item-info clearfix d-none" data-lightbox="gallery">
                                        <a href="<?php echo e($alias); ?>" data-bs-toggle="tooltip" title="Hình ảnh"
                                            data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
                                        <?php if(isset($item->json_params->gallery_image)): ?>
                                            <?php $__currentLoopData = $item->json_params->gallery_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="<?php echo e($value); ?>" class="d-none" data-lightbox="gallery-item"></a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="real-estate-item-desc">
                                    <h3><a href="<?php echo e($alias); ?>"><?php echo e($title_item); ?></a></h3>
                                    <span>Khu vực <?php echo e($city_name); ?></span>

                                    

                                    <div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

                                    <div class="real-estate-item-features fw-medium font-primary clearfix">
                                        <div class="row g-0">
                                            <div class="row g-0">
                                                <div class="col-lg-4 p-0">Phòng ngủ: <span
                                                        class="color"><?php echo e($item->bedrooom); ?></span></div>
                                                <div class="col-lg-4 p-0">Phòng tắm: <span
                                                        class="color"><?php echo e($item->bathrooom); ?></span></div>
                                                <div class="col-lg-4 p-0">Diện tích: <span
                                                        class="color"><?php echo e($item->spft); ?>m2</span></div>

                                                <?php if(isset($item->json_product)): ?>
                                                    <?php $__currentLoopData = json_decode($convenient, true)['convenient']['name']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            if ($i == 3) {
                                                                break;
                                                            }
                                                            if ($val == '') {
                                                                continue;
                                                            }
                                                            $i++;
                                                        ?>
                                                        <div class="col-lg-4 p-0"><?php echo e($val); ?>:
                                                            <span class="text-success"><i class="icon-check-sign"></i></span>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div><!-- .content-wrap end -->
    </section>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fhmagency/domains/fhmagency.vn/public_html/bds/resources/views/frontend/pages/product/detail.blade.php ENDPATH**/ ?>