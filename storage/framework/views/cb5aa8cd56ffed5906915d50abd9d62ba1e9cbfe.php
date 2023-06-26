
<!DOCTYPE html>
<html lang="<?php echo e($locale ?? 'vi'); ?>">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?php echo e($seo_title ?? ($page->title ?? ($web_information->information->seo_title ?? ''))); ?>

  </title>
  <link rel="icon" href="<?php echo e($web_information->image->favicon ?? ''); ?>" type="image/x-icon">
  
  <?php
    $seo_title = $seo_title ?? ($page->title ?? ($web_information->information->seo_title ?? ''));
    $seo_keyword = $seo_keyword ?? ($page->keyword ?? ($web_information->information->seo_keyword ?? ''));
    $seo_description = $seo_description ?? ($page->description ?? ($web_information->information->seo_description ?? ''));
    $seo_image = $seo_image ?? ($page->json_params->og_image ?? ($web_information->image->seo_og_image ?? ''));
  ?>
  <meta name="description" content="<?php echo e($seo_description); ?>" />
  <meta name="keywords" content="<?php echo e($seo_keyword); ?>" />
  <meta name="news_keywords" content="<?php echo e($seo_keyword); ?>" />
  <meta property="og:image" content="<?php echo e($seo_image); ?>" />
  <meta property="og:title" content="<?php echo e($seo_title); ?>" />
  <meta property="og:description" content="<?php echo e($seo_description); ?>" />
  <meta property="og:url" content="<?php echo e(Request::fullUrl()); ?>" />

  <meta name="copyright" content="<?php echo e($web_information->information->site_name ?? ''); ?>" />
  <meta name="author" content="<?php echo e($web_information->information->site_name ?? ''); ?>" />
  <meta name="robots" content="index,follow" />

  
  
  <?php echo $__env->make('frontend.panels.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
  <?php echo $__env->yieldPushContent('style'); ?>
  <style>
    .side-push-panel.side-panel-open.stretched.device-lg .slider-inner, .side-push-panel.side-panel-open.stretched.device-xl .slider-inner,
    .side-push-panel.side-panel-open-signup.stretched.device-lg .slider-inner, .side-push-panel.side-panel-open-signup.stretched.device-xl .slider-inner
     {
    left: 0px;
    }
body.side-push-panel.side-panel-open.stretched #wrapper, body.side-push-panel.side-panel-open.stretched #header.sticky-header .container,
body.side-push-panel.side-panel-open-signup.stretched #wrapper, body.side-push-panel.side-panel-open-signup.stretched #header.sticky-header .container{
    right: 0px;
}
  </style>
  <?php echo $__env->yieldPushContent('schema'); ?>
</head>

<body class="stretched side-push-panel">
  <div id="wrapper" class="clearfix">

    <?php echo $__env->make('frontend.blocks.header.styles.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php if(isset($blocks_selected)): ?>
      <?php $__currentLoopData = $blocks_selected; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(\View::exists('frontend.blocks.' . $block->block_code . '.index')): ?>
          <?php echo $__env->make('frontend.blocks.' . $block->block_code . '.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
          <?php echo e('View: frontend.blocks.' . $block->block_code . '.index do not exists!'); ?>

        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php echo $__env->make('frontend.blocks.footer.styles.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="side-panel">
		<div id="side-panel-trigger-close" class="side-panel-trigger"><a href="#"><i class="icon-line-cross"></i></a></div>

		<div class="side-panel-wrap">
			<div class="widget clearfix">

				<h4 class="fw-normal">Đăng nhập bằng</h4>

				<a href="#" class="button button-rounded fw-normal w-100 center si-colored ms-0 si-facebook">Facebook</a>
				<a href="#" class="button button-rounded fw-normal w-100 center si-colored ms-0 si-gplus">Google</a>

				<div class="line"></div>

				<h4 class="fw-normal">Tài khoản của bạn</h4>

				<form id="" name="row mb-0" class="mb-0" action="<?php echo e(route('frontend.login.post')); ?>" method="post">
                    <?php echo csrf_field(); ?>
					<div class="col-12 form-group">
						<label for="login-form-username" class="fw-normal">Email:</label>
						<input type="email" id="login-form-username" name="email" value="" required class="form-control" />
					</div>

					<div class="col-12 form-group">
						<label for="login-form-password" class="fw-normal">Mật khẩu:</label>
						<input type="password" id="login-form-password" name="password" value="" required class="form-control" />
					</div>

					<div class="col-12 form-group">
						<button class="button button-rounded fw-normal m-0" type="submit" id="login-form-submit">Đăng nhập</button>
						
					</div>

				</form>

			</div>
		</div>
	</div>
    <div id="side-panel-signup">
		<div id="side-panel-trigger-close" class="side-panel-trigger2"><a href="#"><i class="icon-line-cross"></i></a></div>
		<div class="side-panel-wrap">
			<div class="widget clearfix">

				<h4 class="fw-normal">Đăng ký tài khoản</h4>

				<form id="signup_form" name="row mb-0" class="mb-0" action="<?php echo e(route('frontend.signup.post')); ?>" method="post">
                    <?php echo csrf_field(); ?>
					<div class="col-12 form-group">
						<label for="signup-form-email" class="fw-normal">Email:</label>
						<input type="email" id="signup-form-email" name="email" required value="" class="form-control" />
					</div>

                    <div class="col-12 form-group">
						<label for="signup-form-username" class="fw-normal">Tên:</label>
						<input type="text" id="signup-form-username" name="name" required value="" class="form-control" />
					</div>

                    <div class="col-12 form-group">
						<label for="signup-form-phone" class="fw-normal">Số ĐT:</label>
						<input type="text" id="signup-form-phone" name="phone" required value="" class="form-control" />
					</div>

					<div class="col-12 form-group">
						<label for="signup-form-password" class="fw-normal">Mật khẩu:</label>
						<input type="password" id="signup-form-password" name="password" required value="" class="form-control" />
					</div>

					<div class="col-12 form-group">
						<button class="button button-rounded fw-normal m-0" type="submit" id="login-form-signup">Đăng ký</button>
					</div>
                    <div class="col-sm-12 hidden" id="signup_result">
                        <div class="alert alert-warning" role="alert">
                          Processing...
                        </div>
                      </div>

				</form>

			</div>
		</div>
	</div>
  </div>
  
  <?php echo $__env->make('frontend.components.sticky.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
  <?php echo $__env->make('frontend.panels.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
  <?php echo $__env->yieldPushContent('script'); ?>
  
  <?php echo $__env->make('frontend.components.sticky.contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  
  <?php echo $__env->make('frontend.components.popup.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\raovat\resources\views/frontend/layouts/default.blade.php ENDPATH**/ ?>