<?php $__env->startSection('doc', 'Infomationn'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="input-group mb-3">
            <form class="d-flex" method="POST" action="/addgeneral">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-lg-4">
                        <label for="">ประเภทข้อมูล</label>
                        <select name="sett[type]" id="SelectCategory" class="form-control">
                            <option value="">...เลือก...</option>
                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>"> <?php echo e($name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="">ชื่อ</label>
                        <input class="form-control text-center" name="sett[name]" type="text">
                    </div>
                    <div class="col-lg-2">
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
    <table class="table  table-grid">
        <thead class="text-center">
            <tr>
                <th scope="col" width="50">ลำดับ</th>
                <th scope="col">ประเภท</th>
                <th scope="col">ชื่อ</th>
                <th scope="col" width="50">ลบ</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($index+1); ?></td>
                    <td><?php echo e($types[$item->key]); ?></td>
                    <td><?php echo e($item->name); ?></td>
                    <td>
                        <a href="<?php echo e(route('deleteGeneral', $item->id)); ?>" class="btn btn-sm btn-outline-danger btn-del"
                           onclick="return confirm('คุณต้องการลบข้อมูลลำดับที่ <?php echo e($index+1); ?> <?php echo e($item->name); ?> หรือไม่ ?')">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function(){
        // ตั้งค่าค่าที่เลือกไว้ (ถ้ามี)
        $('#SelectCategory').val('<?php echo e($category); ?>')

        // เปลี่ยนหมวดแล้ว redirect
        $('#SelectCategory').change(function(){
            var category = $(this).val();
            if (category !== '') {
                $(location).attr("href", "/settings/general/" + category);
            }
        });

        // ตรวจสอบก่อน submit
        $('form').on('submit', function(e){
            var selected = $('#SelectCategory').val();
            if (!selected) {
                alert('โปรดเลือกประเภทรถก่อนบันทึก');
                e.preventDefault(); // ยกเลิก submit
            }
        });
    });
</script>

<style>
    table {
        width: 50%!important;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\project\Code\enrichcar_system_final\enrichcar_system\resources\views/setting_general.blade.php ENDPATH**/ ?>