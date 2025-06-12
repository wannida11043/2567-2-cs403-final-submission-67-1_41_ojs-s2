<?php $__env->startSection('doc', 'Check costs'); ?>
<?php $__env->startSection('content'); ?>
    <!-- แสดงข้อความ error หากมี -->
    <?php if(session('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>
    <div class="container my-5">
        <h3 class="text-center mb-4">ตรวจสอบค่าดำเนินการ</h3>
        <style>
            .disabled-btn {
                background-color: #d3d3d3 !important;
                cursor: not-allowed;
                border: none;
            }

            .disabled-btn:disabled {
                opacity: 0.6;
            }

            .card strong {
                font-weight: 300 !important;
            }

            .card strong.final-amount {
                font-weight: 700 !important;
            }
        </style>

        <div class="row justify-content-center mb-4">
            <div class="col-md-8">
                <?php if($data): ?>
                    <div class="card p-4 shadow-sm mx-auto" style="max-width: 500px;">
                        
                        
                        
                        

                        <?php if($sum_renew > 0): ?>
                            <div class="mb-3 d-flex justify-content-between">
                                <strong class fw-light>ค่า พ.ร.บ. (บาท) :</strong> <span
                                    class="text-end"><?php echo e(number_format($sum_renew, 2)); ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if(($InsIncome > 0) || ($TaxIncome > 0)): ?>
                            <div class="mb-3 d-flex justify-content-between">
                                <strong class fw-light>ค่าบริการ (บาท) :</strong>
                                <span class="text-end"><?php echo e(number_format($InsIncome + $TaxIncome, 2)); ?></span>
                            </div>
                        <?php endif; ?>


                        <?php if($sum_delivery > 0): ?>
                            <div class="mb-3 d-flex justify-content-between">
                                <strong class fw-light>ค่าจัดส่ง (บาท) :</strong> <span
                                    class="text-end"><?php echo e(number_format($sum_delivery, 2)); ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if($sum_tax > 0): ?>
                            <div class="mb-3 d-flex justify-content-between">
                                <strong class fw-light>ค่าภาษีก่อนลด (บาท) :</strong> <span
                                    class="text-end"><?php echo e(number_format($original_tax, 2)); ?></span>
                            </div>

                            <?php if($carYears >= 6): ?>
                                <div class="mb-3 d-flex justify-content-between">
                                    <strong class fw-light>ส่วนลดภาษี <?php echo e($discountPercent); ?>% (บาท) :</strong> <span
                                        class="text-end"><?php echo e(number_format($discountAmount, 2)); ?></span>
                                </div>
                            <?php endif; ?>

                            <div class="mb-3 d-flex justify-content-between">
                                <strong class fw-light>ค่าภาษีหลังลด (บาท) :</strong> <span
                                    class="text-end"><?php echo e(number_format($sum_tax, 2)); ?></span>
                            </div>
                        <?php endif; ?>

                        <div class="mb-3 d-flex justify-content-between">
                            <strong class="final-amount">ยอดเงินสุทธิ (บาท) :</strong>
                            <span class="text-end"><?php echo e(number_format($sum_cost, 2)); ?></span>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning text-center" role="alert">
                            ไม่มีข้อมูลลูกค้า
                        </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row d-flex justify-content-center gap-3">
            <div class="col-auto">
                <a href="javascript:history.back()" class="btn my-3" style="background-color:#9fdffa"> กลับ</a>
            </div>
            <div class="col-auto">
                <form action="<?php echo e(route('storeHistory', ['id' => $data->id])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="car_id" value="<?php echo e($data->id); ?>">
                    <input type="hidden" name="calculateTax" value="<?php echo e($calculateTax ? 1 : 0); ?>">
                    <input type="hidden" name="calculateRenew" value="<?php echo e($calculateRenew ? 1 : 0); ?>">
                    <input type="hidden" name="receive_option" value="<?php echo e($data->SelectOption); ?>">
                    <input type="hidden" name="total_cost" value="<?php echo e($sum_cost); ?>">
                    <input type="hidden" name="sum_renew" value="<?php echo e($sum_renew); ?>">
                    <input type="hidden" name="sum_tax" value="<?php echo e($sum_tax); ?>">
                    <input type="hidden" name="ins_income" value="<?php echo e($InsIncome); ?>">
                    <input type="hidden" name="tax_income" value="<?php echo e($TaxIncome); ?>">
                    <input type="hidden" name="sum_delivery" value="<?php echo e($sum_delivery); ?>">
                    <button type="submit" class="btn my-3 <?php echo e($sum_cost == 0 ? 'disabled-btn' : ''); ?>"
                        style="background-color:#A4F02A" <?php echo e($sum_cost == 0 ? 'disabled' : ''); ?>>ดำเนินการ</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\CS403\Code\enrichcar_system\resources\views/CheckCosts.blade.php ENDPATH**/ ?>