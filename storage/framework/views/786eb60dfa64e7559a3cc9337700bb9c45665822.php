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
    $items = [];
    $i = 0;
    foreach ($block_childs as $item) {
        $items[$i] = $item;
        $i++;
    }
  ?>
  <style>
    .about-us-experience-wrapper {
      right: -75px;
    }
  </style>
  <section class="section bg-white mb-0">
    <div class="container">
      <div class="row align-items-center flex-row-reverse">
        <div class="col-lg-6 about-us-text-container">
          <div class="badge badge-default text-md-start"><?php echo e($title); ?></div>
          <h2 class="display-5 fw-bold text-uppercase">
            <?php echo $items[1]->title ?? ''; ?>

          </h2>
          <h4>
            <?php echo $items[1]->brief ?? ''; ?>

          </h4>
          <p>
            <?php echo $items[1]->content ?? ''; ?>

          </p>
          <div class="row">
            <div class="col-6 d-flex align-items-center fw-bold">
              <i class="icon-line-menu m-2"></i>CORE LEVE DESIGN
            </div>
            <div class="col-6 d-flex align-items-center fw-bold">
              <i class="icon-line-menu m-2"></i>CORE LEVE DESIGN
            </div>
            <div class="col-6 d-flex align-items-center fw-bold">
              <i class="icon-line-menu m-2"></i>CORE LEVE DESIGN
            </div>
            <div class="col-6 d-flex align-items-center fw-bold">
              <i class="icon-line-menu m-2"></i>CORE LEVE DESIGN
            </div>
          </div>
          <?php if($items[1]->url_link != ''): ?>
            <a href="<?php echo e($items[1]->url_link); ?>" class="button button-large text-center mt-4 button-custom"
              style="width: fit-content; color: #000; border-color: #f1f1f1">
              <?php echo e($items[1]->url_link_title); ?>

            </a>
          <?php endif; ?>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-5 mt-4 mt-lg-0 justify-content-center d-flex" style="position: relative">
          <div class="about-us-experience-wrapper">
            <div class="about-us-experience-container">
              <h2 class="display-4 mb-0 fw-bold"><?php echo $items[0]->brief ?? ''; ?></h2>
              <p class="mb-0 fw-bold"><?php echo $items[0]->title ?? ''; ?></p>
            </div>
          </div>
          <img src="<?php echo e($items[0]->image ?? ''); ?>" alt="Image" style="width: 100%" />
        </div>
      </div>
    </div>


  </section>

<?php endif; ?>
<?php /**PATH D:\project\it\resources\views/frontend/blocks/custom/styles/about_us.blade.php ENDPATH**/ ?>