
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.item_list'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.inventory'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.item_list'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($editData)): ?>
        <?php if(in_array(321, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>
           
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(url('files')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('lang.add'); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
      <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30"><?php if(isset($editData)): ?>
                                    <?php echo app('translator')->get('lang.edit'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('lang.add'); ?>
                                <?php endif; ?>
                                <?php echo app('translator')->get('lang.item'); ?>
                            </h3>
                        </div>
                        <?php if(isset($editData)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'files-update', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <?php else: ?>
                        <?php if(in_array(321, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>
           
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'files-add',
                        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <?php endif; ?>
                        <?php endif; ?>
                        <input type="hidden" name="id" autocomplete="off" value="<?php echo e(isset($editData)? $editData->id : ''); ?>">
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row">
                                    <?php if(session()->has('message-success')): ?>
                                    <div class="alert alert-success mb-20">
                                        <?php echo e(session()->get('message-success')); ?>

                                    </div>
                                    <?php elseif(session()->has('message-danger')): ?>
                                    <div class="alert alert-danger">
                                        <?php echo e(session()->get('message-danger')); ?>

                                    </div>
                                    <?php endif; ?>

                                    <div class="col-lg-12 mb-20">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                            type="text" name="name" autocomplete="off" value="<?php echo e(isset($editData)? $editData->Name : ''); ?>">
                                            <label><?php echo app('translator')->get('lang.name'); ?> <span>*</span> </label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('name')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('name')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb-20">                               
                            </div>

                            <div class="col">
                                                <div class="row no-gutters input-right-icon">
                                                    <div class="col">
                                                        <div class="input-effect">
                                                            <input class="primary-input" type="text" id="placeholderFileOneName"
                                                                   placeholder="<?php echo e(isset($editData)? $editData->url : ''); ?>"
                                                                   readonly 
                                                            >
                                                            <span class="focus-border"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button class="primary-btn-small-input" type="button">
                                                            <label class="primary-btn small fix-gr-bg"
                                                                   for="document_file_1"><?php echo app('translator')->get('lang.browse'); ?></label>
                                                            <input type="file" class="d-none" name="file_url" id="document_file_1" >
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                             
                  				<?php 
                                  $tooltip = "";
                                  if(in_array(321, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                ?>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                       <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="<?php echo e($tooltip); ?>">

                                            <span class="ti-check"></span>
                                            <?php if(isset($editData)): ?>
                                                <?php echo app('translator')->get('lang.update'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('lang.save'); ?>
                                            <?php endif; ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>

            <div class="col-lg-9">
               
          <div class="row">
            <div class="col-lg-4 no-gutters">
                <div class="main-title">
                    <h3 class="mb-0"><?php echo app('translator')->get('lang.item_list'); ?></h3>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12">
                <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                    <thead>
                        <?php if(session()->has('message-success-delete') != "" ||
                                session()->get('message-danger-delete') != ""): ?>
                                <tr>
                                    <td colspan="6">
                                         <?php if(session()->has('message-success-delete')): ?>
                                          <div class="alert alert-success">
                                              <?php echo e(session()->get('message-success-delete')); ?>

                                          </div>
                                        <?php elseif(session()->has('message-danger-delete')): ?>
                                          <div class="alert alert-danger">
                                              <?php echo e(session()->get('message-danger-delete')); ?>

                                          </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                             <?php endif; ?>
                        <tr>
                            <th><?php echo app('translator')->get('lang.id'); ?>
                            <th><?php echo app('translator')->get('lang.name'); ?> </th>
                            <th><?php echo app('translator')->get('lang.url'); ?> </th>
                            <th><?php echo app('translator')->get('lang.action'); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if(isset($files)): ?>
                        <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td><?php echo e($file->id); ?></td>
                            <td><?php echo e($file->Name); ?></td>
                            <td><?php echo e($file->url); ?></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                        <?php echo app('translator')->get('lang.select'); ?>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                    <?php if(in_array(322, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>
                                        <a class="dropdown-item" href="<?php echo e(url('files-edit/'.$file->id)); ?>"><?php echo app('translator')->get('lang.edit'); ?></a>
                                    <?php endif; ?>
                                    <?php if(in_array(323, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>
                                        <a class="deleteUrl dropdown-item" data-modal-size="modal-md" title="Delete Item" href="<?php echo e(url('for-delete-file/'.$file->id)); ?>"><?php echo app('translator')->get('lang.delete'); ?></a>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </td>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\SGSS\resources\views/backEnd/files/fileList.blade.php ENDPATH**/ ?>