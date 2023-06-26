<?php $__env->startSection('content'); ?>
    <h1>Xác thực tài khoản</h1>
  <p>Vui lòng click

    <a href="<?php echo e(route('frontend.signup.active', ['id'=>$user->id,'code'=>$user->email_verification_code])); ?>">vào đây</a>

      để xác thực tài khoản của bạn</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.email', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fhmagency/domains/fhmagency.vn/public_html/bds/resources/views/frontend/emails/signup.blade.php ENDPATH**/ ?>