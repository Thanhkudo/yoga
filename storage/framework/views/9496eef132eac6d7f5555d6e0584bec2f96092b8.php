

<?php
  $page_title = $taxonomy->title ?? ($page->title ?? ($page->name ?? ''));
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
?>
<?php $__env->startPush('style'); ?>
  <style>
    .page-title-area {
      background-image: url('<?php echo e($image_background); ?>');
      background-position: center center;
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
  
  <div class="page-title-area">
    <div class="container">
      <span class="page-tag"><?php echo e($page->name ?? ''); ?></span>
      <h2 class="page-title"><?php echo e($page_title); ?></h2>

      <ul class="breadcrumb-nav">
        <li><a href="<?php echo e(route('frontend.home')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
        <li class="active"><?php echo e($page->name ?? ''); ?></li>
      </ul>
    </div>
  </div>

  <div class="entry-page">
    <div class="site-container fullwidth-container">
      <div class="site-content-wrapper no-sidebar">
        <div class="content-area">

          <div id="post-736" class="page-inner clearfix post-736 page type-page status-publish hentry">
            <div data-elementor-type="wp-page" data-elementor-id="736" class="elementor elementor-736">
              <?php if(isset($web_information->source_code->map)): ?>
                <section
                  class="elementor-section elementor-top-section elementor-element elementor-element-4df8c17 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                  data-id="4df8c17" data-element_type="section" style="margin-bottom: 50px">
                  <div class="elementor-container elementor-column-gap-default">
                    <div
                      class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-633caad"
                      data-id="633caad" data-element_type="column">
                      <div class="elementor-widget-wrap elementor-element-populated">
                        <div
                          class="elementor-element elementor-element-70e150b elementor-widget elementor-widget-google_maps"
                          data-id="70e150b" data-element_type="widget" data-widget_type="google_maps.default">
                          <div class="elementor-widget-container">
                            <div class="elementor-custom-embed">
                              <?php echo $web_information->source_code->map; ?>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              <?php endif; ?>




              <div class="container">

                <div class="row gutter-40 col-mb-80">
                  <div class="postcontent col-lg-9">

                    <h3>LIÊN HỆ TRỰC TUYẾN</h3>

                    <div class="">

                      <div class="form-result"></div>

                      <form class="mb-0 form_ajax" method="post" action="<?php echo e(route('frontend.contact.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-process">
                          <div class="css3-spinner">
                            <div class="css3-spinner-scaler"></div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12 form-group">
                            <label for="name"><?php echo app('translator')->get('Fullname'); ?> <small class="text-danger">*</small></label>
                            <input type="text" id="name" name="name" value=""
                              class="sm-form-control required" required />
                          </div>

                          <div class="col-md-6 form-group">
                            <label for="email">Email <small class="text-danger">*</small></label>
                            <input type="email" id="email" name="email" value=""
                              class="required email sm-form-control" required />
                          </div>

                          <div class="col-md-6 form-group">
                            <label for="phone"><?php echo app('translator')->get('phone'); ?> <small class="text-danger">*</small></label>
                            <input type="text" id="phone" name="phone" value="" class="sm-form-control"
                              required />
                          </div>

                          <div class="w-100"></div>

                          <div class="col-12 form-group">
                            <label for="content"><?php echo app('translator')->get('Content'); ?> <small class="text-danger">*</small></label>
                            <textarea class="required sm-form-control" id="content" name="content" rows="6" cols="30" required></textarea>
                          </div>


                          <div class="col-12 form-group">
                            <button
                              class="btn btn-warning text-uppercase"
                              type="submit" name="submit" value="submit">
                              <span>Gửi liên hệ</span>
                            </button>
                          </div>
                        </div>

                        <input type="hidden" name="is_type" value="contact">

                      </form>
                    </div>

                  </div><!-- .postcontent end -->

                  <div class="sidebar col-lg-3">
                    <address>
                      <strong><?php echo app('translator')->get('address'); ?>:</strong><br>
                      <?php echo $web_information->information->address ?? ''; ?>

                    </address>
                    <abbr title="Phone Number">
                      <strong><?php echo app('translator')->get('phone'); ?>:</strong>
                    </abbr>
                    <?php echo $web_information->information->phone ?? ''; ?><br>
                    <abbr title="Email Address"><strong>Email:</strong></abbr>
                    <?php echo $web_information->information->email ?? ''; ?>


                  </div><!-- .sidebar end -->
                </div>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\kon10ted\resources\views/frontend/pages/contact/index.blade.php ENDPATH**/ ?>