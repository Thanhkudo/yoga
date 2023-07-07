<?php
    $page_title = $taxonomy->title ?? ($page->title ?? $page->name);
    $image = $taxonomy->json_params->image ?? null;
    $image_background = $taxonomy->json_params->image_background ?? null;
    $brief = $taxonomy->json_params->brief->{$locale} ?? $taxonomy->taxonomy;
    $content = $taxonomy->json_params->content->{$locale} ?? $taxonomy->content;
    
    $title = $taxonomy->json_params->title->{$locale} ?? ($taxonomy->title ?? null);
    $image = $taxonomy->json_params->image ?? null;
    $seo_title = $taxonomy->json_params->seo_title ?? $title;
    $seo_keyword = $taxonomy->json_params->seo_keyword ?? null;
    $seo_description = $taxonomy->json_params->seo_description ?? null;
    $seo_image = $image ?? null;
    $params_taxonomy['status'] = App\Consts::TAXONOMY_STATUS['active'];
    $params_taxonomy['taxonomy'] = App\Consts::TAXONOMY['product'];
    $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params_taxonomy)->get();
    
    if ($agent->isDesktop() && $image_background != null) {
        $image_for_screen = $image_background;
    } else {
        $image_for_screen = $image != null ? $image : $web_information->image->background_breadcrumbs ?? '';
    }
?>


<?php $__env->startSection('content'); ?>
    
    <div class="container">
        <section id="slider" class="">
            <div id="title" class="page-title">
                <div class="bg_page"
                    style="background: url(<?php echo e($image_for_screen); ?>);
            background-size: 100% 100%;
            background-repeat: no-repeat;
            height: calc(100vh - 180px);
            max-height: 570px;">
                    <div class="container d-flex justify-content-md-end">
                        <div class="col-12 col-md-6 mt_page_title">
                            <h2 class="title">
                                <p class="font-playball grey"><?php echo e($page_title); ?></p>
                                <span class="green">YOGA</span> STUDIO
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="course" class="mb-5 box_learning"
            style="background: url(<?php echo e(url('data/cms-image/images/bg_learning1.png')); ?>); 
        background-size: 100% 100%;
        background-repeat: no-repeat;">
            <div class="box_title text-center mb-3 mb-lg-5">
                <h2 class="title text-uppercase"><?php echo e($brief); ?></h2>
                <p class="bref">
                    <?php echo e($content); ?>

                </p>
            </div>
            <div class="box_slick">
                <div class="box_items d-flex flex-wrap justify-content-around">
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $title = $item->json_params->title->{$locale} ?? $item->title;
                            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                            $price = $item->json_params->price ?? '0';
                            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                            
                            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
                            $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
                        ?>
                        <div class="items col-12 col-md-6 col-lg-4">
                            <div class="slick_items">
                                <div class="box bora-30">
                                    <h3 class="title text-center text-uppercase">
                                        <?php echo e($title); ?>

                                    </h3>
                                    <hr class="line" />
                                    <div class="money text-center"><sup>$</sup><?php echo e($price); ?></div>
                                    <div class="content">
                                        <?php echo $brief; ?>

                                    </div>

                                    <div class="box_btn text-center">
                                        <a href="<?php echo e($alias); ?>"><button
                                                class="btn bg_green text-uppercase bora-30 text-uppercase">
                                                xem chi tiêt
                                                <svg class="cl_svg" width="16" height="12" viewBox="0 0 16 12"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.74295 6.32127L2.76404 11.0168C2.41991 11.3413 1.86345 11.3413 1.52298 11.0168L0.695598 10.2365C0.351467 9.91194 0.351467 9.38715 0.695598 9.06606L4.22477 5.73778L0.695598 2.40951C0.351467 2.08497 0.351467 1.56018 0.695598 1.23909L1.51932 0.451902C1.86345 0.127361 2.41991 0.127361 2.76038 0.451902L7.73929 5.1474C8.08709 5.47194 8.08709 5.99673 7.74295 6.32127ZM14.772 5.1474L9.79309 0.451902C9.44896 0.127361 8.8925 0.127361 8.55203 0.451902L7.72465 1.23218C7.38052 1.55672 7.38052 2.08151 7.72465 2.4026L11.2538 5.73088L7.72465 9.05915C7.38052 9.3837 7.38052 9.90849 7.72465 10.2296L8.55203 11.0099C8.89616 11.3344 9.45262 11.3344 9.79309 11.0099L14.772 6.31436C15.1161 5.99673 15.1161 5.47194 14.772 5.1474Z"
                                                        fill="white" />
                                                </svg>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div>
            </div>
        </section>
    </div>

    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\yoga\resources\views/frontend/pages/product/category.blade.php ENDPATH**/ ?>