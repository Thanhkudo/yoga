<?php
    $title = $detail->json_params->title->{$locale} ?? $detail->title;
    $name_admin = $detail->name ?? '';
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
    $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $taxonomy_alias, $detail->taxonomy_id);
    
    $seo_title = $detail->json_params->seo_title ?? $title;
    $seo_keyword = $detail->json_params->seo_keyword ?? null;
    $seo_description = $detail->json_params->seo_description ?? $brief;
    $seo_image = $image ?? ($image_thumb ?? null);
    
    // schema information
    $datePublished = date('d/m/Y', strtotime($detail->created_at));
    $dateModified = date('Y-m-d', strtotime($detail->updated_at));

    if ($agent->isDesktop() && $image_background != null) {
        $image_for_screen = $image_background;
    } else {
        $image_for_screen = $image != null ? $image : $web_information->image->background_breadcrumbs ?? '';
    }
?>

<?php $__env->startPush('style'); ?>
    <style>
        .learning_detail .bg_page {
            background: url(<?php echo e($image_for_screen); ?>);
            background-size: 100% 100%;
            background-repeat: no-repeat;
            height: auto;
            max-height: 570px;
        }
    </style>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
    <div class="bodywrap container">
        <section id="sliderww" class="">
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
                                <p class="font-playball grey"><?php echo e($taxonomy_title); ?></p>
                                <span class="green">YOGA</span> STUDIO
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="blogpage mt-5">
            <div class="container layout-article">
                <div class="bg_blog">
                    <article class="article-main">
                        <div class="row">
                            <div class="right-content col-xl-8 col-lg-8 col-12">
                                <div class="article-details">
                                    <h1 class="article-title">
                                        <?php echo e($title); ?>

                                    </h1>

                                    <span class="time_post">
                                        <span class="name_"><i class="fas fa-user-tie"></i>&nbsp;<?php echo e($name_admin); ?></span>
                                        &nbsp; | &nbsp;
                                        <span><i class="far fa-clock"></i>&nbsp;Ngày <?php echo e($datePublished); ?></span>
                                    </span>
                                    <div class="article-content">
                                        <div class="rte">
                                            <?php echo $content ?? ''; ?>

                                        </div>
                                    </div>
                                </div>

                                
                            </div>
                            <?php echo $__env->make('frontend.components.sidebar.post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </div>
    


    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\yoga\resources\views/frontend/pages/post/detail.blade.php ENDPATH**/ ?>