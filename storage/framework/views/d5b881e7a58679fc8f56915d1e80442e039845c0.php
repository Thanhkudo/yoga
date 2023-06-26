<?php

    $page_title = $taxonomy->title ?? ($page->title ?? $page->name);
    $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');

    $title = $taxonomy->json_params->title->{$locale} ?? ($taxonomy->title ?? null);
    $image = $taxonomy->json_params->image ?? null;
    $seo_title = $taxonomy->json_params->seo_title ?? $title;
    $seo_keyword = $taxonomy->json_params->seo_keyword ?? null;
    $seo_description = $taxonomy->json_params->seo_description ?? null;
    $seo_image = $image ?? null;
    $params_taxonomy['status'] = App\Consts::TAXONOMY_STATUS['active'];
    $params_taxonomy['taxonomy'] = App\Consts::TAXONOMY['product'];
    $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params_taxonomy)->get();
?>
<?php $__env->startPush('style'); ?>
    <style>
        .slider-element {
            padding: 250px 0 150px;
        }

        .device-md .slider-element,
        .device-sm .slider-element,
        .device-xs .slider-element {
            padding: 60px 0;
        }

        .expand-link {
            display: none;
        }

        .more-search {
            display: block;
            margin-top: 10px;
            float: right;
            text-align: right;
            color: #FFF;
            cursor: pointer;
        }

        label {
            font-family: 'Lora', sans-serif !important;
        }

        .bootstrap-select.btn-group>.dropdown-toggle {
            background-color: #dae0e5;
            border-color: #d3d9df;
        }
        /* .real-estate.grid-container{height: fit-content !important}
        .real-estate-item {position: unset !important,height: fit-content !important} */
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    
    <section id="slider" class="slider-element include-header include-topbar"
        style="background: url('<?php echo e($image_background); ?>') center center no-repeat; background-size: cover; overflow: visible;">
        <div class="container" style="z-index: 2">
            <div class="tabs advanced-real-estate-tabs">
                <div class="tab-container">
                    <div class="tab-content clearfix" id="tab-properties">
                        <form action="<?php echo e(route('frontend.search')); ?>" method="GET" class="mb-0">
                            <div class="row clearfix">
                                <div class="col-md-2 col-sm-12">
                                    <label for="" class="d-block">Loại</label>
                                    <input type="hidden"name="type_ck" value="1">
                                    <input class="bt-switch ck_type"  value="2" type="checkbox" checked
                                    data-on-text="Mua" data-off-text="Thuê" data-on-color="themecolor"
                                    data-off-color="themecolor">
                                </div>
                                <div class="col-md-3 col-sm-6 col-12">
                                    <label for="">Khu vực</label>
                                    <select class="selectpicker" name="city" data-live-search="true"
                                    data-placeholder="Chọn khu vực" data-size="6" style="width:100%;">
                                    <?php $__currentLoopData = $City; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($val['id']); ?>"><?php echo e($val['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-lg-2 col-md-6 col-6 bottommargin-sm">
                                    <label>Phòng ngủ</label>
                                    <select class="selectpicker" name="bedr" data-size="6"
                                    data-placeholder="Vui lòng chọn" style="width:100%; line-height: 30px;">
                                    <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5+">5+</option>
                                    </select>
                                </div>
                                <div class="col-lg-2 col-md-6 col-6 bottommargin-sm">
                                    <label>Phòng tắm</label>
                                    <select class="selectpicker" name="bathr" data-size="6"
                                    data-placeholder="Vui lòng chọn" style="width:100%; line-height: 30px;">
                                    <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5+">5+</option>
                                    </select>
                                </div>
                                <div class="col-md-2 col-sm-6 col-6">
                                    <button class="button button-3d button-rounded w-100 m-0"
                                        style="margin-top: 29px !important;">Tìm kiếm</button>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <input type="hidden" id="rg_price" name="price" value="">
                            <input type="hidden" id="rg_spft" name="spft" value="">
                            <div class="expand-link">
                                <div class="row justify-content-center mt-3">
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <label class="mb-3">Giá</label>
                                        <input class="price-range-slider" />
                                    </div>
                                    <div class="clear d-xl-none d-lg-none d-md-none d-sm-none bottommargin-sm"></div>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <label class="mb-3">Diện tích</label>
                                        <input class="area-range-slider" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <span class="more-search button button-3d button-rounded m-0"><i class="icon-line-plus"></i> Tìm kiếm nâng cao</span>
            </div>
        </div>
        <div class="video-wrap" style="position: absolute; top: 0; left: 0; height: 100%; z-index:1;">
            <div class="video-overlay" style="background: rgba(0,0,0,0.3); z-index: 1;"></div>
        </div>

    </section>

    <section id="content">
        <div class="content-wrap pt-0">
            <div class="section bg-transparent m-0 clearfix">
                <div class="container clearfix">
                    <div class="row justify-content-between">
                        <div class="col-12 text-end">

                            <div class="btn-group">
                                <div class="dropdown">
                                    <button class="btn btn-light text-white bg-color dropdown-toggle" type="button" id="dropdownMenu2"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e($page_title); ?></button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($item->parent_id == 0 || $item->parent_id == null): ?>
                                                <?php
                                                    $title = $item->json_params->title->{$locale} ?? $item->title;
                                                    $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id);

                                                    $url_current = url()->full();
                                                    $current = $alias_category == $url_current ? 'current-nav-item' : '';
                                                ?>
                                                <a href="<?php echo e($alias_category); ?>" title="<?php echo e($title); ?>" class="dropdown-item"><?php echo e(Str::limit($title, 100)); ?></a>
                                                <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($sub->parent_id == $item->id): ?>
                                                        <?php
                                                            $title_sub = $sub->json_params->title->{$locale} ?? $sub->title;
                                                            $alias_category_sub = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title_sub, $sub->id);

                                                            $current = $alias_category_sub == $url_current ? 'current-nav-item' : '';
                                                        ?>
                                                        <a href="<?php echo e($alias_category_sub); ?>" title="<?php echo e($title_sub); ?>" class="dropdown-item"><?php echo e(Str::limit($title_sub, 100)); ?></a>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="real-estate mb-3 mt-2 grid-container row portfolio gutter-20 col-mb-50"
                        data-layout="fitRows">
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php

                                $title = $item->json_params->title->{$locale} ?? $item->title;
                                $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                                $price = $item->price ?? '0';
                                $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                                $convenient = $item->json_product ?? [];
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
                                $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
                                $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
                            ?>
                            <div class="real-estate-item portfolio-item col-12 col-md-6 col-lg-4">
                                <div class="real-estate-item-image">
                                    <div class="label badge bg-danger">Ưu đãi</div>
                                    <a href="<?php echo e($alias); ?>">
                                        <img style="height: 200px;object-fit: cover;width: 100%;"
                                            src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">
                                    </a>
                                    <div class="real-estate-item-price">
                                        <?php echo e(number_format($price, 0, ',', '.')); ?>

                                        VNĐ<span><?php echo e($Product_type[$item->type]); ?>

                                            <?php echo e($item->type == 1 ? '/ ' . $Type_price[$item->type_price] : ''); ?></span>
                                    </div>
                                    <div class="real-estate-item-info clearfix" data-lightbox="gallery">
                                        <a href="<?php echo e($image); ?>" data-bs-toggle="tooltip" title="Hình ảnh"
                                            data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
                                        <?php if(isset($item->json_params->gallery_image)): ?>
                                            <?php $__currentLoopData = $item->json_params->gallery_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="<?php echo e($value); ?>" class="d-none"
                                                    data-lightbox="gallery-item"></a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="real-estate-item-desc p-0">
                                    <h3><a href="<?php echo e($alias); ?>"><?php echo e($title); ?></a></h3>
                                    <span>Khu vực <?php echo e($city_name); ?></span>


                                    <div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

                                    <div class="real-estate-item-features fw-medium font-primary clearfix">
                                        <div class="row g-0">
                                            <div class="col-lg-6 p-0">Diện tích: <span
                                                    class="color"><?php echo e($item->spft); ?>m2</span></div>
                                            <div class="col-lg-6 p-0">Phòng ngủ: <span
                                                    class="color"><?php echo e($item->bedrooom); ?></span></div>

                                            <?php if(isset($item->json_product->convenient)): ?>
                                                <?php $__currentLoopData = $convenient['convenient']['name']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        if ($i == 2) {
                                                            break;
                                                        }
                                                        if ($val == '') {
                                                            continue;
                                                        }
                                                        $i++;
                                                    ?>
                                                    <div class="col-lg-6 p-0"><?php echo e($val); ?>:
                                                        <span class="text-success"><i class="icon-check-sign"></i></span>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($posts->withQueryString()->links('frontend.pagination.default')); ?>


                    </div>

                    <?php echo $__env->make('frontend.components.sidebar.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



                </div>
            </div>
        </div><!-- .content-wrap end -->
    </section>




    
    <script></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fhmagency/domains/fhmagency.vn/public_html/bds/resources/views/frontend/pages/product/category.blade.php ENDPATH**/ ?>