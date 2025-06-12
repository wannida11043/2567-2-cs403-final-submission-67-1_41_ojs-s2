<?php $__env->startSection('doc', 'Infomationn'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="input-group mb-3">
            <form class="d-flex" method="POST" action="/addcost" id="costForm">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <label for="">ประเภทรถ</label>
                        <select name="cost[type]" class="form-control" id="carTypeSelect">
                            <option value="" selected>เลือกประเภทรถ...</option>
                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>"> <?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-lg col-md-3">
                        <label for="">ค่าต่อพ.ร.บ. (บาท)</label>
                        <input class="form-control text-center" name="cost[renew]" type="number" >
                    </div>
                    <div class="col-lg col-md-3">
                        <label for="">อัตราค่าบริการ (บาท)</label>
                        <input class="form-control text-center" name="cost[service]" type="number" >
                    </div>
                    <div class="col-lg col-md">
                        <label for="">ค่าจัดส่ง (บาท)</label>
                        <input class="form-control text-center" name="cost[deliver]" type="number" >
                    </div>
                    <div class="col-lg col-md">
                        <label for="">&nbsp;</label>
                        <div>
                            <input type="submit" value="บันทึก" class="btn" style="background-color:#A4F02A">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <hr>

    <table class="table table-grid">
        <thead class="text-center">
            <tr>
                <th scope="col">ลำดับ</th>
                <th scope="col">ประเภทรถ</th>
                <th scope="col">ค่าต่อ พ.ร.บ.</th>
                <th scope="col">ค่าบริการ</th>
                <th scope="col">ค่าจัดส่ง</th>
                <th scope="col" width="60">ลบ</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $costs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="text-center">
                    <td><?php echo e($index+1); ?></td>
                    <td class="text-start"><?php echo e($item->name); ?></td>
                    <td><?php echo e($item->renew_cost); ?></td>
                    <td><?php echo e($item->fee); ?></td>
                    <td><?php echo e($item->delivery_cost); ?></td>
                    <td>
                        <a href="<?php echo e(route('deleteCost', $item->id)); ?>" class="btn btn-outline-danger"
                            onclick="return confirm('คุณต้องการลบข้อมูลลำดับที่ <?php echo e($index+1); ?> <?php echo e($item->name); ?> หรือไม่ ?')">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('costForm');
            const typeSelect = document.getElementById('carTypeSelect');
    
            form.addEventListener('submit', function (e) {
                const renew = form.querySelector('input[name="cost[renew]"]').value.trim();
                const service = form.querySelector('input[name="cost[service]"]').value.trim();
                const deliver = form.querySelector('input[name="cost[deliver]"]').value.trim();
    
                if (typeSelect.value === '') {
                    e.preventDefault();
                    alert('กรุณาเลือกประเภทรถ');
                    return;
                }
    
                if (renew === '' || service === '' || deliver === '') {
                    e.preventDefault();
                    alert('กรุณากรอกข้อมูลให้ครบถ้วน');
                }
            });
        });
    </script>    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\CS403\Code\enrichcar_system\resources\views/setting_cost.blade.php ENDPATH**/ ?>