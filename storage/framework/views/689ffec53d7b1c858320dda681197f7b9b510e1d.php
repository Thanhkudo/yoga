

<?php $__env->startSection('content'); ?>
  <h1><?php echo app('translator')->get('You received a new order from the system'); ?></h1>

  <p><?php echo app('translator')->get('Content Order'); ?>: </p>

  <p>
    <strong><?php echo app('translator')->get('Fullname'); ?></strong>: <?php echo e($order->name); ?>

  </p>
  <p>
    <strong><?php echo app('translator')->get('Email'); ?></strong>: <?php echo e($order->email); ?>

  </p>
  <p>
    <strong><?php echo app('translator')->get('Phone'); ?></strong>: <?php echo e($order->phone); ?>

  </p>
  <p>
    <strong><?php echo app('translator')->get('Content note'); ?></strong>: <?php echo e($order->customer_note); ?>

  </p>
  <p>
    <strong><?php echo app('translator')->get('Order detail'); ?></strong>:
    <a href="<?php echo e(route('order_products.show', $order->id)); ?>">
      <?php echo app('translator')->get('View detail'); ?>
    </a>
  </p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.email', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\barber\resources\views/frontend/emails/order.blade.php ENDPATH**/ ?>