<?php $__env->startSection('doc', 'Show Information'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container py-5">
        <h3 class="text-center mb-4 display-6 ">ต่อ พ.ร.บ. / ต่อภาษี</h3>

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card mb-4" style="border-color: #F7CBC7;">
                    <div class="card-header text-center rounded-top" style="background-color: #F7CBC7;">
                        <h5 class="mb-0">ข้อมูลลูกค้า</h5>
                    </div>
                    <div class="card-body">
                        <?php if($list): ?>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="CustomerName" class="form-label fw-bold">ชื่อและนามสกุล:</label>
                                    <p class="form-text"><?php echo e($list->CustomerName); ?></p>
                                </div>
                                <div class="col-md-6">
                                    <label for="NationalID" class="form-label fw-bold">เลขบัตรประชาชน:</label>
                                    <p class="form-text"><?php echo e($list->NationalID); ?></p>
                                </div>
                                <div class="col-md-6">
                                    <label for="PhoneNumber" class="form-label fw-bold">เบอร์โทร:</label>
                                    <p class="form-text"><?php echo e($list->PhoneNumber); ?></p>
                                </div>
                                <div class="col-md-6">
                                    <label for="Address" class="form-label fw-bold">ที่อยู่ปัจจุบัน:</label>
                                    <p class="form-text"><?php echo e($list->Address); ?></p>
                                </div>
                            </div>
                        <?php else: ?>
                            <p class="text-center text-danger fw-bold">ไม่มีข้อมูลลูกค้า</p>
                        <?php endif; ?>
                    </div>
                </div>


                <div class="card mb-4" style="border-color: #F7CBC7;">
                    <div class="card-header text-center rounded-top" style="background-color: #F7CBC7;">
                        <h5 class="mb-0">ข้อมูลรถ</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            <?php if($list->BookOwner): ?>
                                <img src="/upload/doc/<?php echo e($list->BookOwner); ?>" alt="Image"
                                    class="img-fluid rounded shadow-sm" style="max-width: 100%; height: auto;">
                            <?php else: ?>
                                <p class="text-center text-danger fw-bold">ไม่มีข้อมูลรถ</p>
                            <?php endif; ?>
                            
                            <div class="col-md-6">
                                <label for="total_year" class="form-label fw-bold">อายุรถ:</label>
                                <label class="form-label"><?php echo e($carYears); ?> ปี</label>
                            </div>

                            <div class="col-md-6">
                                
                                
                                
                                <label for="SelectOption" class="form-label fw-bold">การรับเอกสาร :</label>
                                <label class="form-label"><?php echo e($list->SelectOption); ?></label>
                                

                            </div>
                            <div class="col-md-6">
                                <label for="TaxHistoryDate" class="form-label fw-bold"> ต่อภาษีครั้งล่าสุด:</label>
                                <label class="form-label">
                                    <?php echo e(\Carbon\Carbon::parse($list->TaxHistoryDate)->format('d/m/Y')); ?>

                                </label>
                            </div>
                            <div class="col-md-6">
                                <label for="InsHistoryDate" class="form-label fw-bold">ต่อ พรบ. ครั้งล่าสุด:</label>
                                <label class="form-label">
                                    <?php echo e(\Carbon\Carbon::parse($list->InsHistoryDate)->format('d/m/Y')); ?>

                                </label>
                            </div>

                        </div>
                    </div>
                </div>
                <form action="<?php echo e(route('CheckCosts', ['id' => $list->id])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($list->id); ?>">

                    <div class="container">
                        <div class="row">
                            <div class="form-check form-check col-md-3 offset-md-10">
                                <input type="checkbox" name="renew_prb" value="1"
                                    <?php if($list->days_ins > 90): ?> disabled <?php endif; ?>> ต่อ พ.ร.บ.
                            </div>
                            <div class="form-check form-check col-md-3 offset-md-10">
                                <input type="checkbox" name="renew_tax" value="1"
                                    <?php if($list->days > 90): ?> disabled <?php endif; ?>> ต่อภาษี
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="javascript:history.back()" class="btn my-3" style="background-color:#9fdffa"> กลับ</a>
                        <a href="<?php echo e(route('editInfo', ['id' => $list->id])); ?>" class="btn my-3"
                            style="background-color:#F0DF2A">แก้ไข</a>
                        <button type="submit" class="btn my-3" style="background-color:#A4F02A">ดำเนินการ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let daysIns = Number("<?php echo e($list->days_ins ?? 0); ?>"); // ถ้าเป็น null จะใช้ 0
            let daysTax = Number("<?php echo e($list->days ?? 0); ?>"); // ถ้าเป็น null จะใช้ 0

            let renewPrb = document.querySelector('input[name="renew_prb"]');
            let renewTax = document.querySelector('input[name="renew_tax"]');
            let submitBtn = document.querySelector('button[type="submit"]');

            // ตรวจสอบเงื่อนไขว่าเหลือวันมากกว่า 90 หรือไม่
            if (renewPrb && daysIns <= 90) {
                renewPrb.disabled = false; // ถ้าเหลือวันน้อยกว่าหรือเท่ากับ 90 ให้เปิดใช้งาน
            } else {
                renewPrb.disabled = true; // ถ้าเหลือวันมากกว่า 90 ให้ปิดใช้งาน
            }

            if (renewTax && daysTax <= 90) {
                renewTax.disabled = false; // ถ้าเหลือวันน้อยกว่าหรือเท่ากับ 90 ให้เปิดใช้งาน
            } else {
                renewTax.disabled = true; // ถ้าเหลือวันมากกว่า 90 ให้ปิดใช้งาน
            }

            // ฟังก์ชันในการเช็คสถานะของ checkbox
            function checkCheckboxStatus() {
                if (!renewPrb.checked && !renewTax.checked || renewPrb.disabled && renewTax.disabled) {
                    submitBtn.disabled = true; // ปิดปุ่มเมื่อไม่มีการติ๊ก
                    submitBtn.style.backgroundColor = '#ccc'; // เปลี่ยนสีปุ่มให้ทึบ
                } else {
                    submitBtn.disabled = false; // เปิดปุ่มเมื่อมีการติ๊ก
                    submitBtn.style.backgroundColor = '#A4F02A'; // เปลี่ยนสีปุ่มให้เป็นปกติ
                }
            }

            // ตรวจสอบสถานะเมื่อเริ่มโหลด
            checkCheckboxStatus();

            // เชื่อมโยงฟังก์ชันกับการเปลี่ยนแปลงของ checkbox
            renewPrb.addEventListener('change', checkCheckboxStatus);
            renewTax.addEventListener('change', checkCheckboxStatus);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\CS403\Code\enrichcar_system\resources\views/infomation.blade.php ENDPATH**/ ?>