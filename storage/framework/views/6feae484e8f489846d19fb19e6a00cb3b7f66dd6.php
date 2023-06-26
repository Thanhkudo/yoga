<?php
    $page_title = $taxonomy->title ?? ($page->title ?? $page->name);
    $seo_title = $page_title . (isset($params['keyword']) && $params['keyword'] != '' ? ': ' . $params['keyword'] : '');

    $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
?>

<?php $__env->startSection('content'); ?>
    <section id="content">
        <div class="content-wrap pt-0">
            <div class="section bg-transparent m-0 clearfix">
                <div class="container clearfix">
                    <div class="row mb-5 clearfix">
                        <div class="postcontent col-lg-12 order-lg-last">
                            <div class="real-estate grid-container row portfolio gutter-20 col-mb-50" data-layout="fitRows">
                                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php

                                        $title = $item->json_params->title->{$locale} ?? $item->title;
                                        $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                                        $price = $item->price ?? '0';
                                        $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                                        $convenient = json_decode($item->json_product, true);
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
                                                <img style="height: 200px;object-fit: cover;width: 100%;" src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">
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
                                                    <div class="col-lg-4 p-0">Phòng ngủ: <span
                                                        class="color"><?php echo e($item->bedrooom); ?></span></div>
                                                <div class="col-lg-4 p-0">Phòng tắm: <span
                                                        class="color"><?php echo e($item->bathrooom); ?></span></div>
                                                <div class="col-lg-4 p-0">Diện tích: <span
                                                        class="color"><?php echo e($item->spft); ?>m2</span></div>

                                                    <?php if(isset($item->json_product)): ?>
                                                        <?php $__currentLoopData = $convenient['convenient']['name']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                                <span class="text-success"><i
                                                                        class="icon-check-sign"></i></span>
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
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .content-wrap end -->
    </section>

    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fhmagency/domains/fhmagency.vn/public_html/bds/resources/views/frontend/pages/search/index.blade.php ENDPATH**/ ?>