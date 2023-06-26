

<?php $__env->startSection('title'); ?>
  <?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo e($module_name); ?>

    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <?php if(session('errorMessage')): ?>
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo e(session('errorMessage')); ?>

      </div>
    <?php endif; ?>
    <?php if(session('successMessage')): ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo e(session('successMessage')); ?>

      </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <p><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>
    <?php endif; ?>

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo app('translator')->get('Service booking detail'); ?></h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="<?php echo e(route(Request::segment(2) . '.update', $detail->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="box-body">

          <div class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-3 text-right text-bold"><?php echo app('translator')->get('Fullname'); ?>:</label>
              <label class="col-sm-9 col-xs-12"><?php echo e($detail->name ?? ''); ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-3 text-right text-bold"><?php echo app('translator')->get('Email'); ?>:</label>
              <label class="col-sm-9 col-xs-12">
                <?php echo e($detail->email ?? ''); ?>

              </label>
            </div>
            <div class="form-group">
              <label class="col-sm-3 text-right text-bold"><?php echo app('translator')->get('Phone'); ?>:</label>
              <label class="col-sm-9 col-xs-12">
                <?php echo e($detail->phone ?? ''); ?>

              </label>
            </div>
            <div class="form-group">
              <label class="col-sm-3 text-right text-bold"><?php echo app('translator')->get('Booking service'); ?>:</label>
              <label class="col-sm-9 col-xs-12">
                <a target="_blank" href="<?php echo e($detail->post_link); ?>" data-toggle="tooltip" title="<?php echo app('translator')->get('view'); ?>"
                  data-original-title="<?php echo app('translator')->get('view'); ?>">
                  <?php echo e($detail->post_title); ?>

                  <i class="fa fa-external-link"></i>
                </a>
              </label>
            </div>
            <div class="form-group">
              <label class="col-sm-3 text-right text-bold"><?php echo app('translator')->get('Price'); ?>:</label>
              <label class="col-sm-9 col-xs-12 text-bold text-danger"><?php echo e(number_format($detail->price)); ?></label>
            </div>
            <div class="form-group">
              <label class="col-sm-3 text-right text-bold"><?php echo app('translator')->get('Content note'); ?>:</label>
              <label class="col-sm-9 col-xs-12"><?php echo e($detail->customer_note ?? ''); ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-3 text-right text-bold"><?php echo app('translator')->get('Status'); ?>:</label>
              <div class="col-sm-6 col-xs-12 ">
                <?php $__currentLoopData = App\Consts::ORDER_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <label>
                    <input type="radio" name="status" value="<?php echo e($key); ?>"
                      <?php echo e($detail->status == $key ? 'checked' : ''); ?>>
                    <small class="mr-15"><?php echo e(__($value)); ?></small>
                  </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <p class="text-warning">
                  Đơn này sẽ được đóng sau khi chuyển sang trạng thái <?php echo app('translator')->get(App\Consts::ORDER_STATUS['processed']); ?>
                </p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 text-right text-bold"><?php echo app('translator')->get('Admin note'); ?>:</label>
              <div class="col-md-6 col-xs-12">
                <textarea name="admin_note" class="form-control" rows="5"><?php echo e($detail->admin_note ?? old('admin_note')); ?></textarea>
              </div>
            </div>
            <?php if(isset($customer)): ?>
              <div class="form-group">
                <label class="col-sm-3 text-right text-bold">
                  <?php echo app('translator')->get('Total money available'); ?>:
                </label>
                <label class="col-sm-9 col-xs-12 text-bold text-success">
                  <?php echo e(number_format($customer->total_money)); ?>

                </label>
              </div>

              <?php if($detail->total_money <= $customer->total_money): ?>
                <div class="form-group">
                  <label class="col-sm-3 text-right text-bold">
                    <?php echo app('translator')->get('Payment method'); ?>:
                  </label>
                  <div class="col-sm-9 col-xs-12">
                    <?php $__currentLoopData = App\Consts::PAYMENT_METHOD; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <label>
                        <input type="radio" name="json_params[payment_method]" value="<?php echo e($key); ?>"
                          <?php echo e(isset($detail->json_params->payment_method) && $detail->json_params->payment_method == $key ? 'checked' : ''); ?>>
                        <small class="mr-15"><?php echo e(__($value)); ?></small>
                      </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              <?php endif; ?>
            <?php endif; ?>
          </div>

        </div>

        <div class="box-footer">
          <a class="btn btn-success btn-sm" href="<?php echo e(route(Request::segment(2) . '.index')); ?>">
            <i class="fa fa-bars"></i> <?php echo app('translator')->get('List'); ?>
          </a>
          <button type="submit" class="btn btn-primary pull-right btn-sm">
            <i class="fa fa-floppy-o"></i>
            <?php echo app('translator')->get('Save'); ?>
          </button>
        </div>
      </form>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\fhmvn\resources\views/admin/pages/orders/order_service_show.blade.php ENDPATH**/ ?>