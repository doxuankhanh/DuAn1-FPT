<?php require_once "./app/Views/admin/layout/Components/header.php";?>
<!DOCTYPE html>
<html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<body>
    <div id="myChart" style="width:100%; height:658px;">
    </div>

    <script>
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['cateName', 'sumPro'],
                <?php
                foreach ($data['statistical'] as $val) {
                    echo "['".$val['cateName']."',".$val['sumPro']."],";
                } ?>
            ]);

            var options = {
                title: 'Thống Kê Sản Phẩm',
                is3D: true
            };

            var chart = new google.visualization.PieChart(document.getElementById('myChart'));
            chart.draw(data, options);
        }
    </script>

</body>

</html>
<?php require_once "./app/Views/admin/layout/Components/footer.php";?>
