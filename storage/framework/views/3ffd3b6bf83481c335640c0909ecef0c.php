<?php $__env->startSection('doc', 'Add'); ?>
<?php $__env->startSection('content'); ?>
    <h3 class="text-center">
        แก้ไขข้อมูล
    </h3>
    <div class="container py-4 ">
        <form method="POST" action="<?php echo e(route('updateInfo', ['id' => $list->id])); ?>" id="editInfo"
            enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row ms-auto justify-content-center">
                <div class="col-md-9">
                    <h5 class="container">
                        ข้อมูลลูกค้า
                    </h5>
                    <div class="row">
                        <div class="col-md-6 ">
                            <label for="CustomerName" class="form-label">ชื่อและนามสกุล</label>
                            <input type="text" class="form-control" name="CustomerName" class="form-control"
                                value="<?php echo e($list->CustomerName); ?>">
                            <?php $__errorArgs = ['CustomerName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="my-1">
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-6">
                            <label for="NationalID" class="form-label">หมายเลขบัตรประชาชน (13 หลัก) </label>
                            <input type="text" class="form-control" name="NationalID" class="form-control"
                                value="<?php echo e($list->NationalID); ?>">

                            


                            <?php $__errorArgs = ['NationalID'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="my-1">
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-4">
                            <label for="PhoneNumber" class="form-label">เบอร์โทรศัพท์ (13 หลัก) </label>
                            <input type="number" class="form-control" name="PhoneNumber" class="form-control"
                                value="<?php echo e($list->PhoneNumber); ?>">
                            <?php $__errorArgs = ['PhoneNumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="my-1">
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-8">
                            <label for="Address" class="form-label">ที่อยู่ปัจจุบัน</label>
                            <input type="text" class="form-control" name="Address" class="form-control"
                                value="<?php echo e($list->Address); ?>">
                            <?php $__errorArgs = ['Address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="my-1">
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="row ms-auto form-group justify-content-center">
                    <div class="col-md-9">
                        <hr>
                        <h5 class="container">
                            ข้อมูลรถ
                        </h5>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="CarNumber" class="form-label">เลขทะเบียน</label>
                                <input type="text" class="form-control" name="CarNumber" class="form-control"
                                    value="<?php echo e(Str::before($list->CarNumber, ' ')); ?>">
                                <?php $__errorArgs = ['CarNumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="my-1">
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-3">
                                <label for="CarCity" class="form-label">จังหวัด</label>
                                <select name="CarCity" class="form-select">
                                    <option selected><?php echo e($list->CarCity); ?></option>
                                    <?php $__currentLoopData = $prov; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option> <?php echo e($item->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['CarCity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="my-1">
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-3">
                                <label for="RegistrationDate" class="form-label">วันที่จดทะเบียน</label>
                                <input type="text" class="form-control datepicker" name="RegistrationDate" readonly
                                    class="form-control" value="<?php echo e($list->RegistrationDate); ?>">
                                <?php $__errorArgs = ['RegistrationDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="my-1">
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-3">
                                <label for="TaxHistoryDate" class="form-label">วันที่ต่อภาษีครั้งล่าสุด</label>
                                <input type="text" class="form-control datepicker" name="TaxHistoryDate" readonly
                                    class="form-control" value="<?php echo e($list->TaxHistoryDate); ?>">
                                <?php $__errorArgs = ['TaxHistoryDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="my-1">
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-3">
                                <label for="InsHistoryDate" class="form-label">วันที่ต่อ พ.ร.บ. ครั้งล่าสุด</label>
                                <input type="text" class="form-control datepicker" name="InsHistoryDate" readonly
                                    class="form-control" value="<?php echo e($list->InsHistoryDate); ?>">
                                <?php $__errorArgs = ['InsHistoryDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="my-1">
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-4">
                                <label for="InsuranceType" class="form-label">ประเภท พ.ร.บ.</label>
                                <select name="InsuranceType" class="form-select">
                                    <option selected><?php echo e($list->InsuranceType); ?></option>
                                    <?php $__currentLoopData = $sett['type']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option> <?php echo e($item->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['InsuranceType'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="my-1">
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-5">
                                <label for="TaxType" class="form-label">ประเภทภาษี</label>
                                <select name="TaxType" class="form-select">
                                    <option selected><?php echo e($list->TaxType); ?></option>
                                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option> <?php echo e($item->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['TaxType'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="my-1">
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-2">
                                <label for="CarCC" class="form-label">ขนาดกำลัง (CC)</label>
                                <input type="text" class="form-control" name="CarCC" class="form-control"
                                    value="<?php echo e($list->CarCC); ?>">
                                <?php $__errorArgs = ['CarCC'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="my-1">
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-2">
                                <label for="CarWeight" class="form-label">น้ำหนักรวม (ก.ก.)</label>
                                <input type="text" class="form-control" name="CarWeight" class="form-control"
                                    value="<?php echo e($list->CarWeight); ?>">
                                <?php $__errorArgs = ['CarWeight'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="my-1">
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-2">
                                <label for="SelectOption" class="form-label">การรับเอกสาร</label>
                                <select name="SelectOption" class="form-select">
                                    <option selected><?php echo e($list->SelectOption); ?></option>
                                    <option>มารับเอง</option>
                                    <option>จัดส่งตามที่อยู่</option>
                                </select>
                                <?php $__errorArgs = ['SelectOption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="my-1">
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-12">
                                <label for="singleFile" class="form-label">สำเนาเล่มทะเบียน</label>
                                <?php if(!empty($list->BookOwner)): ?>
                                    <input type="text" class="form-control"
                                        value="/upload/doc/<?php echo e($list->BookOwner); ?>" readonly>
                                <?php endif; ?>
                                <input type="file" class="form-control" name="singleFile">
                            </div>
                        </div>
                    </div>


                </div>
                <div class="errMsg">
                    <ul>
                        <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div class="container col-2 mx-auto">
                    <a href="javascript:history.back()" class="btn my-3" style="background-color:#9fdffa"> กลับ</a>
                    <input type="submit" value="บันทึก" class="btn my-3" style="background-color:#A4F02A">
                </div>
            </div>
        </form>
    </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\CS403\Code\enrichcar_system\resources\views/editInfo.blade.php ENDPATH**/ ?>