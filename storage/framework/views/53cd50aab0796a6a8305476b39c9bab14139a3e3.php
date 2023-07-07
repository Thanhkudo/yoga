<?php
    $page_title = $taxonomy->title ?? ($page->title ?? ($page->name ?? ''));
    $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
    $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
    $params['taxonomy'] = App\Consts::TAXONOMY['product'];
    $params['is_type'] = App\Consts::TAXONOMY['product'];
    $rows = App\Http\Services\ContentService::getCmsPost($params)->get();
?>

<?php $__env->startSection('content'); ?>
    <section id="form_learning">
        <div class="container">
            <div class="box_title text-center mb-3 mb-lg-5">
                <h2 class="title text-uppercase">Form đăng ký thông tin</h2>
                <p class="bref">Vui lòng điền thông tin và chọn gói tập</p>
            </div>
            <form class="form_ajax" action="<?php echo e(route('frontend.contact.store')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="is_type" value="contact">
                <div class="box_form">
                    <div class="d-flex flex-wrap">
                        <div class="col-12 col-lg-6 p-3 p-lg-5">
                            <p class="title text-uppercase">Thông tin tài khoản</p>
                            <div class="form-group">
                                <label for="name">Họ và tên <sup>*</sup></label>
                                <input type="text" name="name" id="name" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại <sup>*</sup></label>
                                <input type="text" name="phone" id="phone" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label for="name">Email <sup>*</sup></label>
                                <input type="email" name="email" id="email" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-3 p-lg-5">
                            <p class="title text-uppercase">Thông tin gói tập</p>
                            <div class="form-group">
                                <label for="pack">Vui lòng chọn gói tập</label>
                                <select name="json_params[product]" id="pack" class="form-control">
                                    <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <p class="title text-uppercase">Thông tin thanh toán</p>
                            <div class="box_radio">
                                <div class="custom-control custom-radio">
                                    <input id="direct" name="json_params[payment]" type="radio" class="custom-control-input"
                                        checked value="direct" />
                                    <label class="custom-control-label" for="direct">Thanh toán trực tiếp</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="card" name="json_params[payment]" type="radio" class="custom-control-input"
                                        value="card" />
                                    <label class="custom-control-label" for="card">Thanh toán qua thẻ</label>
                                </div>
                            </div>
                            <div class="d-flex overflow-auto">
                                <img class="pr-2 pr-lg-4" width="85px" src="<?php echo e(url('data/cms-image/icon/pay1.png')); ?>"
                                    alt="Yoga studio" />
                                <img class="pr-2 pr-lg-4" width="85px" src="<?php echo e(url('data/cms-image/icon/pay2.png')); ?>"
                                    alt="Yoga studio" />
                                <img class="pr-2 pr-lg-4" width="85px" src="<?php echo e(url('data/cms-image/icon/pay3.png')); ?>"
                                    alt="Yoga studio" />
                                <img class="pr-2 pr-lg-4" width="85px" src="<?php echo e(url('data/cms-image/icon/pay4.png')); ?>"
                                    alt="Yoga studio" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-5">
                    <input class="btn btn-dark font-weight-bold bora-30 pr-4 pl-4" type="submit" value="Gửi" />
                </div>
            </form>
        </div>
    </section>
    <section class="mt-5">
        <div class="box-map text-center">
            <?php if(isset($web_information->source_code->map)): ?>
                <?php echo $web_information->source_code->map; ?>

            <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\yoga\resources\views/frontend/pages/contact/index.blade.php ENDPATH**/ ?>