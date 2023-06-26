
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('themes/admin/plugins/nestable/jquery.nestable.min.css')); ?>">
    <style>
        .dd{
          max-width: 100%;
        }
        .mt-10{
          margin-top: 10px;
        }
        .dd-empty,
        .dd-item,
        .dd-placeholder {
            margin: 10px 0;
        }

        .dd-item>button {
            height: 30px;
        }

        .form-group .select2-container {
            width: 100% !important;
        }

        .form-control {
            height: auto;
        }

        .box-body {
            border: 1px solid #ddd;
            margin-bottom: 10px;
        }

        .box-body .form-horizontal .form-group {
            margin: 0px
        }

        .dd-item .item-details {
            position: relative;
            border-bottom: 1px solid #ccc;
            border-left: 1px solid #ccc;
            border-right: 1px solid #ccc;
            margin-bottom: 5px;
            margin-top: 0px;
            padding: 10px 15px;
        }

        .dd3-content {
            background-color: #fff;
            border: 0;
            height: 40px;
            padding: 10px;
            width: 100%;
        }

        .dd3-handle {
            background: transparent;
            border: 1px solid #aaa;
            border-radius: 0;
            cursor: move;
            height: 40px;
            left: 0;
            margin: 0;
            overflow: hidden;
            position: absolute;
            text-indent: 100%;
            top: 0;
            white-space: nowrap;
            width: 100%;
        }

        .dd3-handle:hover {
            background-color: transparent;
        }

        .dd3-content>span.text.float-end,
        .dd3-content>span.text.float-start {
            display: inline-block;
            overflow: hidden;
            text-overflow: ellipsis;
            -ms-text-overflow: ellipsis;
            white-space: nowrap;
        }

        .dd3-content>span.text.float-start {
            max-width: 200px;
        }

        .float-start {
            float: left !important;
        }

        .dd3-content .show-item-details {
            background-color: #ccc;
            border-left: 1px solid #aaa;
            color: #000;
            right: 0px;
            ;
            line-height: 38px;
            position: absolute;
            text-align: center;
            top: 1px;
            width: 43px;
        }

        .widget-menu .widget.meta-boxes>a {
            text-decoration: none !important;
        }

        .widget {
            background: #ffffff;
            clear: both;
            margin-bottom: 10px;
        }

        .meta-boxes {
            margin-top: 10px;
        }

        .widget.meta-boxes:first-child {
            margin-top: 0;
        }

        .widget-title {
            cursor: move;
            overflow: hidden;
            background: #ebeae8;
            height: 44px;
            line-height: 34px;
            border-bottom: 1px solid #ffffff;
            color: #1f64a0 !important;
        }

        .widget-menu .meta-boxes .narrow-icon {
            float: right;
            margin-right: 0;
            margin-top: 12px;
        }

        .widget-menu .widget.meta-boxes .collapsed h4.widget-title .narrow-icon:before {
            content: "\f107";
        }

        .meta-boxes .widget-title {
            cursor: pointer;
            overflow: hidden;
            height: 40px;
            border: 1px solid #aaa;
            padding: 0 10px;
            background: none;
            display: flex;
            align-items: center;
            justify-content: space-between
        }

        .widget-menu .widget.meta-boxes .widget-title {
            cursor: pointer;
            font-size: 14px;
            font-weight: 400;
            height: 40px;
            line-height: 40px;
            padding: 0 15px;
        }

        .widget-body {
            padding: 15px 15px;
            border-radius: 0 0 3px 3px;
            min-height: 200px;
        }

        .widget-menu .widget.meta-boxes .widget-body {
            min-height: 130px;
        }

        .box-links-for-menu .list-item {
            border: 1px solid #ddd;
            max-height: 200px;
            overflow: auto;
            padding: 15px;
        }

        .mCSB_container {
            padding: 10px;
        }

        .box-links-for-menu .list-item li {
            list-style: none;
            margin-bottom: 5px;
            position: relative;
        }

        .box-links-for-menu .list-item li label {
            max-width: 80%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        input[type=checkbox] {
            cursor: pointer;
            margin: 0 0.5rem 0 0;
            position: relative;
            top: 0;
        }

        .box-links-for-menu .list-item li label input {
            margin-left: 5px;
        }

        input[type=checkbox]:before {
            border-color: #58b3f0;
            border-style: none none solid solid;
            border-width: 2px;
            content: "";
            height: 5px;
            left: 2px;
            margin: auto;
            position: absolute;
            right: 0;
            top: 0.2em;
            transform: rotate(-45deg) scale(0);
            transition: transform .4s cubic-bezier(.45, 1.8, .5, .75);
            width: 10px;
            z-index: 1;
        }

        input[type=checkbox]:after {
            background: #fff;
            border: 1px solid #c4cdd5;
            border-radius: 3px;
            bottom: 0;
            content: "";
            cursor: pointer;
            height: 16px;
            left: -1px;
            margin: auto;
            position: absolute;
            right: 0;
            top: 0;
            width: 16px;
        }

        input[type=checkbox]:checked:before {
            transform: rotate(-45deg) scale(1);
        }

        input[type=checkbox]:checked:after {
            border-color: #58b3f0;
        }

        .float-end {
            float: right !important;
        }

        .dd3-content>span.text.float-end,
        .dd3-content>span.text.float-start {
            display: inline-block;
            overflow: hidden;
            text-overflow: ellipsis;
            -ms-text-overflow: ellipsis;
            white-space: nowrap;
        }

        .dd3-content>span.text.float-end {
            margin-right: 40px;
            max-width: 100px;
        }
    </style>
<?php $__env->stopSection(); ?>
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
      <form class="form-block" role="form" action="<?php echo e(route(Request::segment(2) . '.update', $detail->id)); ?>" method="POST">
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
                      <label><?php echo app('translator')->get('Parent element'); ?></label>
                      <select name="parent_id" id="parent_id" class="form-control select2" style="width: 100%">
                        <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                        <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($item->parent_id == 0 || $item->parent_id == null): ?>
                            <option value="<?php echo e($item->id); ?>" <?php echo e($detail->parent_id == $item->id ? 'selected' : ''); ?>>
                              <?php echo e($item->title); ?></option>

                            <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($item->id == $sub->parent_id): ?>
                                <option value="<?php echo e($sub->id); ?>"
                                  <?php echo e($detail->parent_id == $sub->id ? 'selected' : ''); ?>>- -
                                  <?php echo e($sub->title); ?></option>

                                <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php if($sub->id == $sub_child->parent_id): ?>
                                    <option value="<?php echo e($sub_child->id); ?>"
                                      <?php echo e($detail->parent_id == $sub_child->id ? 'selected' : ''); ?>>
                                      - - - - <?php echo e($sub_child->title); ?></option>
                                  <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
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
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>
                        <?php echo app('translator')->get('Title'); ?>
                        <small class="text-red">*</small>
                      </label>
                      <input type="text" class="form-control" name="title" placeholder="<?php echo app('translator')->get('Title'); ?>"
                        value="<?php echo e(old('title') ?? $detail->title); ?>" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>
                        <?php echo app('translator')->get('Block type'); ?>
                        <small class="text-red">*</small>
                      </label>
                      <select name="block_code" id="block_code" class="form-control select2" style="width: 100%" required>
                        <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                        <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($item->block_code); ?>"
                            <?php echo e($item->block_code == $detail->block_code ? 'selected' : ''); ?>><?php echo e($item->name); ?>

                          </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Layout'); ?></label>
                      <select name="json_params[layout]" id="block_layout" class="form-control select2"
                        style="width: 100%">
                        <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                        <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($item->block_code == $detail->block_code): ?>
                            <?php
                              $json_params = json_decode($item->json_params);
                            ?>
                            <?php if(isset($json_params->layout)): ?>
                              <?php $__currentLoopData = $json_params->layout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value); ?>"
                                  <?php echo e(isset($detail->json_params->layout) && $value == $detail->json_params->layout ? 'selected' : ''); ?>>
                                  <?php echo e(__($value)); ?>

                                </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Style'); ?></label>
                      <select name="json_params[style]" id="block_style" class="form-control select2" style="width: 100%">
                        <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                        <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($item->block_code == $detail->block_code): ?>
                            <?php
                              $json_params = json_decode($item->json_params);
                            ?>
                            <?php if(isset($json_params->style)): ?>
                              <?php $__currentLoopData = $json_params->style; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value); ?>"
                                  <?php echo e(isset($detail->json_params->style) && $value == $detail->json_params->style ? 'selected' : ''); ?>>
                                  <?php echo e(__($value)); ?>

                                </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Brief'); ?></label>
                      <textarea name="brief" id="brief" class="form-control" rows="5"><?php echo e(old('brief') ?? $detail->brief); ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Content'); ?></label>
                      <textarea name="content" id="content" class="form-control" rows="5"><?php echo e(old('content') ?? $detail->content); ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Url redirect'); ?></label>
                      <input type="text" class="form-control" name="url_link" placeholder="<?php echo app('translator')->get('Url redirect'); ?>"
                        value="<?php echo e(old('url_link') ?? $detail->url_link); ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Url redirect title'); ?></label>
                      <input type="text" class="form-control" name="url_link_title"
                        placeholder="<?php echo app('translator')->get('Url redirect title'); ?>"
                        value="<?php echo e(old('url_link_title') ?? $detail->url_link_title); ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Order'); ?></label>
                      <input type="number" class="form-control" name="iorder" placeholder="<?php echo app('translator')->get('Order'); ?>"
                        value="<?php echo e(old('iorder') ?? $detail->iorder); ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Icon'); ?></label>
                      <input type="text" class="form-control" name="icon" placeholder="Ex: fa fa-folder"
                        value="<?php echo e(old('icon') ?? $detail->icon); ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Image'); ?></label>
                      <div class="input-group">
                        <span class="input-group-btn">
                          <a data-input="image" data-preview="image-holder" class="btn btn-primary lfm"
                            data-type="cms-image">
                            <i class="fa fa-picture-o"></i> <?php echo app('translator')->get('Select'); ?>
                          </a>
                        </span>
                        <input id="image" class="form-control" type="text" name="image"
                          placeholder="<?php echo app('translator')->get('Image source'); ?>" value="<?php echo e($detail->image); ?>">
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
                      <label><?php echo app('translator')->get('Background image'); ?></label>
                      <div class="input-group">
                        <span class="input-group-btn">
                          <a data-input="image_background" data-preview="image_background-holder" data-type="cms-image"
                            class="btn btn-primary lfm">
                            <i class="fa fa-picture-o"></i> <?php echo app('translator')->get('Select'); ?>
                          </a>
                        </span>
                        <input id="image_background" class="form-control" type="text" name="image_background"
                          placeholder="<?php echo app('translator')->get('Image source'); ?>" value="<?php echo e($detail->image_background); ?>">
                      </div>
                      <div id="image_background-holder" style="margin-top:15px;max-height:100px;">
                        <?php if($detail->image_background != ''): ?>
                          <img style="height: 5rem;" src="<?php echo e($detail->image_background); ?>">
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="box-footer">
          <a class="btn btn-success btn-sm" href="<?php echo e(route(Request::segment(2) . '.index')); ?>">
            <i class="fa fa-bars"></i> <?php echo app('translator')->get('List'); ?>
          </a>
          <button type="submit" class="btn btn-primary pull-right btn-sm"><i class="fa fa-floppy-o"></i>
            <?php echo app('translator')->get('Save'); ?></button>
        </div>
      </form>
    </div>
    <?php if(isset($child) && count($child)>0): ?>
    <div class="row">
      <div class="col-md-12">
          <hr style="border-top: dashed 2px #a94442; margin: 10px 0px;">
      </div>
      <div class="col-md-12 mt-10">
        <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title">
                  <?php echo app('translator')->get('Block structure'); ?>
              </h3>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <div class="dd" id="menu-sort">
                <ol class="dd-list">
                  <?php $__currentLoopData = $child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="dd-item dd3-item "
                        data-id="<?php echo e($item->id); ?>">
                        <div class="dd-handle dd3-handle"></div>
                        <div class="dd3-content">
                            <span class="text float-start"
                                data-update="title"><?php echo e($item->title); ?></span>
                            <span
                                class="text float-end"><?php echo app('translator')->get($status[$item->status]); ?></span>
                            <a data-toggle="collapse"
                                href="#item-details-<?php echo e($item->id); ?>"
                                role="button" aria-expanded="false"
                                aria-controls="item-details-<?php echo e($item->id); ?>"
                                class="show-item-details">
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                         
                        <div class="item-details collapse multi-collapse form-block"
                            id="item-details-<?php echo e($item->id); ?>">
                            <form role="form"
                                action="<?php echo e(route(Request::segment(2) . '.update', $item->id)); ?>"
                                method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="box-body">
                                  <div class="nav-tabs-custom">
                                    <div class="tab-content">
                                      <div class="tab-pane active" id="tab_1">
                                        <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label><?php echo app('translator')->get('Parent element'); ?></label>
                                              <select name="parent_id" id="parent_id" class="form-control select2" style="width: 100%">
                                                <option value=""><?php echo app('translator')->get('Please select'); ?></option>

                                                <?php $__currentLoopData = $parents_child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <?php if($item_child->parent_id == 0 || $item_child->parent_id == null): ?>
                                                  <?php
                                                  if($item_child->id==$item->id) continue;
                                                  ?>
                                                    <option value="<?php echo e($item_child->id); ?>" <?php echo e($item->parent_id == $item_child->id ? 'selected' : ''); ?>>
                                                      <?php echo e($item_child->title); ?></option>

                                                    <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      <?php if($item_child->id == $sub->parent_id): ?>
                                                      <?php
                                                      if($sub->id==$item->id) continue;
                                                      ?>
                                                        <option value="<?php echo e($sub->id); ?>"
                                                          <?php echo e($item->parent_id == $sub->id ? 'selected' : ''); ?>>- -
                                                          <?php echo e($sub->title); ?></option>

                                                        <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                          <?php if($sub->id == $sub_child->parent_id): ?>
                                                           <?php
                                                          if($sub_child->id==$item->id) continue;
                                                          ?>
                                                            <option value="<?php echo e($sub_child->id); ?>"
                                                              <?php echo e($item->parent_id == $sub_child->id ? 'selected' : ''); ?>>
                                                              - - - - <?php echo e($sub_child->title); ?></option>
                                                          <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                      <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                  <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label><?php echo app('translator')->get('Status'); ?></label>
                                              <div class="form-control">
                                                <?php $__currentLoopData = App\Consts::STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <label>
                                                    <input type="radio" name="status" value="<?php echo e($value); ?>"
                                                      <?php echo e($item->status == $value ? 'checked' : ''); ?>>
                                                    <small class="mr-15"><?php echo e(__($value)); ?></small>
                                                  </label>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label>
                                                <?php echo app('translator')->get('Title'); ?>
                                                <small class="text-red">*</small>
                                              </label>
                                              <input type="text" class="form-control" name="title" placeholder="<?php echo app('translator')->get('Title'); ?>"
                                                value="<?php echo e(old('title') ?? $item->title); ?>" required>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label>
                                                <?php echo app('translator')->get('Block type'); ?>
                                                <small class="text-red">*</small>
                                              </label>
                                              <select name="block_code" id="block_code" class="form-control select2" style="width: 100%" required>
                                                <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                                                <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <option value="<?php echo e($block->block_code); ?>"
                                                    <?php echo e($block->block_code == $item->block_code ? 'selected' : ''); ?>><?php echo e($block->name); ?>

                                                  </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label><?php echo app('translator')->get('Layout'); ?></label>
                                              <select name="json_params[layout]" id="block_layout" class="form-control select2"
                                                style="width: 100%">
                                                <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                                                <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <?php if($block->block_code == $item->block_code): ?>
                                                    <?php
                                                      $json_params = json_decode($block->json_params);
                                                    ?>
                                                    <?php if(isset($json_params->layout)): ?>
                                                      <?php $__currentLoopData = $json_params->layout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($value); ?>"
                                                          <?php echo e(isset($item->json_params->layout) && $value == $item->json_params->layout ? 'selected' : ''); ?>>
                                                          <?php echo e(__($value)); ?>

                                                        </option>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                  <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label><?php echo app('translator')->get('Style'); ?></label>
                                              <select name="json_params[style]" id="block_style" class="form-control select2" style="width: 100%">
                                                <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                                                <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <?php if($block->block_code == $detail->block_code): ?>
                                                    <?php
                                                      $json_params = json_decode($block->json_params);
                                                    ?>
                                                    <?php if(isset($json_params->style)): ?>
                                                      <?php $__currentLoopData = $json_params->style; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($value); ?>"
                                                          <?php echo e(isset($item->json_params->style) && $value == $item->json_params->style ? 'selected' : ''); ?>>
                                                          <?php echo e(__($value)); ?>

                                                        </option>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                  <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                              </select>
                                            </div>
                                          </div>

                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label><?php echo app('translator')->get('Brief'); ?></label>
                                              <textarea name="brief" id="brief" class="form-control" rows="5"><?php echo e(old('brief') ?? $item->brief); ?></textarea>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label><?php echo app('translator')->get('Content'); ?></label>
                                              <textarea name="content" id="content" class="form-control" rows="5"><?php echo e(old('content') ?? $item->content); ?></textarea>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label><?php echo app('translator')->get('Url redirect'); ?></label>
                                              <input type="text" class="form-control" name="url_link" placeholder="<?php echo app('translator')->get('Url redirect'); ?>"
                                                value="<?php echo e(old('url_link') ?? $item->url_link); ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label><?php echo app('translator')->get('Url redirect title'); ?></label>
                                              <input type="text" class="form-control" name="url_link_title"
                                                placeholder="<?php echo app('translator')->get('Url redirect title'); ?>"
                                                value="<?php echo e(old('url_link_title') ?? $item->url_link_title); ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label><?php echo app('translator')->get('Order'); ?></label>
                                              <input type="number" class="form-control" name="iorder" placeholder="<?php echo app('translator')->get('Order'); ?>"
                                                value="<?php echo e(old('iorder') ?? $item->iorder); ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label><?php echo app('translator')->get('Icon'); ?></label>
                                              <input type="text" class="form-control" name="icon" placeholder="Ex: fa fa-folder"
                                                value="<?php echo e(old('icon') ?? $item->icon); ?>">
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label><?php echo app('translator')->get('Image'); ?></label>
                                              <div class="input-group">
                                                <span class="input-group-btn">
                                                  <a data-input="image" data-preview="image-holder" class="btn btn-primary lfm"
                                                    data-type="cms-image">
                                                    <i class="fa fa-picture-o"></i> <?php echo app('translator')->get('Select'); ?>
                                                  </a>
                                                </span>
                                                <input id="image" class="form-control" type="text" name="image"
                                                  placeholder="<?php echo app('translator')->get('Image source'); ?>" value="<?php echo e($item->image); ?>">
                                              </div>
                                              <div id="image-holder" style="margin-top:15px;max-height:100px;">
                                                <?php if($item->image != ''): ?>
                                                  <img style="height: 5rem;" src="<?php echo e($item->image); ?>">
                                                <?php endif; ?>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label><?php echo app('translator')->get('Background image'); ?></label>
                                              <div class="input-group">
                                                <span class="input-group-btn">
                                                  <a data-input="image_background" data-preview="image_background-holder" data-type="cms-image"
                                                    class="btn btn-primary lfm">
                                                    <i class="fa fa-picture-o"></i> <?php echo app('translator')->get('Select'); ?>
                                                  </a>
                                                </span>
                                                <input id="image_background" class="form-control" type="text" name="image_background"
                                                  placeholder="<?php echo app('translator')->get('Image source'); ?>" value="<?php echo e($item->image_background); ?>">
                                              </div>
                                              <div id="image_background-holder" style="margin-top:15px;max-height:100px;">
                                                <?php if($item->image_background != ''): ?>
                                                  <img style="height: 5rem;" src="<?php echo e($item->image_background); ?>">
                                                <?php endif; ?>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="text-end mt-2">
                                   
                                  <button
                                      class="btn btn-primary btn-sm"><?php echo app('translator')->get('Save'); ?></button>
                                      <a class="btn btn-danger  btn-sm" onclick="return confirm('<?php echo app('translator')->get('confirm_action'); ?>')" href="<?php echo e(route(Request::segment(2) . '.destroy', $item->id)); ?>">
                                      <?php echo app('translator')->get('Delete'); ?></a>
                                </div>
                            </form>
                             <form action="<?php echo e(route(Request::segment(2) . '.destroy', $item->id)); ?>" method="POST" onsubmit="return confirm('<?php echo app('translator')->get('confirm_action'); ?>')">
                              <?php echo csrf_field(); ?>
                              <?php echo method_field('DELETE'); ?>
                              <button style="position: absolute;bottom: 10px;left: 80px;" class="btn btn-danger  btn-sm"><?php echo app('translator')->get('Delete'); ?></button>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                        <?php $count_sub=0; ?>

                        <?php $__currentLoopData = $parents_child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sub_1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($item_sub_1->parent_id == $item->id): ?>
                            <?php $count_sub++; ?>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                        <?php if($count_sub>0): ?>
                        
                        <ol class="dd-list">
                          <?php $__currentLoopData = $parents_child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sub_1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($item_sub_1->parent_id == $item->id): ?>
                                  <li class="dd-item dd3-item"
                                      data-id="<?php echo e($item_sub_1->id); ?>">
                                      <div class="dd-handle dd3-handle">
                                      </div>
                                      <div class="dd3-content">
                                          <span class="text float-start"
                                              data-update="title"><?php echo e($item_sub_1->title); ?></span>
                                          <span
                                              class="text float-end"><?php echo app('translator')->get($status[$item_sub_1->status]); ?></span>
                                          <a data-toggle="collapse"
                                              href="#item-details-<?php echo e($item_sub_1->id); ?>"
                                              role="button"
                                              aria-expanded="false"
                                              aria-controls="item-details-<?php echo e($item_sub_1->id); ?>"
                                              class="show-item-details">
                                              <i
                                                  class="fa fa-angle-down"></i>
                                          </a>
                                          <div class="clearfix">
                                          </div>
                                      </div>
                                      <div class="item-details collapse multi-collapse"
                                          id="item-details-<?php echo e($item_sub_1->id); ?>">
                                        <form role="form"
                                            action="<?php echo e(route(Request::segment(2) . '.update', $item_sub_1->id)); ?>"
                                            method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <div class="box-body">
                                              <div class="nav-tabs-custom">
                                                <div class="tab-content">
                                                  <div class="tab-pane active" id="tab_1">
                                                    <div class="row">
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label><?php echo app('translator')->get('Parent element'); ?></label>
                                                          <select name="parent_id" id="parent_id" class="form-control select2" style="width: 100%">
                                                            <option value=""><?php echo app('translator')->get('Please select'); ?></option>

                                                            <?php $__currentLoopData = $parents_child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                              <?php if($item_child->parent_id == 0 || $item_child->parent_id == null): ?>
                                                              <?php
                                                              if($item_child->id==$item->id) continue;
                                                              ?>
                                                                <option value="<?php echo e($item_child->id); ?>" <?php echo e($item_sub_1->parent_id == $item_child->id ? 'selected' : ''); ?>>
                                                                  <?php echo e($item_child->title); ?></option>

                                                                <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                  <?php if($item_child->id == $sub->parent_id): ?>
                                                                  <?php
                                                                  if($sub->id==$item_sub_1->id) continue;
                                                                  ?>
                                                                    <option value="<?php echo e($sub->id); ?>"
                                                                      <?php echo e($item_sub_1->parent_id == $sub->id ? 'selected' : ''); ?>>- -
                                                                      <?php echo e($sub->title); ?></option>

                                                                    <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                      <?php if($sub->id == $sub_child->parent_id): ?>
                                                                       <?php
                                                                      if($sub_child->id==$item_sub_1->id) continue;
                                                                      ?>
                                                                        <option value="<?php echo e($sub_child->id); ?>"
                                                                          <?php echo e($item_sub_1->parent_id == $sub_child->id ? 'selected' : ''); ?>>
                                                                          - - - - <?php echo e($sub_child->title); ?></option>
                                                                      <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                  <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                              <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                          </select>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label><?php echo app('translator')->get('Status'); ?></label>
                                                          <div class="form-control">
                                                            <?php $__currentLoopData = App\Consts::STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                              <label>
                                                                <input type="radio" name="status" value="<?php echo e($value); ?>"
                                                                  <?php echo e($item_sub_1->status == $value ? 'checked' : ''); ?>>
                                                                <small class="mr-15"><?php echo e(__($value)); ?></small>
                                                              </label>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label>
                                                            <?php echo app('translator')->get('Title'); ?>
                                                            <small class="text-red">*</small>
                                                          </label>
                                                          <input type="text" class="form-control" name="title" placeholder="<?php echo app('translator')->get('Title'); ?>"
                                                            value="<?php echo e(old('title') ?? $item_sub_1->title); ?>" required>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label>
                                                            <?php echo app('translator')->get('Block type'); ?>
                                                            <small class="text-red">*</small>
                                                          </label>
                                                          <select name="block_code" id="block_code" class="form-control select2" style="width: 100%" required>
                                                            <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                                                            <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                              <option value="<?php echo e($block->block_code); ?>"
                                                                <?php echo e($block->block_code == $item_sub_1->block_code ? 'selected' : ''); ?>><?php echo e($block->name); ?>

                                                              </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                          </select>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label><?php echo app('translator')->get('Layout'); ?></label>
                                                          <select name="json_params[layout]" id="block_layout" class="form-control select2"
                                                            style="width: 100%">
                                                            <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                                                            <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                              <?php if($block->block_code == $item_sub_1->block_code): ?>
                                                                <?php
                                                                  $json_params = json_decode($block->json_params);
                                                                ?>
                                                                <?php if(isset($json_params->layout)): ?>
                                                                  <?php $__currentLoopData = $json_params->layout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($value); ?>"
                                                                      <?php echo e(isset($item_sub_1->json_params->layout) && $value == $item_sub_1->json_params->layout ? 'selected' : ''); ?>>
                                                                      <?php echo e(__($value)); ?>

                                                                    </option>
                                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                              <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                          </select>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label><?php echo app('translator')->get('Style'); ?></label>
                                                          <select name="json_params[style]" id="block_style" class="form-control select2" style="width: 100%">
                                                            <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                                                            <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                              <?php if($block->block_code == $detail->block_code): ?>
                                                                <?php
                                                                  $json_params = json_decode($block->json_params);
                                                                ?>
                                                                <?php if(isset($json_params->style)): ?>
                                                                  <?php $__currentLoopData = $json_params->style; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($value); ?>"
                                                                      <?php echo e(isset($item_sub_1->json_params->style) && $value == $item_sub_1->json_params->style ? 'selected' : ''); ?>>
                                                                      <?php echo e(__($value)); ?>

                                                                    </option>
                                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                              <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                          </select>
                                                        </div>
                                                      </div>

                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label><?php echo app('translator')->get('Brief'); ?></label>
                                                          <textarea name="brief" id="brief" class="form-control" rows="5"><?php echo e(old('brief') ?? $item_sub_1->brief); ?></textarea>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label><?php echo app('translator')->get('Content'); ?></label>
                                                          <textarea name="content" id="content" class="form-control" rows="5"><?php echo e(old('content') ?? $item_sub_1->content); ?></textarea>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label><?php echo app('translator')->get('Url redirect'); ?></label>
                                                          <input type="text" class="form-control" name="url_link" placeholder="<?php echo app('translator')->get('Url redirect'); ?>"
                                                            value="<?php echo e(old('url_link') ?? $item_sub_1->url_link); ?>">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label><?php echo app('translator')->get('Url redirect title'); ?></label>
                                                          <input type="text" class="form-control" name="url_link_title"
                                                            placeholder="<?php echo app('translator')->get('Url redirect title'); ?>"
                                                            value="<?php echo e(old('url_link_title') ?? $item_sub_1->url_link_title); ?>">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label><?php echo app('translator')->get('Order'); ?></label>
                                                          <input type="number" class="form-control" name="iorder" placeholder="<?php echo app('translator')->get('Order'); ?>"
                                                            value="<?php echo e(old('iorder') ?? $item_sub_1->iorder); ?>">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label><?php echo app('translator')->get('Icon'); ?></label>
                                                          <input type="text" class="form-control" name="icon" placeholder="Ex: fa fa-folder"
                                                            value="<?php echo e(old('icon') ?? $item_sub_1->icon); ?>">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label><?php echo app('translator')->get('Image'); ?></label>
                                                          <div class="input-group">
                                                            <span class="input-group-btn">
                                                              <a data-input="image" data-preview="image-holder" class="btn btn-primary lfm"
                                                                data-type="cms-image">
                                                                <i class="fa fa-picture-o"></i> <?php echo app('translator')->get('Select'); ?>
                                                              </a>
                                                            </span>
                                                            <input id="image" class="form-control" type="text" name="image"
                                                              placeholder="<?php echo app('translator')->get('Image source'); ?>" value="<?php echo e($item_sub_1->image); ?>">
                                                          </div>
                                                          <div id="image-holder" style="margin-top:15px;max-height:100px;">
                                                            <?php if($item_sub_1->image != ''): ?>
                                                              <img style="height: 5rem;" src="<?php echo e($item_sub_1->image); ?>">
                                                            <?php endif; ?>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label><?php echo app('translator')->get('Background image'); ?></label>
                                                          <div class="input-group">
                                                            <span class="input-group-btn">
                                                              <a data-input="image_background" data-preview="image_background-holder" data-type="cms-image"
                                                                class="btn btn-primary lfm">
                                                                <i class="fa fa-picture-o"></i> <?php echo app('translator')->get('Select'); ?>
                                                              </a>
                                                            </span>
                                                            <input id="image_background" class="form-control" type="text" name="image_background"
                                                              placeholder="<?php echo app('translator')->get('Image source'); ?>" value="<?php echo e($item_sub_1->image_background); ?>">
                                                          </div>
                                                          <div id="image_background-holder" style="margin-top:15px;max-height:100px;">
                                                            <?php if($item_sub_1->image_background != ''): ?>
                                                              <img style="height: 5rem;" src="<?php echo e($item_sub_1->image_background); ?>">
                                                            <?php endif; ?>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="text-end mt-2">
                                              <button
                                                  class="btn btn-primary btn-sm"><?php echo app('translator')->get('Save'); ?></button>
                                            </div>
                                        </form>
                                        <form action="<?php echo e(route(Request::segment(2) . '.destroy', $item_sub_1->id)); ?>" method="POST" onsubmit="return confirm('<?php echo app('translator')->get('confirm_action'); ?>')">
                                          <?php echo csrf_field(); ?>
                                          <?php echo method_field('DELETE'); ?>
                                          <button style="position: absolute;bottom: 10px;left: 80px;" class="btn btn-danger  btn-sm"><?php echo app('translator')->get('Delete'); ?></button>
                                        </form> 
                                      </div>
                                      <div class="clearfix"></div>
                                  </li>
                              <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ol>
                        <?php endif; ?>
                    </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                </ol>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <a class="btn btn-warning btn-flat menu-sort-save btn-sm"
                title="<?php echo app('translator')->get('Save'); ?>">
                <i class="fa fa-floppy-o"></i>
                <?php echo app('translator')->get('Save sort'); ?>
            </a>
          </div>
        </div>
      </div> 
    </div>
    <?php endif; ?>
  </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('themes/admin/plugins/nestable/jquery.nestable.min.js')); ?>"></script>
  <script>
    $(document).ready(function() {
      $(document).on('change', '#block_code', function() {
        let block_code = $(this).val();
        var _targetLayout = $(this).parents('.form-block').find('#block_layout');
        var _targetStyle = $(this).parents('.form-block').find('#block_style');
        _targetLayout.html('');
        _targetStyle.html('');
        var url = "<?php echo e(route('blocks.params')); ?>/";
        $.ajax({
          type: "GET",
          url: url,
          data: {
            "block_code": block_code,
          },
          success: function(response) {
            var _optionListLayout = '<option value=""><?php echo app('translator')->get('Please select'); ?></option>';
            var _optionListStyle = '<option value=""><?php echo app('translator')->get('Please select'); ?></option>';
            if (response.data != null) {
              let json_params = JSON.parse(response.data);
              if (json_params.hasOwnProperty('layout')) {
                Object.entries(json_params.layout).forEach(([key, value]) => {
                  _optionListLayout += '<option value="' + value + '"> ' + value + ' </option>';
                });
              }
              _targetLayout.html(_optionListLayout);
              if (json_params.hasOwnProperty('style')) {
                Object.entries(json_params.style).forEach(([key, value]) => {
                  _optionListStyle += '<option value="' + value + '"> ' + value + ' </option>';
                });
              }
              _targetStyle.html(_optionListStyle);
            }
            $(".select2").select2();
          },
          error: function(response) {
            // Get errors
            var errors = response.responseJSON.message;
            console.log(errors);
          }
        });
      });
    });
    $('#menu-sort').nestable({
        group: 0,
        maxDepth: 2,
    });
    $('.menu-sort-save').click(function() {
      $('#loading').show();
      let serialize = $('#menu-sort').nestable('serialize');
      let menu = JSON.stringify(serialize);
      $.ajax({
          url: '<?php echo e(route('blocks.update_sort')); ?>',
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
            alert('Cập nhật thành công');
              location.reload();
          } else {
              alert("Cập nhật thất bại");
              location.reload();
          }
      });
  });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fhmagency/domains/fhmagency.vn/public_html/bds/resources/views/admin/pages/block_contents/edit.blade.php ENDPATH**/ ?>