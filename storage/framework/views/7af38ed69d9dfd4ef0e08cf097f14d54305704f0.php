

<?php $__env->startSection('title'); ?>
  <?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo e($module_name); ?>

      <a class="btn btn-sm btn-warning pull-right" href="<?php echo e(route(Request::segment(2) . '.create')); ?>">
        <i class="fa fa-plus"></i> <?php echo app('translator')->get('Add'); ?>
      </a>
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
            <a class="btn btn-success btn-sm pull-right" href="<?php echo e(route(Request::segment(2) . '.index')); ?>">
              <i class="fa fa-bars"></i>
              <?php echo app('translator')->get('List'); ?>
            </a>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
              <!-- form start -->
              <form role="form" action="<?php echo e(route(Request::segment(2) . '.update', $detail->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Title'); ?> <small class="text-red">*</small></label>
                      <input type="text" class="form-control" name="name" placeholder="<?php echo app('translator')->get('Title'); ?>"
                        value="<?php echo e($detail->name); ?>" required>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Menu type'); ?> <small class="text-red">*</small></label>
                      <select name="menu_type" id="menu_type" class="form-control select2">
                        <option value=""><?php echo app('translator')->get('please_chosen'); ?></option>
                        <?php $__currentLoopData = App\Consts::MENU_TYPE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($key); ?>" <?php echo e($detail->menu_type == $value ? 'selected' : ''); ?>>
                            <?php echo app('translator')->get($value); ?>
                          </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Status'); ?></label>
                      <div class="form-control">
                        <?php $__currentLoopData = App\Consts::STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <label>
                            <input type="radio" name="status" value="<?php echo e($value); ?>"
                              <?php echo e($detail->status == $value ? 'checked' : ''); ?>>
                            <small class="mr-15"><?php echo e(__($value)); ?></small>
                          </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Order'); ?></label>
                      <input type="number" class="form-control" name="iorder" placeholder="<?php echo app('translator')->get('Order'); ?>"
                        value="<?php echo e($detail->iorder); ?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Description'); ?></label>
                      <textarea name="description" id="description" class="form-control" rows="3"><?php echo e($detail->description); ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-sm">
                      <i class="fa fa-floppy-o"></i>
                      <?php echo app('translator')->get('Save'); ?>
                    </button>
                  </div>
                </div>
              </form>
              <div class="row">
                <div class="col-md-12">
                  <hr style="border-top: dashed 2px #a94442; margin: 10px 0px;">
                </div>
                <div class="col-md-6">
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">
                        <?php echo app('translator')->get('Menu structure'); ?>
                      </h3>
                    </div>
                    <div class="box-body">
                      <div class="table-responsive">
                        <div class="dd" id="menu-sort">
                          <ol class="dd-list">
                            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($item->parent_id == $detail->id): ?>
                                <li class="dd-item" data-id="<?php echo e($item->id); ?>">
                                  <div class="dd-handle ">
                                    <?php echo e($item->name); ?>

                                    <span class="dd-nodrag pull-right">
                                      <small>(<?php echo app('translator')->get($item->status); ?>)</small>
                                      <a data-id="<?php echo e($item->id); ?>" class="edit_menu cursor"
                                        title="<?php echo app('translator')->get('Edit'); ?>">
                                        <i class="fa fa-edit fa-edit"></i>
                                      </a>
                                      <a data-id="<?php echo e($item->id); ?>" class="remove_menu cursor text-danger"
                                        title="<?php echo app('translator')->get('Delete'); ?>">
                                        <i class="fa fa-trash fa-edit"></i>
                                      </a>
                                    </span>
                                  </div>
                                  <?php if($item->sub > 0): ?>
                                    <ol class="dd-list">
                                      <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sub_1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item_sub_1->parent_id == $item->id): ?>
                                          <li class="dd-item" data-id="<?php echo e($item_sub_1->id); ?>">
                                            <div class="dd-handle ">
                                              <?php echo e($item_sub_1->name); ?>

                                              <span class="dd-nodrag pull-right">
                                                <small>(<?php echo app('translator')->get($item_sub_1->status); ?>)</small>
                                                <a data-id="<?php echo e($item_sub_1->id); ?>" class="edit_menu cursor"
                                                  title="<?php echo app('translator')->get('Edit'); ?>">
                                                  <i class="fa fa-edit fa-edit"></i>
                                                </a>
                                                <a data-id="<?php echo e($item_sub_1->id); ?>"
                                                  class="remove_menu cursor text-danger" title="<?php echo app('translator')->get('Delete'); ?>">
                                                  <i class="fa fa-trash fa-edit"></i>
                                                </a>
                                              </span>
                                            </div>
                                            <?php if($item_sub_1->sub > 0): ?>
                                              <ol class="dd-list">
                                                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sub_2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <?php if($item_sub_2->parent_id == $item_sub_1->id): ?>
                                                    <li class="dd-item" data-id="<?php echo e($item_sub_2->id); ?>">
                                                      <div class="dd-handle">
                                                        <?php echo e($item_sub_2->name); ?>

                                                        <span class="dd-nodrag pull-right">
                                                          <small>(<?php echo app('translator')->get($item_sub_2->status); ?>)</small>
                                                          <a data-id="<?php echo e($item_sub_2->id); ?>" class="edit_menu cursor"
                                                            title="<?php echo app('translator')->get('Edit'); ?>">
                                                            <i class="fa fa-edit fa-edit"></i>
                                                          </a>
                                                          <a data-id="<?php echo e($item_sub_2->id); ?>"
                                                            class="remove_menu cursor text-danger"
                                                            title="<?php echo app('translator')->get('Delete'); ?>">
                                                            <i class="fa fa-trash fa-edit"></i>
                                                          </a>
                                                        </span>
                                                      </div>
                                                    </li>
                                                  <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                              </ol>
                                            <?php endif; ?>
                                          </li>
                                        <?php endif; ?>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ol>
                                  <?php endif; ?>
                                </li>
                              <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </ol>
                        </div>
                      </div>
                    </div>
                    <div class="box-footer">
                      <a class="btn btn-warning btn-flat menu-sort-save btn-sm" title="<?php echo app('translator')->get('Save'); ?>">
                        <i class="fa fa-floppy-o"></i>
                        <?php echo app('translator')->get('Save sort'); ?>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box box-primary">
                    <form action="<?php echo e(route(Request::segment(2) . '.store')); ?>" method="POST" class="form-horizontal"
                      id="form-main" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('POST'); ?>
                      <div class="box-header with-border">
                        <h3 class="box-title" id="link-title">
                          <?php echo app('translator')->get('Add new link to menu'); ?>
                        </h3>
                      </div>
                      <div class="box-body">
                        <div class="form-group">
                          <label for="link-parent_id" class="col-sm-3 control-label"><?php echo app('translator')->get('Parent menu'); ?></label>
                          <div class="col-sm-9">
                            <select name="parent_id" id="link-parent_id" class="form-control select2" autocomplete="off">
                              <option value="<?php echo e($detail->id); ?>">== <?php echo app('translator')->get('ROOT'); ?> ==</option>
                              <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->parent_id == $detail->id): ?>
                                  <option value="<?php echo e($item->id); ?>">- - <?php echo e($item->name); ?></option>
                                  <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($item->id == $sub->parent_id): ?>
                                      <option value="<?php echo e($sub->id); ?>">- - - - <?php echo e($sub->name); ?></option>
                                      <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($sub->id == $sub_child->parent_id): ?>
                                          <option value="<?php echo e($sub_child->id); ?>">- - - - - -<?php echo e($sub_child->name); ?>

                                          </option>
                                        <?php endif; ?>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="link-name" class="col-sm-3 control-label">
                            <?php echo app('translator')->get('Title'); ?>
                            <small class="text-red">*</small>
                          </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="link-name" placeholder="<?php echo app('translator')->get('Title'); ?>"
                              name="name" required autocomplete="off">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="link-url_link" class="col-sm-3 control-label">
                            <?php echo app('translator')->get('Url'); ?>
                            <small class="text-red">*</small>
                          </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="link-url_link" placeholder="<?php echo app('translator')->get('Url'); ?>"
                              name="url_link" required autocomplete="off">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="link-target" class="col-sm-3 control-label">
                            <?php echo app('translator')->get('Select target'); ?>
                          </label>
                          <div class="col-sm-9">
                            <select name="json_params[target]" id="link-target" class="form-control select2" autocomplete="off">
                              <option value="_self" selected><?php echo app('translator')->get('_self'); ?></option>
                              <option value="_blank"><?php echo app('translator')->get('_blank'); ?></option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="link-status" class="col-sm-3 control-label">
                            <?php echo app('translator')->get('Status'); ?>
                          </label>
                          <div class="col-sm-9">
                            <div class="form-control">
                              <?php $__currentLoopData = App\Consts::STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label>
                                  <input type="radio" name="status" value="<?php echo e($value); ?>"
                                    <?php echo e($loop->index == 0 ? 'checked' : ''); ?>>
                                  <small class="mr-15"><?php echo e(__($value)); ?></small>
                                </label>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="box-footer">
                        <button type="submit" class="btn btn-success btn-sm submit_form">
                          <?php echo app('translator')->get('Add new'); ?>
                        </button>
                        <button type="button" class="btn btn-default btn-sm pull-right reset_form">
                          <?php echo app('translator')->get('Reset form'); ?>
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="box-footer">

        </div>

      </div>
  </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('themes/admin/plugins/nestable/jquery.nestable.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script src="<?php echo e(asset('themes/admin/plugins/nestable/jquery.nestable.min.js')); ?>"></script>
  <script type="text/javascript">
    $('#menu-sort').nestable();
    $('.menu-sort-save').click(function() {
      $('#loading').show();
      let serialize = $('#menu-sort').nestable('serialize');
      let menu = JSON.stringify(serialize);
      $.ajax({
          url: '<?php echo e(route('menus.update_sort')); ?>',
          type: 'POST',
          dataType: 'json',
          data: {
            _token: '<?php echo e(csrf_token()); ?>',
            menu: menu,
            root_id: <?php echo e($detail->id); ?>

          },
        })
        .done(function(data) {
          $('#loading').hide();
          if (data.error == 0) {
            location.reload();
          } else {
            alert(data.msg);
            location.reload();
          }
        });
    });

    $('.remove_menu').click(function() {
      if (confirm("<?php echo app('translator')->get('confirm_action'); ?>")) {
        let _root = $(this).closest('.dd-item');
        let id = $(this).data('id');
        $.ajax({
          method: 'post',
          url: '<?php echo e(route('menus.delete')); ?>',
          data: {
            id: id,
            _token: '<?php echo e(csrf_token()); ?>',
          },
          success: function(data) {
            if (data.error == 1) {
              alert(data.msg);
            } else {
              _root.remove();
            }
          }
        });
      }
    });

    var menus = <?php echo json_encode($menus ?? [], 15, 512) ?>;
    $('.edit_menu').click(function() {
      $('.dd-handle').removeClass('active-item');
      let _root = $(this).closest('.dd-handle');
      let _form = $('#form-main');
      let id = $(this).data('id');
      let item = menus.find(menu => menu.id === id);
      if (!$.isEmptyObject(item)) {
        _form.find('#link-title').text("<?php echo e(__('Edit link for menu')); ?>");
        _form.find('.submit_form').text("<?php echo __('Save & update'); ?>");
        _form.find('#link-parent_id').val(item.parent_id)
        _form.find('#link-name').val(item.name);
        _form.find('#link-url_link').val(item.url_link);
        if (item.json_params) {
          _form.find('#link-target').val(item.json_params.target || '_self');
        }
        _form.find('input[name=status][value=' + item.status + ']').prop('checked', true);
        _form.attr('action', '<?php echo e(route(Request::segment(2) . '.index')); ?>/' + item.id);
        _form.find('input[name=_method]').val('PUT');
        _form.find('input[name=_token]').val('<?php echo e(csrf_token()); ?>');
      }
      $(".select2").select2();
      _root.addClass('active-item');
    });

    $('.reset_form').click(function() {
      $('.dd-handle').removeClass('active-item');
      let _form = $('#form-main');
      _form.find('#link-title').text("<?php echo e(__('Add new link to menu')); ?>");
      _form.find('.submit_form').text("<?php echo __('Add new'); ?>");
      _form.find('#link-parent_id').val(<?php echo e($detail->id); ?>)
      _form.find('#link-name').val('');
      _form.find('#link-url_link').val('');
      _form.find('#link-target').val('_self');
      _form.find('input[name=status][value=active]').prop('checked', true);
      _form.attr('action', '<?php echo e(route(Request::segment(2) . '.store')); ?>');
      _form.find('input[name=_method]').val('POST');
      _form.find('input[name=_token]').val('<?php echo e(csrf_token()); ?>');
      $(".select2").select2();
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\kon10ted\resources\views/admin/pages/menus/edit.blade.php ENDPATH**/ ?>