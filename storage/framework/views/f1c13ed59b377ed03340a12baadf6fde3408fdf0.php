<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $image = $block->image!= '' ? $block->image: url('demos/barber/images/icons/comb3.svg');
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
            ->limit(4)
            ->get();

    ?>
    <div id="shop" class="section m-0 page-section bg-transparent">
        <?php
            // echo "<pre>";
            //     print_r($rows);
            // echo "<pre>";
        ?>
        <div class="container">
            <div class="heading-block center">
                <img src="<?php echo e($image); ?>" alt="Image" height="40"
                    style="margin-bottom: 20px">
                <h2><?php echo e($title); ?></h2>
            </div>

            <div class="row col-mb-50 mb-0">
                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $title = $item->json_params->title->{$locale} ?? $item->title;
                        $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                        $price = $item->json_params->price??null;
                        $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                        $date = date('H:i d/m/Y', strtotime($item->created_at));
                        // Viet ham xu ly lay slug
                        $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->taxonomy_title, $item->taxonomy_id);
                        $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id, 'detail', $item->taxonomy_title);
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="product">
                            <div class="product-image">
                                <a href="<?php echo e($alias); ?>"><img src="<?php echo e($image); ?>"
                                        alt="<?php echo e($title); ?>"></a>
                                <a class="add-to-cart shop-icon" data-id="<?php echo e($item->id); ?>" data-quantity="1"><i class="icon-shopping-cart"></i></a>
                            </div>
                            <div class="product-desc center">
                                <div class="product-price"><ins>$ <?php echo e($price); ?></ins></div>
                                <div class="product-title">
                                    <h3><a href="<?php echo e($alias); ?>"><?php echo e($title); ?></a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="center">
                <a href="<?php echo e($url_link); ?>" class="button button-large button-color"><?php echo e($url_link_title); ?></a>
            </div>

        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\barber\resources\views/frontend/blocks/cms_product/styles/default.blade.php ENDPATH**/ ?>