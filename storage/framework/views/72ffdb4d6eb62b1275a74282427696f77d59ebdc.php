

<?php
  $page_title = $taxonomy->title ?? ($page->title ?? ($page->name ?? ''));
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
?>
<?php $__env->startPush('style'); ?>
  <style>
    .fluid-width-video-wrapper {
      height: 100%;
    }

    .selectpicker {
      height: 100%;
      width: 80%;
      margin-left: 10px;
      padding: 0 10px;
    }

    label {
      min-width: 100px;
    }

    .button {
      background-color: var(--pri-color);
      border: 1px solid transparent;
      transition: all ease 0.2s;
      height: 100%;
      width: 100%;
      text-align: center;
    }

    .button:hover {
      background-color: #fff;
      color: var(--pri-color);
      border: 1px solid var(--pri-color);
    }

    .branch-list {
      max-height: 510px;
      overflow-y: scroll;
    }

    .branch-list::-webkit-scrollbar {
      width: 5px;
      background-color: transparent;
    }

    .branch-list::-webkit-scrollbar-thumb {
      background-color: var(--pri-color);
    }

    .branch-item {
      transition: all ease 0.2s;
      cursor: pointer;
    }

    .branch-item:hover {
      background-color: rgb(235, 235, 235);
    }

    .branch-item p {
      margin-bottom: 10px;
    }

    /* START EMBED MAP */

    .mapouter {
      position: relative;
      text-align: right;
      width: 100%;
      height: 510px;
    }

    .gmap_canvas {
      overflow: hidden;
      background: none !important;
      width: 100%;
      height: 510px;
    }

    .gmap_iframe {
      height: 510px !important;
    }

    iframe {
      height: 100%;
    }
  </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
  
  <section id="page-title" class="page-title-parallax page-title-center page-title d-none"
    style="background-image: url('<?php echo e($image_background); ?>'); background-size: cover; padding: 120px 0;"
    data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">
    <div id="particles-line"></div>

    <div class="container clearfix mt-4">
      <h1><?php echo e($page_title); ?></h1>
    </div>
  </section>

  <section id="content">
    <div class="content-wrap">
      <div class="container">
        <!-- START FILTER -->
        <div class="row mb-5">
          <div class="col-lg-12 bottommargin-sm">
            <div class="white-section">
              <form class="mb-0" method="post" action="<?php echo e(route('frontend.branch')); ?>">
                <?php echo csrf_field(); ?>
                <div class="row col-mb-30">
                  <div class="col-lg-5 d-flex align-items-center">
                    <label class="mb-0">Thành phố:</label>
                    <select name="city" id="city" class="selectpicker">
                      <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                      <?php $__currentLoopData = App\Region::DATA; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($item['id']); ?>"
                          <?php echo e(isset($params['city']) && $params['city'] == $item['id'] ? 'selected' : ''); ?>>
                          <?php echo e(__($item['name'])); ?> </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                  <div class="col-lg-5 d-flex align-items-center">
                    <?php
                      $city = $params['city'] ?? null;
                      $districts = collect(App\Region::DATA);
                      $district = $districts->first(function ($item, $key) use ($city) {
                          return $item['id'] == $city;
                      });
                    ?>
                    <label class="mb-0">Quận/Huyện:</label>
                    <select name="district" id="district" class="selectpicker">
                      <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                      <?php if(isset($district)): ?>
                        <?php $__currentLoopData = $district['district']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($item['id']); ?>"
                            <?php echo e(isset($params['district']) && $params['district'] == $item['id'] ? 'selected' : ''); ?>>
                            <?php echo e(__($item['name'])); ?>

                          </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </select>
                  </div>
                  <div class="col-lg-2">
                    <button type="submit" class="button my-0">Tìm kiếm</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row g-0 border">
          <div class="col-lg-4 col-md-12 branch-list">
            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div data-map='<?php echo $item->map; ?>' class="branch-item p-3 border-bottom branch-address">
                <h4 class="text-uppercase mb-3">
                  <?php echo $item->name; ?>

                </h4>
                <p><i class="icon-realestate-map pe-3"></i><?php echo $item->address; ?></p>
                <p><i class="icon-line-phone pe-3"></i><?php echo $item->phone; ?></p>
                <p><i class="icon-fax pe-3"></i><?php echo $item->fax; ?></p>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </div>
          <div class="col-lg-8 col-md-12">
            <div class="mapouter">
              <div class="gmap_canvas">
                <?php echo $web_information->source_code->map ?? ''; ?>

              </div>
            </div>
          </div>
        </div>
        <!-- END FILTER -->
      </div>
    </div>
  </section>

  
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
  <script>
    const dataMaps = document.querySelectorAll(".branch-address");
    const map = document.querySelector(".gmap_canvas");
    let attr;

    dataMaps.forEach((dataMap) => {
      dataMap.addEventListener("click", () => {
        map.innerHTML = dataMap.getAttributeNode("data-map").value;
      });
    });

    // Change to filter
    $(document).ready(function() {
      // Routes get all
      var regions = <?php echo json_encode(App\Region::DATA ?? [], 15, 512) ?>;
      $(document).on('change', '#city', function() {
        let _value = parseInt($(this).val());
        let _targetHTML = $('#district');
        let _list = filterArray(regions, 'id', _value);
        let _optionList = '<option value=""><?php echo app('translator')->get('Please select'); ?></option>';
        if (_list) {
          _list.forEach(element => {
            element.district.forEach(item => {
              _optionList += '<option value="' + item.id + '"> ' + item.name + ' </option>';
            });
          });
          _targetHTML.html(_optionList);
        }
        $(".select2").select2();
      });

    });
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\thaiever\resources\views/frontend/pages/branch/index.blade.php ENDPATH**/ ?>