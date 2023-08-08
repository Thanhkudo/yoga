

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
            <form class="form-block" role="form" action="<?php echo e(route(Request::segment(2) . '.update', $detail->id)); ?>"
                method="POST">
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
                                            <select name="parent_id" id="parent_id" class="form-control select2"
                                                style="width: 100%">
                                                <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                                                <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($item->parent_id == 0 || $item->parent_id == null): ?>
                                                        <option value="<?php echo e($item->id); ?>"
                                                            <?php echo e($detail->parent_id == $item->id ? 'selected' : ''); ?>>
                                                            <?php echo e($item->title); ?></option>

                                                        <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($item->id == $sub->parent_id): ?>
                                                                <option value="<?php echo e($sub->id); ?>"
                                                                    <?php echo e($detail->parent_id == $sub->id ? 'selected' : ''); ?>>
                                                                    - -
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
                                            <input type="text" class="form-control" name="title"
                                                placeholder="<?php echo app('translator')->get('Title'); ?>"
                                                value="<?php echo e(old('title') ?? $detail->title); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <?php echo app('translator')->get('Block type'); ?>
                                                <small class="text-red">*</small>
                                            </label>
                                            <select name="block_code" id="block_code" class="form-control select2"
                                                style="width: 100%" required>
                                                <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                                                <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($item->block_code); ?>"
                                                        <?php echo e($item->block_code == $detail->block_code ? 'selected' : ''); ?>>
                                                        <?php echo e($item->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Layout'); ?></label>
                                            <select name="json_params[layout]" id="block_layout"
                                                class="form-control select2" style="width: 100%">
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
                                            <select name="json_params[style]" id="block_style" class="form-control select2"
                                                style="width: 100%">
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

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Brief'); ?></label>
                                            <textarea name="brief" id="brief" class="form-control" rows="5"><?php echo e(old('brief') ?? $detail->brief); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Content'); ?></label>
                                            <textarea name="content" id="content" class="form-control" rows="5"><?php echo e(old('content') ?? $detail->content); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Url redirect'); ?></label>
                                            <input type="text" class="form-control" name="url_link"
                                                placeholder="<?php echo app('translator')->get('Url redirect'); ?>"
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
                                            <label><?php echo app('translator')->get('Url redirect more'); ?></label>
                                            <input type="text" class="form-control" name="json_params[url_link]"
                                                placeholder="<?php echo app('translator')->get('Url redirect'); ?>"
                                                value="<?php echo e(old('json_params[url_link]') ?? ($detail->json_params->url_link??"")); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Url redirect title more'); ?></label>
                                            <input type="text" class="form-control" name="json_params[url_link_title]"
                                                placeholder="<?php echo app('translator')->get('Url redirect title'); ?>"
                                                value="<?php echo e(old('json_params[url_link_title]') ?? ($detail->json_params->url_link_title??"")); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Order'); ?></label>
                                            <input type="number" class="form-control" name="iorder"
                                                placeholder="<?php echo app('translator')->get('Order'); ?>"
                                                value="<?php echo e(old('iorder') ?? $detail->iorder); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Icon'); ?></label>
                                            <input type="text" class="form-control" name="icon"
                                                placeholder="Ex: fa fa-folder"
                                                value="<?php echo e(old('icon') ?? $detail->icon); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Image'); ?></label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a data-input="image" data-preview="image-holder"
                                                        class="btn btn-primary lfm" data-type="cms-image">
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
                                                    <a data-input="image_background"
                                                        data-preview="image_background-holder" data-type="cms-image"
                                                        class="btn btn-primary lfm">
                                                        <i class="fa fa-picture-o"></i> <?php echo app('translator')->get('Select'); ?>
                                                    </a>
                                                </span>
                                                <input id="image_background" class="form-control" type="text"
                                                    name="image_background" placeholder="<?php echo app('translator')->get('Image source'); ?>"
                                                    value="<?php echo e($detail->image_background); ?>">
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

        <div class="row">
            <div class="col-md-12">
                <hr style="border-top: dashed 2px #a94442; margin: 10px 0px;">
            </div>
            <div class="col-lg-6 mt-10">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo app('translator')->get('Add link'); ?></h3>
                    </div>
                    <div class="box-body">
                        <div class="the-box ">
                            <form action="<?php echo e(route(Request::segment(2) . '.store')); ?>" method="POST" id="form-main"
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('POST'); ?>
                                <input type="hidden" name="parent_id" value="<?php echo e($detail->id); ?>">
                                <input type="hidden" name="block_code" value="<?php echo e($detail->block_code); ?>">
                                <?php if(Request::get('lang') != '' && Request::get('lang') != $languageDefault->lang_locale): ?>
                                    <input type="hidden" name="lang" value="<?php echo e(Request::get('lang')); ?>">
                                <?php endif; ?>
                                <div class="d-flex-wap">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <?php echo app('translator')->get('Title'); ?>
                                                <small class="text-red">*</small>
                                            </label>
                                            <input type="text" class="form-control" name="title"
                                                placeholder="<?php echo app('translator')->get('Title'); ?>" value="<?php echo e(old('title') ?? ''); ?>"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Status'); ?></label>
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

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Brief'); ?></label>
                                            <textarea name="brief" class="form-control" rows="5"><?php echo e(old('brief') ?? ''); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Content'); ?></label>
                                            <textarea name="content" class="form-control" rows="5"><?php echo e(old('content') ?? ''); ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Url redirect'); ?></label>
                                            <input type="text" class="form-control" name="url_link"
                                                placeholder="<?php echo app('translator')->get('Url redirect'); ?>" value="<?php echo e(old('url_link') ?? ''); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Url redirect title'); ?></label>
                                            <input type="text" class="form-control" name="url_link_title"
                                                placeholder="<?php echo app('translator')->get('Url redirect title'); ?>"
                                                value="<?php echo e(old('url_link_title') ?? ''); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Icon'); ?></label>
                                            <input type="text" class="form-control" name="icon"
                                                placeholder="Ex: fa fa-folder" value="<?php echo e(old('icon')); ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Image'); ?></label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a data-input="image_child" data-preview="image-holder_child"
                                                        class="btn btn-primary lfm" data-type="cms-image">
                                                        <i class="fa fa-picture-o"></i>
                                                        <?php echo app('translator')->get('Select'); ?>
                                                    </a>
                                                </span>
                                                <input id="image_child" class="form-control" type="text"
                                                    name="image" placeholder="<?php echo app('translator')->get('Image source'); ?>">
                                            </div>
                                            <div id="image-holder_child" style="margin-top:15px;max-height:100px;">
                                                <?php if(old('image') != ''): ?>
                                                    <img style="height: 5rem;" src="<?php echo e(old('image_child')); ?>">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Background image'); ?></label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a data-input="image_background_child"
                                                        data-preview="image_background-holder_child" data-type="cms-image"
                                                        class="btn btn-primary lfm">
                                                        <i class="fa fa-picture-o"></i>
                                                        <?php echo app('translator')->get('Select'); ?>
                                                    </a>
                                                </span>
                                                <input id="image_background_child" class="form-control" type="text"
                                                    name="image_background" placeholder="<?php echo app('translator')->get('Image source'); ?>">
                                            </div>
                                            <div id="image_background-holder_child"
                                                style="margin-top:15px;max-height:100px;">
                                                <?php if(old('image_background') != ''): ?>
                                                    <img style="height: 5rem;" src="<?php echo e(old('image_background_child')); ?>">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-btn">
                                    <div class="text-end col-md-12">
                                        <div class="btn-group btn-group-devided">
                                            <button type="submit" class="btn btn-primary btn-sm pull-right">
                                                <i class="fa fa-floppy-o"></i>
                                                <?php echo app('translator')->get('Save'); ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
            <?php if(isset($child) && count($child) > 0): ?>
                <div class="col-md-6 mt-10">
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
                                            <li class="dd-item dd3-item " data-id="<?php echo e($item->id); ?>">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content">
                                                    <span class="text float-start"
                                                        data-update="title"><?php echo e($item->title); ?></span>
                                                    <span class="text float-end"><?php echo app('translator')->get($status[$item->status]); ?></span>
                                                    <a data-toggle="collapse" href="#item-details-<?php echo e($item->id); ?>"
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
                                                        <input type="hidden" name="block_code"
                                                            value="<?php echo e($detail->block_code); ?>">
                                                        <div class="box-body">
                                                            <div class="nav-tabs-custom">
                                                                <div class="tab-content">
                                                                    <div class="tab-pane active">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        <?php echo app('translator')->get('Title'); ?>
                                                                                        <small class="text-red">*</small>
                                                                                    </label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="title"
                                                                                        placeholder="<?php echo app('translator')->get('Title'); ?>"
                                                                                        value="<?php echo e(old('title') ?? $item->title); ?>"
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label><?php echo app('translator')->get('Status'); ?></label>
                                                                                    <div class="form-control">
                                                                                        <?php $__currentLoopData = App\Consts::STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <label>
                                                                                                <input type="radio"
                                                                                                    name="status"
                                                                                                    value="<?php echo e($value); ?>"
                                                                                                    <?php echo e($item->status == $value ? 'checked' : ''); ?>>
                                                                                                <small
                                                                                                    class="mr-15"><?php echo e(__($value)); ?></small>
                                                                                            </label>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    </div>
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
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="url_link"
                                                                                        placeholder="<?php echo app('translator')->get('Url redirect'); ?>"
                                                                                        value="<?php echo e(old('url_link') ?? $item->url_link); ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label><?php echo app('translator')->get('Url redirect title'); ?></label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="url_link_title"
                                                                                        placeholder="<?php echo app('translator')->get('Url redirect title'); ?>"
                                                                                        value="<?php echo e(old('url_link_title') ?? $item->url_link_title); ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label><?php echo app('translator')->get('Icon'); ?></label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="icon"
                                                                                        placeholder="Ex: fa fa-folder"
                                                                                        value="<?php echo e(old('icon') ?? $item->icon); ?>">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label><?php echo app('translator')->get('Image'); ?></label>
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-btn">
                                                                                            <a data-input="image-<?php echo e($item->id); ?>"
                                                                                                data-preview="image-holder-<?php echo e($item->id); ?>"
                                                                                                class="btn btn-primary lfm"
                                                                                                data-type="cms-image">
                                                                                                <i
                                                                                                    class="fa fa-picture-o"></i>
                                                                                                <?php echo app('translator')->get('Select'); ?>
                                                                                            </a>
                                                                                        </span>
                                                                                        <input
                                                                                            id="image-<?php echo e($item->id); ?>"
                                                                                            class="form-control"
                                                                                            type="text" name="image"
                                                                                            placeholder="<?php echo app('translator')->get('Image source'); ?>"
                                                                                            value="<?php echo e($item->image); ?>">
                                                                                    </div>
                                                                                    <div id="image-holder-<?php echo e($item->id); ?>"
                                                                                        style="margin-top:15px;max-height:100px;">
                                                                                        <?php if($item->image != ''): ?>
                                                                                            <img style="height: 5rem;"
                                                                                                src="<?php echo e($item->image); ?>">
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label><?php echo app('translator')->get('Background image'); ?></label>
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-btn">
                                                                                            <a data-input="image_background-<?php echo e($item->id); ?>"
                                                                                                data-preview="image_background-holder-<?php echo e($item->id); ?>"
                                                                                                data-type="cms-image"
                                                                                                class="btn btn-primary lfm">
                                                                                                <i
                                                                                                    class="fa fa-picture-o"></i>
                                                                                                <?php echo app('translator')->get('Select'); ?>
                                                                                            </a>
                                                                                        </span>
                                                                                        <input
                                                                                            id="image_background-<?php echo e($item->id); ?>"
                                                                                            class="form-control"
                                                                                            type="text"
                                                                                            name="image_background"
                                                                                            placeholder="<?php echo app('translator')->get('Image source'); ?>"
                                                                                            value="<?php echo e($item->image_background); ?>">
                                                                                    </div>
                                                                                    <div id="image_background-holder-<?php echo e($item->id); ?>"
                                                                                        style="margin-top:15px;max-height:100px;">
                                                                                        <?php if($item->image_background != ''): ?>
                                                                                            <img style="height: 5rem;"
                                                                                                src="<?php echo e($item->image_background); ?>">
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
                                                            <a class="btn btn-danger  btn-sm"
                                                                onclick="return confirm('<?php echo app('translator')->get('confirm_action'); ?>')"
                                                                href="<?php echo e(route(Request::segment(2) . '.destroy', $item->id)); ?>">
                                                                <?php echo app('translator')->get('Delete'); ?></a>
                                                        </div>
                                                    </form>
                                                    <form
                                                        action="<?php echo e(route(Request::segment(2) . '.destroy', $item->id)); ?>"
                                                        method="POST" onsubmit="return confirm('<?php echo app('translator')->get('confirm_action'); ?>')">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button style="position: absolute;bottom: 10px;left: 80px;"
                                                            class="btn btn-danger  btn-sm"><?php echo app('translator')->get('Delete'); ?></button>
                                                    </form>
                                                </div>
                                                <div class="clearfix"></div>
                                                <?php $count_sub=0; ?>

                                                <?php $__currentLoopData = $parents_child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sub_1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($item_sub_1->parent_id == $item->id): ?>
                                                        <?php $count_sub++; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($count_sub > 0): ?>
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
                                                                            role="button" aria-expanded="false"
                                                                            aria-controls="item-details-<?php echo e($item_sub_1->id); ?>"
                                                                            class="show-item-details">
                                                                            <i class="fa fa-angle-down"></i>
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
                                                                                        <div class="tab-pane active"
                                                                                            id="tab_1">
                                                                                            <div class="row">
                                                                                                <div class="col-md-6">
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label><?php echo app('translator')->get('Parent element'); ?></label>
                                                                                                        <select
                                                                                                            name="parent_id"
                                                                                                            id="parent_id"
                                                                                                            class="form-control select2"
                                                                                                            style="width: 100%">
                                                                                                            <option
                                                                                                                value="">
                                                                                                                <?php echo app('translator')->get('Please select'); ?>
                                                                                                            </option>

                                                                                                            <?php $__currentLoopData = $parents_child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                <?php if($item_child->parent_id == 0 || $item_child->parent_id == null): ?>
                                                                                                                    <?php
                                                                                                                        if ($item_child->id == $item->id) {
                                                                                                                            continue;
                                                                                                                        }
                                                                                                                    ?>
                                                                                                                    <option
                                                                                                                        value="<?php echo e($item_child->id); ?>"
                                                                                                                        <?php echo e($item_sub_1->parent_id == $item_child->id ? 'selected' : ''); ?>>
                                                                                                                        <?php echo e($item_child->title); ?>

                                                                                                                    </option>

                                                                                                                    <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                        <?php if($item_child->id == $sub->parent_id): ?>
                                                                                                                            <?php
                                                                                                                                if ($sub->id == $item_sub_1->id) {
                                                                                                                                    continue;
                                                                                                                                }
                                                                                                                            ?>
                                                                                                                            <option
                                                                                                                                value="<?php echo e($sub->id); ?>"
                                                                                                                                <?php echo e($item_sub_1->parent_id == $sub->id ? 'selected' : ''); ?>>
                                                                                                                                -
                                                                                                                                -
                                                                                                                                <?php echo e($sub->title); ?>

                                                                                                                            </option>

                                                                                                                            <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                                <?php if($sub->id == $sub_child->parent_id): ?>
                                                                                                                                    <?php
                                                                                                                                        if ($sub_child->id == $item_sub_1->id) {
                                                                                                                                            continue;
                                                                                                                                        }
                                                                                                                                    ?>
                                                                                                                                    <option
                                                                                                                                        value="<?php echo e($sub_child->id); ?>"
                                                                                                                                        <?php echo e($item_sub_1->parent_id == $sub_child->id ? 'selected' : ''); ?>>
                                                                                                                                        -
                                                                                                                                        -
                                                                                                                                        -
                                                                                                                                        -
                                                                                                                                        <?php echo e($sub_child->title); ?>

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
                                                                                                <div class="col-md-6">
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label><?php echo app('translator')->get('Status'); ?></label>
                                                                                                        <div
                                                                                                            class="form-control">
                                                                                                            <?php $__currentLoopData = App\Consts::STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                <label>
                                                                                                                    <input
                                                                                                                        type="radio"
                                                                                                                        name="status"
                                                                                                                        value="<?php echo e($value); ?>"
                                                                                                                        <?php echo e($item_sub_1->status == $value ? 'checked' : ''); ?>>
                                                                                                                    <small
                                                                                                                        class="mr-15"><?php echo e(__($value)); ?></small>
                                                                                                                </label>
                                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label>
                                                                                                            <?php echo app('translator')->get('Title'); ?>
                                                                                                            <small
                                                                                                                class="text-red">*</small>
                                                                                                        </label>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control"
                                                                                                            name="title"
                                                                                                            placeholder="<?php echo app('translator')->get('Title'); ?>"
                                                                                                            value="<?php echo e(old('title') ?? $item_sub_1->title); ?>"
                                                                                                            required>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label>
                                                                                                            <?php echo app('translator')->get('Block type'); ?>
                                                                                                            <small
                                                                                                                class="text-red">*</small>
                                                                                                        </label>
                                                                                                        <select
                                                                                                            name="block_code"
                                                                                                            id="block_code"
                                                                                                            class="form-control select2"
                                                                                                            style="width: 100%"
                                                                                                            required>
                                                                                                            <option
                                                                                                                value="">
                                                                                                                <?php echo app('translator')->get('Please select'); ?>
                                                                                                            </option>
                                                                                                            <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                <option
                                                                                                                    value="<?php echo e($block->block_code); ?>"
                                                                                                                    <?php echo e($block->block_code == $item_sub_1->block_code ? 'selected' : ''); ?>>
                                                                                                                    <?php echo e($block->name); ?>

                                                                                                                </option>
                                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label><?php echo app('translator')->get('Layout'); ?></label>
                                                                                                        <select
                                                                                                            name="json_params[layout]"
                                                                                                            id="block_layout"
                                                                                                            class="form-control select2"
                                                                                                            style="width: 100%">
                                                                                                            <option
                                                                                                                value="">
                                                                                                                <?php echo app('translator')->get('Please select'); ?>
                                                                                                            </option>
                                                                                                            <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                <?php if($block->block_code == $item_sub_1->block_code): ?>
                                                                                                                    <?php
                                                                                                                        $json_params = json_decode($block->json_params);
                                                                                                                    ?>
                                                                                                                    <?php if(isset($json_params->layout)): ?>
                                                                                                                        <?php $__currentLoopData = $json_params->layout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                            <option
                                                                                                                                value="<?php echo e($value); ?>"
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
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label><?php echo app('translator')->get('Style'); ?></label>
                                                                                                        <select
                                                                                                            name="json_params[style]"
                                                                                                            id="block_style"
                                                                                                            class="form-control select2"
                                                                                                            style="width: 100%">
                                                                                                            <option
                                                                                                                value="">
                                                                                                                <?php echo app('translator')->get('Please select'); ?>
                                                                                                            </option>
                                                                                                            <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                <?php if($block->block_code == $detail->block_code): ?>
                                                                                                                    <?php
                                                                                                                        $json_params = json_decode($block->json_params);
                                                                                                                    ?>
                                                                                                                    <?php if(isset($json_params->style)): ?>
                                                                                                                        <?php $__currentLoopData = $json_params->style; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                            <option
                                                                                                                                value="<?php echo e($value); ?>"
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
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label><?php echo app('translator')->get('Brief'); ?></label>
                                                                                                        <blade
                                                                                                            ___html_tags_6___ />
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label><?php echo app('translator')->get('Content'); ?></label>
                                                                                                        <blade
                                                                                                            ___html_tags_7___ />
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label><?php echo app('translator')->get('Url redirect'); ?></label>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control"
                                                                                                            name="url_link"
                                                                                                            placeholder="<?php echo app('translator')->get('Url redirect'); ?>"
                                                                                                            value="<?php echo e(old('url_link') ?? $item_sub_1->url_link); ?>">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label><?php echo app('translator')->get('Url redirect title'); ?></label>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control"
                                                                                                            name="url_link_title"
                                                                                                            placeholder="<?php echo app('translator')->get('Url redirect title'); ?>"
                                                                                                            value="<?php echo e(old('url_link_title') ?? $item_sub_1->url_link_title); ?>">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label><?php echo app('translator')->get('Order'); ?></label>
                                                                                                        <input
                                                                                                            type="number"
                                                                                                            class="form-control"
                                                                                                            name="iorder"
                                                                                                            placeholder="<?php echo app('translator')->get('Order'); ?>"
                                                                                                            value="<?php echo e(old('iorder') ?? $item_sub_1->iorder); ?>">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label><?php echo app('translator')->get('Icon'); ?></label>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control"
                                                                                                            name="icon"
                                                                                                            placeholder="Ex: fa fa-folder"
                                                                                                            value="<?php echo e(old('icon') ?? $item_sub_1->icon); ?>">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label><?php echo app('translator')->get('Image'); ?></label>
                                                                                                        <div
                                                                                                            class="input-group">
                                                                                                            <span
                                                                                                                class="input-group-btn">
                                                                                                                <a data-input="image-<?php echo e($item_sub_1->id); ?>"
                                                                                                                    data-preview="image-holder-<?php echo e($item_sub_1->id); ?>"
                                                                                                                    class="btn btn-primary lfm"
                                                                                                                    data-type="cms-image">
                                                                                                                    <i
                                                                                                                        class="fa fa-picture-o"></i>
                                                                                                                    <?php echo app('translator')->get('Select'); ?>
                                                                                                                </a>
                                                                                                            </span>
                                                                                                            <input
                                                                                                                id="image-<?php echo e($item_sub_1->id); ?>"
                                                                                                                class="form-control"
                                                                                                                type="text"
                                                                                                                name="image"
                                                                                                                placeholder="<?php echo app('translator')->get('Image source'); ?>"
                                                                                                                value="<?php echo e($item_sub_1->image); ?>">
                                                                                                        </div>
                                                                                                        <div id="image-holder-<?php echo e($item_sub_1->id); ?>"
                                                                                                            style="margin-top:15px;max-height:100px;">
                                                                                                            <?php if($item_sub_1->image != ''): ?>
                                                                                                                <img style="height: 5rem;"
                                                                                                                    src="<?php echo e($item_sub_1->image); ?>">
                                                                                                            <?php endif; ?>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label><?php echo app('translator')->get('Background image'); ?></label>
                                                                                                        <div
                                                                                                            class="input-group">
                                                                                                            <span
                                                                                                                class="input-group-btn">
                                                                                                                <a data-input="image_background-<?php echo e($item_sub_1->id); ?>"
                                                                                                                    data-preview="image_background-holder-<?php echo e($item_sub_1->id); ?>"
                                                                                                                    data-type="cms-image"
                                                                                                                    class="btn btn-primary lfm">
                                                                                                                    <i
                                                                                                                        class="fa fa-picture-o"></i>
                                                                                                                    <?php echo app('translator')->get('Select'); ?>
                                                                                                                </a>
                                                                                                            </span>
                                                                                                            <input
                                                                                                                id="image_background-<?php echo e($item_sub_1->id); ?>"
                                                                                                                class="form-control"
                                                                                                                type="text"
                                                                                                                name="image_background"
                                                                                                                placeholder="<?php echo app('translator')->get('Image source'); ?>"
                                                                                                                value="<?php echo e($item_sub_1->image_background); ?>">
                                                                                                        </div>
                                                                                                        <div id="image_background-holder-<?php echo e($item_sub_1->id); ?>"
                                                                                                            style="margin-top:15px;max-height:100px;">
                                                                                                            <?php if($item_sub_1->image_background != ''): ?>
                                                                                                                <img style="height: 5rem;"
                                                                                                                    src="<?php echo e($item_sub_1->image_background); ?>">
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
                                                                        <form
                                                                            action="<?php echo e(route(Request::segment(2) . '.destroy', $item_sub_1->id)); ?>"
                                                                            method="POST"
                                                                            onsubmit="return confirm('<?php echo app('translator')->get('confirm_action'); ?>')">
                                                                            <?php echo csrf_field(); ?>
                                                                            <?php echo method_field('DELETE'); ?>
                                                                            <button
                                                                                style="position: absolute;bottom: 10px;left: 80px;"
                                                                                class="btn btn-danger  btn-sm"><?php echo app('translator')->get('Delete'); ?></button>
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
                            <a class="btn btn-warning btn-flat menu-sort-save btn-sm" title="<?php echo app('translator')->get('Save'); ?>">
                                <i class="fa fa-floppy-o"></i>
                                <?php echo app('translator')->get('Save sort'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        CKEDITOR.replace('content', ck_options);

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
                                    _optionListLayout += '<option value="' + value +
                                        '"> ' + value + ' </option>';
                                });
                            }
                            _targetLayout.html(_optionListLayout);
                            if (json_params.hasOwnProperty('style')) {
                                Object.entries(json_params.style).forEach(([key, value]) => {
                                    _optionListStyle += '<option value="' + value +
                                        '"> ' + value + ' </option>';
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
                        location.reload();
                    } else {
                        alert("Hệ thống đang quá tải");
                        location.reload();
                    }
                });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\FHM\yoga\resources\views/admin/pages/block_contents/edit/custom_link.blade.php ENDPATH**/ ?>