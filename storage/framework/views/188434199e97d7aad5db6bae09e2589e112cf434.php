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
  <div class="section bg-transparent">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mb-5">
          <div class="badge badge-default"><?php echo e($title); ?></div>
          <h2 class="fw-bold ls0 mb-3 display-4">
            <?php echo e($brief); ?>

          </h2>
        </div>
      </div>
      <div id="oc-team" class="owl-carousel team-carousel bottommargin carousel-widget owl-loaded owl-drag"
        data-margin="30" data-pagi="false" data-items-sm="2" data-items-md="2" data-items-xl="4">
        <div class="owl-stage-outer">
          <div class="owl-stage">
            <?php if($block_childs): ?>
              <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $title_child = $item->json_params->title->{$locale} ?? $item->title;
                  $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                  $content_child = $item->json_params->content->{$locale} ?? $item->content;
                  $image_child = $item->image != '' ? $item->image : null;
                  $url_link = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
                  $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                  $icon = $item->icon != '' ? $item->icon : '';
                  $style = $item->json_params->style ?? '';
                ?>
                <div class="owl-item">
                  <div class="oc-item">
                    <div class="team">
                      <div class="team-image">
                        <img src="<?php echo e($image_child); ?>" alt="<?php echo e($title_child); ?>" />
                      </div>
                      <div class="team-desc">
                        <div class="team-title">
                          <h4><?php echo e($title_child); ?></h4>
                          <span><?php echo e($brief_child); ?></span>
                        </div>
                        <a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
                          <i class="icon-facebook"></i>
                          <i class="icon-facebook"></i>
                        </a>
                        <a href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
                          <i class="icon-twitter"></i>
                          <i class="icon-twitter"></i>
                        </a>
                        <a href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
                          <i class="icon-gplus"></i>
                          <i class="icon-gplus"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </div>

<?php endif; ?>
<?php /**PATH D:\project\it\resources\views/frontend/blocks/custom/styles/about_team.blade.php ENDPATH**/ ?>