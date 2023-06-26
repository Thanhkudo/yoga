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
  <div class="section m-0 border-bottom" id="form-order"
    style="background: url('<?php echo e($background); ?>') no-repeat center center; background-size: cover; padding: 100px 0;">
    <div class="container">
      <div class="row justify-content-between align-items-center">

        <div class="col-md-6">
          <div class="heading-block border-bottom-0 bottommargin-sm">
            <div class="badge rounded-pill badge-default"><?php echo e($title); ?></div>
            <h2 class="nott ls0"><?php echo nl2br($brief); ?></h2>
          </div>
          <p><?php echo nl2br($content); ?></p>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="card shadow-sm">
            <div class="card-body">
              <h2 class="mb-3">ĐĂNG KÝ BÁO GIÁ</h2>
              <div class="">
                <div class="form-result"></div>
                <form class="row mb-0 form_ajax" id="template-contactform" name="template-contactform"
                  action="<?php echo e(route('frontend.contact.store')); ?>" method="post">
                  <?php echo csrf_field(); ?>
                  <div class="col-12 form-group mb-3">
                    <label for="name"><?php echo app('translator')->get('Fullname'); ?> *</label>
                    <input type="text" id="name" name="name" class="form-control input-sm required"
                      value="" required>
                  </div>
                  <div class="col-12 form-group mb-3">
                    <label for="phone"><?php echo app('translator')->get('phone'); ?> *</label>
                    <input type="text" id="phone" name="phone" class="form-control input-sm required"
                      value="" required>
                  </div>
                  <div class="col-12 form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control input-sm" value="">
                  </div>
                  <div class="col-12 form-group mb-4">
                    <label for="content"><?php echo app('translator')->get('Content'); ?></label>
                    <textarea type="text" id="content" name="content" class="form-control input-sm required" value=""></textarea>
                  </div>
                  <div class="col-12 form-group mb-0">
                    <button
                      class="button button-border button-rounded button-fill button-blue w-100 m-0 ls0 text-uppercase"
                      type="submit" id="submit" name="submit" value="submit">
                      <span>Gửi đăng ký</span>
                    </button>
                  </div>

                  <input type="hidden" name="is_type" value="call_request">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH D:\project\kon10ted\resources\views/frontend/blocks/form/styles/booking.blade.php ENDPATH**/ ?>