<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $image = $block->image != '' ? $block->image : null;
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';

        $image_for_screen = null;
        if ($agent->isDesktop() && $image_background != null) {
            $image_for_screen = $image_background;
        } else {
            $image_for_screen = $image;
        }

        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>
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
    </style>
    <section id="slider" class="slider-element include-header include-topbar"
        style="background: url('<?php echo e($image_for_screen); ?>') center center no-repeat; background-size: cover; overflow: visible;">
        <div class="container" style="z-index: 2">
            <div class="tabs advanced-real-estate-tabs">
                <div class="tab-container">
                    <div class="tab-content clearfix" id="tab-properties">
                        <form action="<?php echo e(route('frontend.search')); ?>" method="GET" class="mb-0">
                            <div class="row clearfix">
                                <div class="col-md-2 col-sm-12">
                                    <label for="" class="d-block">Loại</label>
                                    <input type="hidden"name="type_ck" value="1">
                                    <input class="bt-switch" name="type" value="2" type="checkbox" <?php echo e((isset($params['type']))?"checked":""); ?>

                                        data-on-text="Mua" data-off-text="Thuê" data-on-color="themecolor"
                                        data-off-color="themecolor">
                                </div>
                                <div class="col-md-3 col-sm-6 col-12">
                                    <label for="">Khu vực</label>
                                    <select class="selectpicker" name="city" data-live-search="true"
                                        data-placeholder="Chọn khu vực" data-size="6" style="width:100%;">
                                        <option value="">Chọn khu vực</option>
                                        <?php $__currentLoopData = $City; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($val['id']); ?>" <?php echo e((isset($params['city']) && $params['city'] == $val['id'])?"selected":""); ?>><?php echo e($val['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-lg-2 col-md-6 col-6 bottommargin-sm">
                                    <label>Phòng ngủ</label>
                                    <select class="selectpicker" name="bedr" data-size="6"
                                        data-placeholder="Vui lòng chọn" style="width:100%; line-height: 30px;">
                                        <option value="">Chọn phòng ngủ</option>
                                        <?php $__currentLoopData = $DataBedr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key); ?>" <?php echo e((isset($params['bedr']) && $key == $params['bedr'])?"selected":""); ?>><?php echo e($val); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-lg-2 col-md-6 col-6 bottommargin-sm">
                                    <label>Phòng tắm</label>
                                    <select class="selectpicker" name="bathr" data-size="6"
                                        data-placeholder="Vui lòng chọn" style="width:100%; line-height: 30px;">
                                        <option value="">Chọn phòng tắm</option>
                                        <?php $__currentLoopData = $DataBathr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key); ?>" <?php echo e((isset($params['bathr']) && $key == $params['bathr'])?"selected":""); ?>><?php echo e($val); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="col-md-2 col-sm-6 col-6">
                                    <button class="button button-3d button-rounded w-100 m-0"
                                        style="margin-top: 29px !important;">Tìm kiếm</button>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <input type="hidden" id="rg_price" name="price" value="<?php echo e((isset($params['price']))?$params['price']:""); ?>">
                            <input type="hidden" id="rg_spft" name="spft" value="<?php echo e((isset($params['spft']))?$params['spft']:""); ?>">
                            <div class="expand-link">
                                <div class="row justify-content-center mt-3">
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <label class="mb-3">Giá</label>
                                        <input class="price-range-slider" >
                                    </div>
                                    <div class="clear d-xl-none d-lg-none d-md-none d-sm-none bottommargin-sm"></div>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <label class="mb-3">Diện tích</label>
                                        <input class="area-range-slider">
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
<?php endif; ?>
<?php /**PATH /home/fhmagency/domains/fhmagency.vn/public_html/bds/resources/views/frontend/blocks/banner/styles/search.blade.php ENDPATH**/ ?>