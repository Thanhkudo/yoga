<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $background = $block->image_background != '' ? $block->image_background : url('assets/img/banner.jpg');
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
    
  ?>
  <style>
    #services img.img-service {
      width: 200px;
      height: 200px;
    }
  </style>
  <section class="section bg-white mt-0 mb-0 pb-0 border-top" id="services">
    <div class="container clearfix">
      <div class="heading-block border-bottom-0 center mx-auto mb-0" style="max-width: 550px">
        <div class="badge rounded-pill badge-default"><?php echo e($title); ?></div>
        <h2 class="nott ls0 mb-3 text-uppercase"><?php echo e($brief); ?></h2>
        <p><?php echo e($content); ?></p>
      </div>
      <div class="row">
        <?php if(isset($block_childs)): ?>
          <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
              $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
              $image_sub = $item->image != '' ? $item->image : null;
              $url_link = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
            ?>
            <div class="col-md-4 mt-5">
              <div class="feature-box fbox-center border-0">
                <div class="mb-5">
                  <a href="<?php echo e($url_link); ?>"><img src="<?php echo e($image_sub); ?>" alt="<?php echo e($title_sub); ?>"
                      class="bg-transparent rounded-0 img-service"></a>
                </div>
                <div class="fbox-content">
                  <h3 class="nott ls0 text-uppercase"><?php echo e($title_sub); ?></h3>
                  <p>
                    <?php echo nl2br($brief_sub); ?>

                  </p>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
    </div>
  </section>
<?php endif; ?>
<?php /**PATH D:\project\fhmvn\resources\views/frontend/blocks/cms_service/styles/default.blade.php ENDPATH**/ ?>