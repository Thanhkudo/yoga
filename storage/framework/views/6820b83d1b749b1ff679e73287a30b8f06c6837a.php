<?php if($paginator->hasPages()): ?>

    <nav class="clearfix relative nav_pagi w_100 ">
        <ul class="pagination pagination-rounded pagination-lg">
            
            <?php if($paginator->onFirstPage()): ?>
                <li class="page-item disabled">
                    <a class="page-link">
                        <i class="fas fa-angle-left"></i>
                    </a>
                </li>
            <?php else: ?>
                <li class="page-item ">
                    <a class="page-link" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev">
                        <i class="fas fa-angle-left"></i>
                    </a>
                </li>
            <?php endif; ?>

            
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <?php if(is_string($element)): ?>
                    <li class="page-item active disabled"><a class="page-link"><?php echo e($element); ?></a></li>
                <?php endif; ?>

                
                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $paginator->currentPage()): ?>
                            <li class="page-item active disabled"><a class="page-link"><?php echo e($page); ?></a>
                            </li>
                        <?php else: ?>
                            <li class="page-item "><a class="page-link"
                                    href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <?php if($paginator->hasMorePages()): ?>
                <li class="page-item ">
                    <a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next"
                        aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
                        <i class="fas fa-angle-right"></i>
                    </a>
                </li>
            <?php else: ?>
                <li class="page-item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
                    <a class="page-link">
                        <i class="fas fa-angle-right"></i>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\yoga\resources\views/frontend/pagination/default.blade.php ENDPATH**/ ?>