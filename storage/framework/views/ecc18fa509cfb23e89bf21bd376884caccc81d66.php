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
  <section class="contact bg-light" id="contact">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-6 col-lg-12">
          <?php echo $content; ?>

        </div>

        <div class="col-xl-6 col-lg-12">
          <div class="text-center pb-3">
            <h2><?php echo e($title); ?></h2>
          </div>
          <form class="contact-form form_ajax" method="post" action="<?php echo e(route('frontend.contact.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
              <input type="text" class="form-control" id="name" name="name" required value=""
                autocomplete="off" onkeyup="this.setAttribute('value', this.value);" />
              <label for="name"><?php echo app('translator')->get('Fullname'); ?> *</label>
              <span class="input-border"></span>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="email" name="email" value="" autocomplete="off"
                onkeyup="this.setAttribute('value', this.value);" />
              <label for="email">Email</label>
              <span class="input-border"></span>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="phone" name="phone" required value=""
                autocomplete="off" onkeyup="this.setAttribute('value', this.value);" />
              <label for="subject"><?php echo app('translator')->get('Phone'); ?> *</label>
              <span class="input-border"></span>
            </div>
            <div class="form-group">
              <textarea class="form-control" id="content" name="content" required data-value="" autocomplete="off"
                onkeyup="this.setAttribute('data-value', this.value);"></textarea>
              <label for="message"><?php echo app('translator')->get('Content'); ?> *</label>
              <span class="input-border"></span>
            </div>
            <!-- Button Send Message  -->
            <input type="hidden" name="is_type" value="call_request">
            <button class="contact-btn main-btn" type="submit" name="send">
              <span><?php echo app('translator')->get('Gửi đăng ký'); ?></span>
            </button>
            <!-- Form Message  -->
            <div class="form-message text-center"><span></span></div>
          </form>
        </div>

      </div>
    </div>
  </section>
<?php endif; ?>
<?php /**PATH D:\project\qlady\resources\views/frontend/blocks/form/styles/booking.blade.php ENDPATH**/ ?>