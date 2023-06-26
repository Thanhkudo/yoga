<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : '';
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>
  <section class="about-us" id="about-us" style="background-color: #FFFFFF;">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 info">
          <div class="about-info">
            <h3><?php echo e($title); ?></h3>
            <h4><?php echo e($brief); ?></h4>
            <p>
              <?php echo nl2br($content); ?></p>
            <?php if($block_childs): ?>
              <div class="about-progress">
                <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                    $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                    $image_sub = $item->image != '' ? $item->image : null;
                  ?>

                  <div class="progress-container">
                    <span class="percent" style="left: calc(<?php echo e($brief_sub); ?>% - 21px)"><?php echo e($brief_sub); ?>%</span>
                    <h4><?php echo e($title_sub); ?></h4>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo e($brief_sub); ?>" aria-valuemin="0"
                        aria-valuemax="100">
                      </div>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>

            <?php endif; ?>
            <?php if($url_link != ''): ?>
              <a href="<?php echo e($url_link); ?>" class="main-btn">
                <span><?php echo e($url_link_title); ?></span>
              </a>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-lg-6 image">
          <div class="about-image">
            <div class="about-bg"><i class="flaticon-lotus"></i></div>
            <img class="img-fluid" src="<?php echo e($image); ?>" alt="<?php echo e($title_sub); ?>" />
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
<?php /**PATH D:\project\qlady\resources\views/frontend/blocks/custom/styles/our_skill.blade.php ENDPATH**/ ?>