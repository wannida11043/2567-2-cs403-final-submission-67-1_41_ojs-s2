

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>สรุปข้อมูล</h2>

        <!-- กราฟแท่ง 1: จำนวนรถที่ต่อ พ.ร.บ. -->
        <canvas id="insuranceChart" width="400" height="200"></canvas>

        <!-- กราฟแท่ง 2: จำนวนรถที่ต่อภาษี -->
        <canvas id="taxChart" width="400" height="200"></canvas>

        <!-- กราฟวงกลม: รายได้รวมจากการต่อ พ.ร.บ. และภาษี -->
        <canvas id="feeChart" width="400" height="200"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // กราฟแท่ง 1: จำนวนรถที่ต่อ พ.ร.บ.
        var ctx1 = document.getElementById('insuranceChart').getContext('2d');
        var insuranceChart = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($insuranceData->keys(), 15, 512) ?>, // ประเภทรถที่ต่อ พ.ร.บ. (ดึงจาก settings)
                datasets: [{
                    label: 'จำนวนรถ',
                    data: <?php echo json_encode($insuranceData->values(), 15, 512) ?>, // จำนวนรถ
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // กราฟแท่ง 2: จำนวนรถที่ต่อภาษี
        var ctx2 = document.getElementById('taxChart').getContext('2d');
        var taxChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($taxData->keys(), 15, 512) ?>, // ประเภทรถที่ต่อภาษี (ดึงจาก taxes)
                datasets: [{
                    label: 'จำนวนรถ',
                    data: <?php echo json_encode($taxData->values(), 15, 512) ?>, // จำนวนรถ
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // กราฟวงกลม: รายได้รวมจากการต่อ พ.ร.บ. และภาษี
        var ctx3 = document.getElementById('feeChart').getContext('2d');
        var feeChart = new Chart(ctx3, {
            type: 'pie',
            data: {
                labels: ['รายได้จาก พ.ร.บ.', 'รายได้จาก ภาษี'],
                datasets: [{
                    label: 'รายได้รวม',
                    data: [<?php echo json_encode($sumIns, 15, 512) ?>,
                        <?php echo json_encode($sumTax, 15, 512) ?>
                    ], // เปลี่ยนจาก $insPercent และ $taxPercent เป็น $sumIns และ $sumTax
                    backgroundColor: ['rgba(54, 162, 235, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                    borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)'],
                    borderWidth: 1
                }]
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\CS403\Code\enrichcar_system\resources\views/summary.blade.php ENDPATH**/ ?>