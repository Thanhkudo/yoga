

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
      <!-- /.box-header -->
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
                  <h5>Thông tin chính <span class="text-danger">*</span></h5>
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
                      <label><?php echo app('translator')->get('Service category'); ?> <small class="text-red">*</small></label>
                      <select name="taxonomy_id" id="taxonomy_id" class="form-control select2" style="width:100%">
                        <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                        <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($item->parent_id == 0 || $item->parent_id == null): ?>
                            <option value="<?php echo e($item->id); ?>"
                              <?php echo e($detail->taxonomy_id == $item->id ? 'selected' : ''); ?>><?php echo e($item->title); ?></option>

                            <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($item->id == $sub->parent_id): ?>
                                <option value="<?php echo e($sub->id); ?>"
                                  <?php echo e($detail->taxonomy_id == $sub->id ? 'selected' : ''); ?>>- - <?php echo e($sub->title); ?>

                                </option>

                                <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php if($sub->id == $sub_child->parent_id): ?>
                                    <option value="<?php echo e($sub_child->id); ?>"
                                      <?php echo e($detail->taxonomy_id == $sub_child->id ? 'selected' : ''); ?>>- - - -
                                      <?php echo e($sub_child->title); ?></option>
                                  <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>

                    </div>

                    <div class="form-group">
                      <label><?php echo app('translator')->get('Title'); ?> <small class="text-red">*</small></label>
                      <input type="text" class="form-control" name="title" placeholder="<?php echo app('translator')->get('Title'); ?>"
                        value="<?php echo e($detail->title); ?>" required>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-xs-6">
                          <label><?php echo app('translator')->get('Price'); ?></label>
                          <input type="text" class="form-control" name="json_params[price]"
                            placeholder="<?php echo app('translator')->get('Price'); ?>"
                            value="<?php echo e($detail->json_params->price ?? old('json_params[price]')); ?>">
                        </div>
                        <div class="col-xs-6">
                          <label><?php echo app('translator')->get('Price Curreny'); ?></label>
                          <input type="text" class="form-control" name="json_params[price_currency]"
                            placeholder="<?php echo app('translator')->get('Price Curreny'); ?>"
                            value="<?php echo e($detail->json_params->price_currency ?? old('json_params[price_currency]')); ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Image'); ?></label>
                      <div class="input-group">
                        <span class="input-group-btn">
                          <a data-input="image" data-preview="image-holder" class="btn btn-primary lfm"
                            data-type="cms-image">
                            <i class="fa fa-picture-o"></i> <?php echo app('translator')->get('choose'); ?>
                          </a>
                        </span>
                        <input id="image" class="form-control" type="text" name="image"
                          placeholder="<?php echo app('translator')->get('image_link'); ?>..." value="<?php echo e($detail->image); ?>">
                      </div>
                      <div id="image-holder" style="margin-top:15px;max-height:100px;">
                        <?php if($detail->image != ''): ?>
                          <img style="height: 5rem;" src="<?php echo e($detail->image); ?>">
                        <?php endif; ?>
                      </div>
                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">
                      <label><?php echo app('translator')->get('Is featured'); ?></label>
                      <div class="form-control">
                        <label>
                          <input type="radio" name="is_featured" value="1"
                            <?php echo e($detail->is_featured == '1' ? 'checked' : ''); ?>>
                          <small><?php echo app('translator')->get('true'); ?></small>
                        </label>
                        <label>
                          <input type="radio" name="is_featured" value="0" class="ml-15"
                            <?php echo e($detail->is_featured == '0' ? 'checked' : ''); ?>>
                          <small><?php echo app('translator')->get('false'); ?></small>
                        </label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label><?php echo app('translator')->get('Order'); ?></label>
                      <input type="number" class="form-control" name="iorder" placeholder="<?php echo app('translator')->get('Order'); ?>"
                        value="<?php echo e($detail->iorder); ?>">
                    </div>
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Status'); ?></label>
                      <div class="form-control">
                        <label>
                          <input type="radio" name="status" value="active"
                            <?php echo e($detail->status == 'active' ? 'checked' : ''); ?>>
                          <small><?php echo app('translator')->get('active'); ?></small>
                        </label>
                        <label>
                          <input type="radio" name="status" value="deactive"
                            <?php echo e($detail->status == 'deactive' ? 'checked' : ''); ?> class="ml-15">
                          <small><?php echo app('translator')->get('deactive'); ?></small>
                        </label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label><?php echo app('translator')->get('Image thumb'); ?></label>
                      <div class="input-group">
                        <span class="input-group-btn">
                          <a data-input="image_thumb" data-preview="image_thumb-holder" class="btn btn-primary lfm"
                            data-type="cms-image">
                            <i class="fa fa-picture-o"></i> <?php echo app('translator')->get('choose'); ?>
                          </a>
                        </span>
                        <input id="image_thumb" class="form-control" type="text" name="image_thumb"
                          placeholder="<?php echo app('translator')->get('image_link'); ?>..." value="<?php echo e($detail->image_thumb); ?>">
                      </div>
                      <div id="image_thumb-holder" style="margin-top:15px;max-height:100px;">
                        <?php if($detail->image_thumb != ''): ?>
                          <img style="height: 5rem;" src="<?php echo e($detail->image_thumb); ?>">
                        <?php endif; ?>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-12">
                    <hr style="border-top: dashed 2px #a94442; margin: 10px 0px;">
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Description'); ?></label>
                      <textarea name="json_params[brief][vi]" class="form-control" rows="5"><?php echo e(isset($detail->json_params->brief->vi) ? $detail->json_params->brief->vi : old('json_params[brief][vi]')); ?></textarea>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-group">
                        <label><?php echo app('translator')->get('Content'); ?></label>
                        <textarea name="json_params[content][vi]" class="form-control" id="content_vi"><?php echo e(isset($detail->json_params->content->vi) ? $detail->json_params->content->vi : old('json_params[content][vi]')); ?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <hr style="border-top: dashed 2px #a94442; margin: 10px 0px;">
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('seo_title'); ?></label>
                      <input name="json_params[seo_title]" class="form-control"
                        value="<?php echo e($detail->json_params->seo_title ?? old('json_params[seo_title]')); ?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('seo_keyword'); ?></label>
                      <input name="json_params[seo_keyword]" class="form-control"
                        value="<?php echo e($detail->json_params->seo_keyword ?? old('json_params[seo_keyword]')); ?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('seo_description'); ?></label>
                      <input name="json_params[seo_description]" class="form-control"
                        value="<?php echo e($detail->json_params->seo_description ?? old('json_params[seo_description]')); ?>">
                    </div>
                  </div>
                </div>

              </div>

            </div><!-- /.tab-content -->
          </div><!-- nav-tabs-custom -->

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <a class="btn btn-success btn-sm" href="<?php echo e(route(Request::segment(2) . '.index')); ?>">
            <i class="fa fa-bars"></i> <?php echo app('translator')->get('List'); ?>
          </a>
          <button type="submit" class="btn btn-primary pull-right btn-sm"><i class="fa fa-floppy-o"></i>
            <?php echo app('translator')->get('Save'); ?></button>
        </div>
      </form>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script>
    CKEDITOR.replace('content_vi', ck_options);
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\fhmvn\resources\views/admin/pages/cms_services/edit.blade.php ENDPATH**/ ?>