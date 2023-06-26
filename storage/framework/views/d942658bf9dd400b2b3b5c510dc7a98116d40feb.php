<footer id="footer">
  <div class="container">
    <!-- Footer Widgets
    ============================================= -->
    <div class="footer-widgets-wrap">
      <div class="row col-mb-50">
        <div class="col-lg-6">
          <div class="widget clearfix">
            <img src="<?php echo e($web_information->image->logo_footer ?? ''); ?>" alt="Image" class="footer-logo" />

            <p>
              <?php echo $web_information->information->slogan ?? ''; ?>

            </p>

            <div class="py-2">
              <div class="row col-mb-30">
                <div class="col-6">
                  <address class="mb-0">
                    <abbr title="Headquarters"
                      style="display: inline-block; margin-bottom: 7px"><strong>Headquarters:</strong></abbr>
                    <br />
                    <?php echo e($web_information->information->address ?? ''); ?>

                  </address>
                </div>
                <div class="col-6">
                  <abbr title="Phone Number"><strong>Phone:</strong></abbr>
                  <?php echo e($web_information->information->phone ?? ''); ?><br />
                  <abbr title="Fax"><strong>Hotline:</strong></abbr>
                  <?php echo e($web_information->information->hotline ?? ''); ?><br />
                  <abbr title="Email Address"><strong>Email:</strong></abbr>
                  <?php echo e($web_information->information->email ?? ''); ?>

                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="col-sm-6 col-lg-3">
          <div class="widget clearfix">
            <h4>Recent Posts</h4>

            <div class="posts-sm row col-mb-30" id="post-list-footer">
              <div class="entry col-12">
                <div class="grid-inner row">
                  <div class="col">
                    <div class="entry-title">
                      <h4>
                        <a href="#">Lorem ipsum dolor sit amet, consectetur</a>
                      </h4>
                    </div>
                    <div class="entry-meta">
                      <ul>
                        <li>10th July 2021</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

              <div class="entry col-12">
                <div class="grid-inner row">
                  <div class="col">
                    <div class="entry-title">
                      <h4>
                        <a href="#">Elit Assumenda vel amet dolorum quasi</a>
                      </h4>
                    </div>
                    <div class="entry-meta">
                      <ul>
                        <li>10th July 2021</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

              <div class="entry col-12">
                <div class="grid-inner row">
                  <div class="col">
                    <div class="entry-title">
                      <h4>
                        <a href="#">Debitis nihil placeat, illum est nisi</a>
                      </h4>
                    </div>
                    <div class="entry-meta">
                      <ul>
                        <li>10th July 2021</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-3">
          <div class="widget quick-contact-widget form-widget clearfix">
            <h4>Send Message</h4>

            <div class="form-result"></div>

            <form action="<?php echo e(route('frontend.contact.store')); ?>" method="post" class="quick-contact-form mb-0">
              <?php echo csrf_field(); ?>
              <div class="form-process">
                <div class="css3-spinner">
                  <div class="css3-spinner-scaler"></div>
                </div>
              </div>

              <div class="input-group mx-auto">
                <div class="input-group-text">
                  <i class="icon-user"></i>
                </div>
                <input type="text" class=" form-control" id="quick-contact-form-name" name="name" value=""
                  placeholder="Full Name" required />
              </div>
              <div class="input-group mx-auto">
                <div class="input-group-text">
                  <i class="icon-email2"></i>
                </div>
                <input type="text" class=" form-control email" id="quick-contact-form-email" name="email"
                  value="" placeholder="Email Address" required />
              </div>
              <textarea class=" form-control input-block-level short-textarea" name="content" rows="4" cols="30"
                placeholder="Message"></textarea>
              <button type="submit" class="button m-0" value="submit">
                Send Email
              </button>
              <input type="hidden" name="is_type" value="call_request">
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- .footer-widgets-wrap end -->
  </div>

  <!-- Copyrights
  ============================================= -->
  <div id="copyrights">
    <div class="container text-center text-uppercase">
      Copyrights © 2022 All Rights Reserved.
    </div>
  </div>
  <!-- #copyrights end -->
</footer>
<?php /**PATH D:\project\it\resources\views/frontend/blocks/footer/styles/default.blade.php ENDPATH**/ ?>