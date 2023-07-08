<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : null;
    $background = $block->image_background != '' ? $block->image_background : null;
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
  ?>
  

  <section id="box_form" class="mb-5 pt-lg-5">
    <div class="box_title text-center mb-3 mb-lg-5">
      <h2 class="title text-uppercase"><?php echo e($title); ?></h2>
      <p class="bref">
        <?php echo e($brief); ?>

      </p>
    </div>
    <div class="bg_grey p-3 p-lg-5">
      <div class="box_bg d-flex justify-content-end" style="background: url(<?php echo e($background); ?>);background-size:  100% 100% ;background-repeat:  no-repeat">
        <div class="frame_form col-12 col-lg-7">
          <form class="form_ajax" action="<?php echo e(route('frontend.contact.store')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="is_type" value="call_request">
            <div class="row bd_bottom justify-content-between">
              <div class="col-12 col-sm-5">
                <div class="form-group row align-items-center mb-lg-4">
                  <label for="height" class="col-sm-5 col-form-label"
                    ><?php echo app('translator')->get('Chều cao(Cm)'); ?></label
                  >
                  <div class="col-11 col-sm-6">
                    <input
                      type="number"
                      class="form-control"
                      name="json_params[height]"
                      min="1"
                      id="height"
                      value=""
                    />
                  </div>
                  <i class="far fa-check-circle"></i>
                </div>
                <div class="form-group row align-items-center mb-lg-4">
                  <label for="weight" class="col-sm-5 col-form-label"
                    ><?php echo app('translator')->get('Cân nặng(Kg)'); ?></label
                  >
                  <div class="col-11 col-sm-6">
                    <input
                      type="number"
                      class="form-control"
                      name="json_params[weight]"
                      min="1"
                      id="weight"
                      value=""
                    />
                  </div>
                  <i class="far fa-check-circle"></i>
                </div>
                <div class="form-group row align-items-center mb-lg-4">
                  <label for="gender" class="col-sm-5 col-form-label"
                    ><?php echo app('translator')->get('Giới tính'); ?></label
                  >
                  <div class="col-11 col-sm-6">
                    <select
                      name="json_params[gender]"
                      id="gender"
                      class="form-control"
                    >
                      <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                      <option value="male"><?php echo app('translator')->get('Male'); ?></option>
                      <option value="female"><?php echo app('translator')->get('Female'); ?></option>
                    </select>
                  </div>
                  <i class="far fa-check-circle"></i>
                </div>
                <div class="form-group row align-items-center mb-lg-4">
                  <label for="year" class="col-sm-5 col-form-label"
                    ><?php echo app('translator')->get('Năm sinh'); ?></label
                  >
                  <div class="col-11 col-sm-6">
                    <input
                      type="number"
                      class="form-control"
                      name="json_params[year]"
                      min="1"
                      id="year"
                      value=""
                    />
                  </div>
                  <i class="far fa-check-circle"></i>
                </div>
              </div>
              <div class="col-12 col-sm-6">
                <div class="form-group row align-items-center mb-lg-4">
                  <label for="height" class="col-sm-6 col-form-label"
                    ><?php echo app('translator')->get('Bạn từng học Yoga'); ?></label
                  >
                  <div class="col-11 col-sm-4">
                    <select
                      name="json_params[studied]"
                      
                      class="form-control"
                    >
                      <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                      <option value="yes"><?php echo app('translator')->get('Yes'); ?></option>
                      <option value="no"><?php echo app('translator')->get('No'); ?></option>
                    </select>
                  </div>
                  <i class="far fa-check-circle"></i>
                </div>
                <div class="form-group row align-items-center mb-lg-4">
                  <label for="weight" class="col-sm-6 col-form-label"
                    >Bạn có chấn thương</label
                  >
                  <div class="col-11 col-sm-4">
                    <select
                      name="json_params[is_injury]"
                      
                      class="form-control"
                    >
                      <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                      <option value="yes"><?php echo app('translator')->get('Yes'); ?></option>
                      <option value="no"><?php echo app('translator')->get('No'); ?></option>
                    </select>
                  </div>
                  <i class="far fa-check-circle"></i>
                </div>
                <div class="form-group row align-items-center mb-lg-4">
                  <label for="gender" class="col-sm-6 col-form-label"
                    ><?php echo app('translator')->get('Bạn có gặp bệnh lý'); ?></label
                  >
                  <div class="col-11 col-sm-4">
                    <select
                      name="json_params[is_sick]"
                      class="form-control"
                    >
                      <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                      <option value="yes"><?php echo app('translator')->get('Yes'); ?></option>
                      <option value="no"><?php echo app('translator')->get('No'); ?></option>
                    </select>
                  </div>
                  <i class="far fa-check-circle"></i>
                </div>
                <div class="form-group row align-items-center mb-lg-4">
                  <label for="year" class="col-sm-6 col-form-label"
                    ><?php echo app('translator')->get('Thời gian tập TB/giờ'); ?></label
                  >
                  <div class="col-11 col-sm-4">
                    <select
                      name="json_params[time]"
                      class="form-control"
                    >
                      <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                      <option value="yes"><?php echo app('translator')->get('Yes'); ?></option>
                      <option value="no"><?php echo app('translator')->get('No'); ?></option>
                    </select>
                  </div>
                  <i class="far fa-check-circle"></i>
                </div>
              </div>
            </div>
            <hr class="line" />
            <p class="device-width">
              <?php echo $content; ?>

            </p>
            <div class="form-group row">
              <div class="form-group col-12 col-sm-5">
                <input
                  type="text"
                  class="form-control"
                  name="name"
                  placeholder="Họ và tên *"
                  value=""
                  required
                />
              </div>
              <div class="form-group col-12 col-sm-5">
                <input
                  type="text"
                  class="form-control"
                  name="phone"
                  placeholder="Số điện thoại *"
                  value=""
                  required
                />
              </div>
              <div class="form-group col-12 col-sm-2 text-center">
                <input type="submit" class="btn btn-dark" value="Gửi" />
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\yoga\resources\views/frontend/blocks/form/styles/booking.blade.php ENDPATH**/ ?>