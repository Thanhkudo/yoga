<?php if($paginator->hasPages()): ?>

  <ul class="page-pagination">
    
    <?php if($paginator->onFirstPage()): ?>
      <li class="disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
        <span class="prev page-numbers">
          <i class="far fa-angle-double-left"></i>
        </span>
      </li>
    <?php else: ?>
      <li>
        <a class="prev page-numbers" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev"
          aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
          <i class="far fa-angle-double-left"></i>
        </a>
      </li>
    <?php endif; ?>

    
    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      
      <?php if(is_string($element)): ?>
        <li><a class="page-numbers"><?php echo e($element); ?></a></li>
      <?php endif; ?>

      
      <?php if(is_array($element)): ?>
        <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($page == $paginator->currentPage()): ?>
            <li><span class="page-numbers current"><?php echo e($page); ?></span>
            </li>
          <?php else: ?>
            <li><a class="page-numbers" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
            </li>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    <?php if($paginator->hasMorePages()): ?>
      <li>
        <a class="next page-numbers" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next"
          aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
          <i class="far fa-angle-double-right"></i>
        </a>
      </li>
    <?php else: ?>
      <li class="disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
        <span class="next page-numbers">
          <i class="far fa-angle-double-right"></i>
        </span>
      </li>
    <?php endif; ?>
  </ul>
<?php endif; ?>
<?php /**PATH D:\project\kon10ted\resources\views/frontend/pagination/default.blade.php ENDPATH**/ ?>