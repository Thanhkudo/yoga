<!DOCTYPE html>
<html lang="<?php echo e($locale ?? 'vi'); ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <style>
    .container h1 {
      font-weight: 300;
      margin-top: 0;
      font-size: 24px;
    }
  </style>

  <?php echo $__env->yieldContent('style'); ?>

</head>

<body style="background:#fff;font-family:'Roboto';">
  <div class="container" style="max-width:80%;margin:auto;background:#FBFBFB;padding:20px">
    <?php echo $__env->yieldContent('content'); ?>
  </div>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\barber\resources\views/frontend/layouts/email.blade.php ENDPATH**/ ?>