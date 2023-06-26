

<?php $__env->startSection('title'); ?>
  <?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo e($module_name); ?>

      <a class="btn btn-sm btn-warning pull-right" href="<?php echo e(route(Request::segment(2) . '.create')); ?>"><i
          class="fa fa-plus"></i> <?php echo app('translator')->get('Add'); ?></a>
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
        <h3 class="box-title"><?php echo app('translator')->get('Update form'); ?></h3>
      </div>
      <!-- form start -->
      <form role="form" action="<?php echo e(route(Request::segment(2) . '.update', $detail->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="box-body">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active">
                <a href="#tab_1" data-toggle="tab">
                  <h5>
                    <?php echo app('translator')->get('General information'); ?>
                    <span class="text-danger">*</span>
                  </h5>
                </a>
              </li>
              <button type="submit" class="btn btn-primary btn-sm pull-right">
                <i class="fa fa-floppy-o"></i>
                <?php echo app('translator')->get('Save'); ?>
              </button>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Name'); ?></label>
                      <small class="text-red">*</small>
                      <input type="text" class="form-control" name="name" placeholder="<?php echo app('translator')->get('Name'); ?>"
                        value="<?php echo e($detail->name ?? old('name')); ?>" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Address'); ?></label>
                      <input type="text" class="form-control" name="address" placeholder="<?php echo app('translator')->get('Address'); ?>"
                        value="<?php echo e($detail->address ?? old('address')); ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Phone'); ?></label>
                      <input type="text" class="form-control" name="phone" placeholder="<?php echo app('translator')->get('Phone'); ?>"
                        value="<?php echo e($detail->phone ?? old('phone')); ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Fax'); ?></label>
                      <input type="text" class="form-control" name="fax" placeholder="<?php echo app('translator')->get('Fax'); ?>"
                        value="<?php echo e($detail->fax ?? old('fax')); ?>">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('City/Province'); ?></label>
                      <select name="city" id="city" class="form-control select2" style="width:100%"
                        autocomplete="off">
                        <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                        <?php $__currentLoopData = App\Region::DATA; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($item['id']); ?>" <?php echo e($detail->city == $item['id'] ? 'selected' : ''); ?>>
                            <?php echo e(__($item['name'])); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <?php
                      $city = $detail->city;
                      $districts = collect(App\Region::DATA);
                      $district = $districts->first(function ($item, $key) use ($city) {
                          return $item['id'] == $city;
                      });
                    ?>

                    <div class="form-group">
                      <label><?php echo app('translator')->get('District'); ?></label>
                      <select name="district" id="district" class="form-control select2" style="width:100%">
                        <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                        <?php if(isset($district)): ?>
                          <?php $__currentLoopData = $district['district']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item['id']); ?>" <?php echo e($detail->district == $item['id'] ? 'selected' : ''); ?>>
                              <?php echo e(__($item['name'])); ?>

                            </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Mã nhúng bản đồ'); ?></label>
                      <textarea type="text" class="form-control" rows="10" name="map" placeholder="<?php echo app('translator')->get('Mã nhúng bản đồ thẻ <iframe>'); ?>"><?php echo e($detail->map ?? old('map')); ?></textarea>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="box-footer">
          <a class="btn btn-sm btn-success" href="<?php echo e(route(Request::segment(2) . '.index')); ?>">
            <i class="fa fa-bars"></i>
            <?php echo app('translator')->get('List'); ?>
          </a>
          <button type="submit" class="btn btn-primary btn-sm pull-right">
            <i class="fa fa-floppy-o"></i>
            <?php echo app('translator')->get('Save'); ?>
          </button>
        </div>
      </form>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\thaiever\resources\views/admin/pages/branchs/edit.blade.php ENDPATH**/ ?>