<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $image = $block->image != '' ? $block->image : url('demos/barber/images/icons/comb3.svg');
        $background = $block->image_background != '' ? $block->image_background : url('demos/seo/images/sections/5.jpg');
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;

        $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
        $params['taxonomy'] = App\Consts::TAXONOMY['product'];

        $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)->get();

        $params['status'] = App\Consts::POST_STATUS['active'];
        $params['is_featured'] = true;
        $params['is_type'] = App\Consts::POST_TYPE['product'];
        $rows = App\Http\Services\ContentService::getCmsPost($params)
            ->limit(3)
            ->get();
        // dd($rows);
    ?>
    <div class="container clearfix" style="position: relative;">
        <div class="heading-block border-bottom-0">
            <h3><?php echo e($title); ?></h3>
        </div>

        <a href="<?php echo e($url_link); ?>"
            class="button button-small button-rounded button-border button-border-thin fw-medium m-0"
            style="position: absolute; top: 7px; right: 0.75rem;"><?php echo e($url_link_title); ?></a>

        <div class="real-estate owl-carousel image-carousel carousel-widget bottommargin-lg" data-margin="10"
            data-nav="true" data-loop="true" data-pagi="false" data-items-xs="1" data-items-sm="1" data-items-md="2"
            data-items-lg="3" data-items-xl="3">
            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $title = $item->json_params->title->{$locale} ?? $item->title;
                    $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                    $price = $item->price ?? null;
                    $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                    $convenient = json_decode($item->json_product,true);
                    // var_dump($convenient);
                    $city_name = '';
                    if (isset($item->city) && $item->city > 0) {
                        $city_name = '';
                        foreach ($city as $val) {
                            if ($val['id'] == $item->city) {
                                $city_name = $val['name'];
                                break;
                            }
                        }
                    }
                    $i=0;
                    $date = date('H:i d/m/Y', strtotime($item->created_at));
                    // Viet ham xu ly lay slug
                    $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->taxonomy_title, $item->taxonomy_id);
                    $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id, 'detail', $item->taxonomy_title);
                ?>
                <div class="oc-item">
                    <div class="real-estate-item">
                        <div class="real-estate-item-image">
                            <div class="label badge bg-success">Ưu đãi</div>
                            <a href="<?php echo e($alias); ?>">
                                <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">
                            </a>
                            <div class="real-estate-item-price">
                                <?php echo e(number_format($price, 0, ',', '.')); ?> VNĐ<span><?php echo e($Product_type[$item->type]); ?>

                                    <?php echo e($item->type == 1 ? '/ ' . $Type_price[$item->type_price] : ''); ?></span>
                            </div>
                            <div class="real-estate-item-info clearfix" data-lightbox="gallery">
                                <a href="<?php echo e($image); ?>" data-bs-toggle="tooltip" title="Hình ảnh"
                                    data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
                                <?php if(isset($item->json_params->gallery_image)): ?>
                                    <?php $__currentLoopData = $item->json_params->gallery_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e($value); ?>" class="d-none" data-lightbox="gallery-item"></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="real-estate-item-desc">
                            <h3 class="text-uppercase"><a href="<?php echo e($alias); ?>"><?php echo e($title); ?></a></h3>
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
                                                if($i==3){break;}
                                                if($val==""){continue;}
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
<?php /**PATH C:\xampp\htdocs\raovat\resources\views/frontend/blocks/cms_product/styles/default.blade.php ENDPATH**/ ?>