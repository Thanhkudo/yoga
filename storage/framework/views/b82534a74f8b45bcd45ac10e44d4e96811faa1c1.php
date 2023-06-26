<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image_background = $block->image_background != '' ? $block->image_background : url('demos/seo/images/sections/4.png');
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>

  <div class="section m-0" id="price-table"
    style="background: url('<?php echo e($image_background); ?>') no-repeat center top; background-size: cover;">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-4 mt-4">
          <div class="heading-block border-bottom-0 bottommargin-sm">
            <div class="badge rounded-pill badge-default"><?php echo e($title); ?></div>
            <h2 class="nott ls0"><?php echo nl2br($brief); ?></h2>
          </div>
          <p><?php echo nl2br($content); ?></p>

          <div class="pricing-tenure-switcher d-flex align-items-center mb-4 position-relative"
            data-container="#pricing-switch">
            <span class="pts-left fw-bold text-muted">Website mẫu</span>
            <div class="pts-switcher mx-3">
              <div class="switch">
                <input id="switch-toggle-pricing-tenure" class="switch-toggle switch-toggle-round" type="checkbox">
                <label for="switch-toggle-pricing-tenure" class="mb-0"></label>
              </div>
            </div>
            <span class="pts-right fw-bold text-muted">Thiết kế mới</span>
            <div class="price-discount"></div>
          </div>
        </div>

        <div class="col-lg-8">
          <div id="section-pricing" class="page-section p-0 m-0">
            <div id="pricing-switch" class="pricing row align-items-end g-0 col-mb-50 mb-4">

              <div class="col-md-6">

                <div class="pricing-box pts-switch-content-left">
                  <div class="pricing-title">
                    <img class="mb-2 bg-transparent rounded-0"
                      src="<?php echo e(asset('themes/frontend/fhmvn/demos/seo/images/icons/content_marketing.svg')); ?>"
                      alt="Gói Basic" width="60">
                    <h2>GÓI BASIC</h2>
                  </div>
                  <div class="pricing-price">
                    <span class="price-unit">₫</span>
                    <span class="price-number">3.000.000</span>
                    <span class="price-tenure">Chọn giao diện mẫu có sẵn</span>
                  </div>
                  <div class="pricing-features border-0 bg-transparent">
                    <ul>
                      <li class="text-black-50">
                        <i class="icon-minus-circle me-2"></i>
                        <del style="opacity: .5"><strong>Tặng tên miền</strong> .com, .net</del>
                      </li>
                      <li class="text-black-50">
                        <i class="icon-minus-circle me-2"></i>
                        <del style="opacity: .5"><strong>Tùy chỉnh giao diện:</strong> bố cục</del>
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Chỉnh sửa màu sắc</strong>
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Tặng: 02 banner</strong>
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Tặng Hosting: 02 Gb</strong>
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Bảo mật SSL/HTTPS</strong> Miễn phí
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Hướng dẫn quản trị</strong> Tài liệu
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Hỗ trợ đăng nội dung</strong> 15 bài viết/sản phẩm
                      </li>
                      <li class="text-black-50">
                        <i class="icon-minus-circle me-2"></i>
                        <del style="opacity: .5"><strong>Bàn giao Source Code</strong> Mã nguồn</del>
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Bảo hành website trọn đời</strong>
                      </li>
                    </ul>
                  </div>
                  <div class="pricing-action">
                    <div class="">
                      <a href="#form-order"
                        class="button button-border button-rounded button-fill button-blue w-100 m-0 ls0 text-uppercase">
                        <span><?php echo app('translator')->get('Register'); ?></span>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="pricing-box pts-switch-content-right">
                  <div class="pricing-title">
                    <img class="mb-2 bg-transparent rounded-0"
                      src="<?php echo e(asset('themes/frontend/fhmvn/demos/seo/images/icons/content_marketing.svg')); ?>"
                      alt="Gói Basic" width="60">
                    <h2>GÓI STANDARD</h2>
                  </div>
                  <div class="pricing-price">
                    <span class="price-unit">₫</span>
                    <span class="price-number">6.000.000</span>
                    <span class="price-tenure">Thiết kế giao diện cơ bản theo yêu cầu</span>
                  </div>
                  <div class="pricing-features border-0 bg-transparent">
                    <ul>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Tặng tên miền</strong> .com, .net
                      </li>
                      <li class="text-black-50">
                        <i class="icon-minus-circle me-2"></i>
                        <del style="opacity: .5"><strong>Chỉnh sửa lại thiết kế giao diện</strong></del>
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Tặng: 02 banner</strong>
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Tặng Hosting: 02 Gb</strong>
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Bảo mật SSL/HTTPS</strong> Miễn phí
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Hướng dẫn quản trị</strong> Tài liệu & Hỗ trợ trực tiếp
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Hỗ trợ đăng nội dung</strong> 15 bài viết/sản phẩm
                      </li>
                      <li class="text-black-50">
                        <i class="icon-minus-circle me-2"></i>
                        <del style="opacity: .5"><strong>Bàn giao Source Code</strong> Mã nguồn</del>
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Bảo hành website trọn đời</strong>
                      </li>
                    </ul>
                  </div>
                  <div class="pricing-action">
                    <div class="">
                      <a href="#form-order"
                        class="button button-border button-rounded button-fill button-blue w-100 m-0 ls0 text-uppercase">
                        <span><?php echo app('translator')->get('Register'); ?></span>
                      </a>
                    </div>
                  </div>
                </div>

              </div>

              <div class="col-md-6">

                <div class="pricing-box pts-switch-content-left bg-info">
                  <div class="pricing-title">
                    <img class="mb-2 bg-transparent rounded-0"
                      src="<?php echo e(asset('themes/frontend/fhmvn/demos/seo/images/icons/result.svg')); ?>" alt="Pricing Icon"
                      width="60">
                    <h2>GÓI PRO</h2>
                    <span>Nổi bật</span>
                  </div>
                  <div class="pricing-price">
                    <span class="price-unit">₫</span>
                    <span class="price-number">4.500.000</span>
                    <span class="price-tenure">Chọn giao diện mẫu và tùy chỉnh màu sắc, bố cục</span>
                  </div>
                  <div class="pricing-features border-0 bg-transparent">
                    <ul>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Tặng tên miền</strong> .com, .net
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Tùy chỉnh:</strong> sắp xếp trang chủ và màu sắc
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Tặng: 02 banner</strong>
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Tặng: 01 logo dạng chữ cơ bản</strong>
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Tặng Hosting: 05 Gb</strong>
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Bảo mật SSL/HTTPS</strong> Miễn phí
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Hướng dẫn quản trị</strong> Tài liệu
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Hỗ trợ đăng nội dung</strong> 25 bài viết/sản phẩm
                      </li>
                      <li class="text-black-50">
                        <i class="icon-minus-circle me-2"></i>
                        <del style="opacity: .5"><strong>Bàn giao Source Code</strong> Mã nguồn</del>
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Bảo hành website trọn đời</strong>
                      </li>
                    </ul>
                  </div>
                  <div class="pricing-action">
                    <div class="">
                      <a href="#form-order"
                        class="button button-border button-rounded button-fill button-yellow w-100 m-0 ls0 text-uppercase">
                        <span><?php echo app('translator')->get('Register'); ?></span>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="pricing-box pts-switch-content-right bg-warning">
                  <div class="pricing-title">
                    <img class="mb-2 bg-transparent rounded-0"
                      src="<?php echo e(asset('themes/frontend/fhmvn/demos/seo/images/icons/result.svg')); ?>" alt="Pricing Icon"
                      width="60">
                    <h2>GÓI ENTERPRISE</h2>
                    <span>Được sử dụng nhiều nhất</span>
                  </div>
                  <div class="pricing-price">
                    <span class="price-unit">₫</span>
                    <span class="price-number">9.000.000</span>
                    <span class="price-tenure">Thiết kế một bộ giao diện độc quyền & Tính năng theo yêu
                      cầu</span>
                  </div>
                  <div class="pricing-features border-0 bg-transparent">
                    <ul>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Tặng tên miền</strong> .com, .net
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Chỉnh sửa lại thiết kế giao diện</strong> 02 lần
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Tặng: 03 banner</strong>
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Tặng: 01 logo dạng chữ cơ bản</strong>
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Tặng Hosting: 05 Gb</strong>
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Bảo mật SSL/HTTPS</strong> Miễn phí
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Hướng dẫn quản trị</strong> Tài liệu & Hỗ trợ trực tiếp
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Hỗ trợ đăng nội dung</strong> 25 bài viết/sản phẩm
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Bàn giao Source Code</strong> Mã nguồn
                      </li>
                      <li>
                        <i class="icon-check-circle color me-2"></i>
                        <strong>Bảo hành website trọn đời</strong>
                      </li>
                    </ul>
                  </div>
                  <div class="pricing-action">
                    <div class="">
                      <a href="#form-order"
                        class="button button-border button-rounded button-fill button-red w-100 m-0 ls0 text-uppercase">
                        <span><?php echo app('translator')->get('Register'); ?></span>
                      </a>
                    </div>
                  </div>
                </div>

              </div>

            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH D:\project\kon10ted\resources\views/frontend/blocks/custom/styles/package.blade.php ENDPATH**/ ?>