<div class="sidebar col-lg-12">
    <div class="sidebar-widgets-wrap">
        <?php
            $params_product['status'] = App\Consts::POST_STATUS['active'];
            $params_product['is_type'] = App\Consts::POST_TYPE['product'];
            $params_product['order_by'] = 'id';

            $recents = App\Http\Services\ContentService::getCmsPost($params_product)
                ->limit(App\Consts::PAGINATE['sidebar'])
                ->get();
        ?>
        <?php if(isset($recents)): ?>
            <div class="widget clearfix">

                <h2><?php echo app('translator')->get('Latest products'); ?></h2>

                <div class="real-estate mt-2 grid-container row portfolio gutter-20 col-mb-50" data-layout="fitRows">
                    <?php $__currentLoopData = $recents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php

                            $title = $item->json_params->title->{$locale} ?? $item->title;
                            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                            $price = $item->price ?? '0';
                            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                            $convenient = $item->json_product??[];
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
                                <div class="real-estate-item-price">đ</span>
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
                </div>
            </div>

        <?php endif; ?>

        <?php
            $params_product['status'] = App\Consts::POST_STATUS['active'];
            $params_product['is_type'] = App\Consts::POST_TYPE['product'];
            $params_product['order_by'] = 'count_visited';

            $mostViews = App\Http\Services\ContentService::getCmsPost($params_product)
                ->limit(App\Consts::PAGINATE['sidebar'])
                ->get();
        ?>
        <?php if(isset($mostViews)): ?>
            <div class="widget clearfix">

                <h2><?php echo app('translator')->get('Most viewed products'); ?></h2>

                <div class="real-estate mt-2 grid-container row portfolio gutter-20 col-mb-50" data-layout="fitRows">
                    <?php $__currentLoopData = $mostViews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php

                            $title = $item->json_params->title->{$locale} ?? $item->title;
                            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                            $price = $item->price ?? '0';
                            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                            $convenient = $item->json_product??[];
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
                                    </span>
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
                </div>

            </div>

        <?php endif; ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\maison\resources\views/frontend/components/sidebar/product.blade.php ENDPATH**/ ?>