<?php $__env->startSection('doc', 'receive'); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-2 ">
            <label for="CustomerName" class="form-label fs-5">ประวัติการดำเนินการ</label>
        </div>
        <form class="d-flex col-md-2" role="search">
            <input id="searchInput" class="form-control me-2" type="search" placeholder="ค้นหาเลขทะเบียน...">
        </form>

    </div>
    <hr>
    <table class="table table-grid">
        <thead class="text-center">
            <tr>
                <th>ทะเบียนรถ</th>
                <th>ชื่อ</th>
                <th>เบอร์โทร</th>
                <th>สถานะ</th>
                <th>หลักฐาน</th>
                <th>วันที่บันทึก</th>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->CarNumber); ?></td>
                    <td><?php echo e($item->CustomerName); ?></td>
                    <td><?php echo e($item->PhoneNumber); ?></td>
                    <td
                        style="color: <?php echo e($item->SelectOption == 'จัดส่งตามที่อยู่' ? '#FF0000' : ($item->SelectOption == 'มารับเอง' ? '#424ddf' : '')); ?>">
                        <?php echo e($item->SelectOption); ?>

                    </td>
                    <form action="<?php echo e(route('history.update', $item->history_id)); ?>" method="POST"
                        enctype="multipart/form-data" id="form-<?php echo e($item->history_id); ?>">
                        <?php echo csrf_field(); ?>
                        <td>
                            <?php if($item->SelectOption == 'จัดส่งตามที่อยู่'): ?>
                                <input type="text" class="form-control" name="ProofOfReceive"
                                    value="<?php echo e(old('ProofOfReceive', $item->ProofOfReceive)); ?>"
                                    placeholder="กรุณากรอกเลขพัสดุ" id="proof-<?php echo e($item->history_id); ?>"
                                    <?php echo e(!empty($item->ProofOfReceive) ? 'disabled' : ''); ?>>
                            <?php elseif($item->SelectOption == 'มารับเอง'): ?>
                                <?php if(!empty($item->ProofOfReceive)): ?>
                                    <input type="file" class="form-control mt-2" name="ProofOfReceive"
                                        id="proof-<?php echo e($item->history_id); ?>"
                                        <?php echo e(!empty($item->ProofOfReceive) ? 'disabled' : ''); ?>>
                                    <a href="<?php echo e(asset('public/proofs/' . $item->ProofOfReceive)); ?>"
                                        class="btn btn-info btn-sm mt-2" style="background-color: #A2D7FF; border: none;"
                                        download>
                                        ดาวน์โหลด
                                    </a>
                                    <span class="mt-2"><?php echo e($item->ProofOfReceive); ?></span>
                                <?php else: ?>
                                    <input type="file" class="form-control" name="ProofOfReceive"
                                        id="proof-<?php echo e($item->history_id); ?>">
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <span style="display: block;">
                                <?php echo e(!empty($item->ProofOfReceive) ? \Carbon\Carbon::parse($item->updated_at)->format('d/m/Y') : ''); ?>

                            </span>
                            <span>
                                <?php echo e(!empty($item->ProofOfReceive) ? \Carbon\Carbon::parse($item->updated_at)->format('H:i') : ''); ?>

                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <button type="submit" class="btn btn-light btn-sm save-btn"
                                    id="submit-btn-<?php echo e($item->history_id); ?>"
                                    style="background-color: <?php echo e(!empty($item->ProofOfReceive) ? '#ccc' : '#A4F02A'); ?>"
                                    <?php echo e(!empty($item->ProofOfReceive) ? 'disabled' : ''); ?>>
                                    บันทึก
                                </button>
                                <button type="button" class="btn btn-warning btn-sm edit-btn"
                                    data-id="<?php echo e($item->history_id); ?>"
                                    style="background-color: <?php echo e(!empty($item->ProofOfReceive) ? '#F9D74E' : '#ccc'); ?>; border: none;"
                                    <?php echo e(empty($item->ProofOfReceive) ? 'disabled' : ''); ?>>
                                    แก้ไข
                                </button>
                            </div>
                        </td>
                    </form>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#searchInput").on("keyup", function() {
                let value = $(this).val().toLowerCase();
                $("table tbody tr").filter(function() {
                    $(this).toggle($(this).find("td:nth-child(1)").text().toLowerCase()
                        .indexOf(value) > -1);
                });
            });
        });
        $(document).ready(function() {
            $('form').submit(function(event) {
                var form = $(this);
                var proofInput = form.find('input[name="ProofOfReceive"]');
                var submitButton = form.find('.save-btn');
                var proofValue = proofInput.val().trim();

                if (!proofValue) {
                    alert('กรุณากรอกข้อมูลหลักฐานก่อน');
                    event.preventDefault();
                    return false;
                }

                submitButton.prop('disabled', true).css('background-color', '#ccc');
                proofInput.prop('disabled', true).css('background-color', '#f0f0f0');
                var editButton = form.find('.edit-btn');
                editButton.prop('disabled', true).css('background-color', '#ccc');
            });

            $('.edit-btn').click(function() {
                var row = $(this).closest('tr');
                var submitButton = row.find('.save-btn');
                var proofInput = row.find('input[name="ProofOfReceive"]');
                var editButton = row.find('.edit-btn');

                submitButton.prop('disabled', false).css('background-color', '#A4F02A');
                proofInput.prop('disabled', false).css('background-color', '#ffffff');
                editButton.prop('disabled', false).css('background-color', '#F9D74E');
            });

        });
    </script>

<?php $__env->stopSection(); ?>

<?php if(session('success')): ?>
    <script>
        alert('บันทึกเรียบร้อยแล้ว');
    </script>
<?php endif; ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\project\Code\enrichcar_system_final\enrichcar_system\resources\views/receive.blade.php ENDPATH**/ ?>