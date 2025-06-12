<?php $__env->startSection('doc', 'Add'); ?>
<?php $__env->startSection('content'); ?>

    <h3 class="text-center">
        เพิ่มข้อมูล
    </h3>
    <div class="container py-4 ">
        <form method="POST" action="/insertInfo" id="addinfo" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row ms-auto justify-content-center">
                <div class="col-md-9">
                    <h5 class="container">
                        ข้อมูลลูกค้า
                    </h5>
                    <div class="row">
                        <div class="col-md-6 ">
                            <label for="CustomerName" class="form-label">ชื่อและนามสกุล</label>
                            <input type="text" class="form-control" name="CustomerName" value="<?php echo e(old('CustomerName')); ?>">
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
                            <input type="text" class="form-control" name="NationalID" value="<?php echo e(old('NationalID')); ?>">
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
                            <label for="PhoneNumber" class="form-label">เบอร์โทรศัพท์ (10 หลัก)</label>
                            <input type="text" class="form-control" name="PhoneNumber" value="<?php echo e(old('PhoneNumber')); ?>">
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
                            <label for="Address" class="form-label">ที่อยู่จัดส่ง</label>
                            <input type="text" class="form-control" name="Address" value="<?php echo e(old('Address')); ?>">
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
                                <input type="text" class="form-control" name="CarNumber" value="<?php echo e(old('CarNumber')); ?>">
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
                                    <option value="">เลือก...</option>
                                    <?php $__currentLoopData = $prov; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->name); ?>"
                                            <?php echo e(old('CarCity') == $item->name ? 'selected' : ''); ?>><?php echo e($item->name); ?>

                                        </option>
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
                                <input type="text" class="form-control datepicker" name="RegistrationDate"
                                    value="<?php echo e(old('RegistrationDate')); ?>" readonly>
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
                                <input type="text" class="form-control datepicker" name="TaxHistoryDate"
                                    value="<?php echo e(old('TaxHistoryDate')); ?>" readonly>
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
                                <input type="text" class="form-control datepicker" name="InsHistoryDate"
                                    value="<?php echo e(old('InsHistoryDate')); ?>" readonly>
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
                                    <option value="">เลือก...</option>
                                    <?php $__currentLoopData = $sett['type']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->name); ?>"
                                            <?php echo e(old('InsuranceType') == $item->name ? 'selected' : ''); ?>>
                                            <?php echo e($item->name); ?></option>
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
                                    <option value="">เลือก...</option>
                                    <?php $__currentLoopData = $tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->name); ?>"
                                            <?php echo e(old('TaxType') == $item->name ? 'selected' : ''); ?>><?php echo e($item->name); ?>

                                        </option>
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
                                <input type="text" class="form-control" name="CarCC" value="<?php echo e(old('CarCC')); ?>">
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
                                <input type="text" class="form-control" name="CarWeight"
                                    value="<?php echo e(old('CarWeight')); ?>">
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
                                    <option value="">เลือก...</option>
                                    <option value="มารับเอง" <?php echo e(old('SelectOption') == 'มารับเอง' ? 'selected' : ''); ?>>
                                        มารับเอง</option>
                                    <option value="จัดส่งตามที่อยู่"
                                        <?php echo e(old('SelectOption') == 'จัดส่งตามที่อยู่' ? 'selected' : ''); ?>>จัดส่งตามที่อยู่
                                    </option>
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
                                <input type="file" class="form-control" name="singleFile">
                            </div>
                        </div>

                        <div class="container col-2 mx-auto">
                            <a href="javascript:history.back()" class="btn my-3" style="background-color:#9fdffa">
                                กลับ</a>
                            <input type="submit" value="บันทึก" class="btn my-3" style="background-color:#A4F02A">
                        </div>
                    </div>
                </div>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            

            // ตรวจสอบวันที่ต่อภาษีและวันที่ต่อ พ.ร.บ.
            document.getElementById('addinfo').addEventListener('submit', function(event) {
                var registrationDate = new Date(document.querySelector('[name="RegistrationDate"]').value);
                var taxDate = new Date(document.querySelector('[name="TaxHistoryDate"]').value);
                var insDate = new Date(document.querySelector('[name="InsHistoryDate"]').value);

                // ตรวจสอบว่าทั้งสองวันที่ต้องมากกว่าวันที่จดทะเบียน
                if (taxDate <= registrationDate && insDate <= registrationDate) {
                    event.preventDefault(); // หยุดการส่งฟอร์ม
                    alert("วันที่ต่อภาษี และวันที่ต่อ พ.ร.บ. ต้องเป็นหลังวันที่จดทะเบียน");
                }
                else if (taxDate <= registrationDate) {
                    event.preventDefault(); // หยุดการส่งฟอร์ม
                    alert("วันที่ต่อภาษีต้องเป็นหลังวันที่จดทะเบียน");
                }
                else if (insDate <= registrationDate) {
                    event.preventDefault(); // หยุดการส่งฟอร์ม
                    alert("วันที่ต่อ พ.ร.บ. ต้องเป็นหลังวันที่จดทะเบียน");
                }

            });
            
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\project\Code\enrichcar_system_final\enrichcar_system\resources\views/add.blade.php ENDPATH**/ ?>