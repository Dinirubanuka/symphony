<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin-index.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title><?php echo SITENAME; ?></title>
</head>

<body>
<div class="container_body">
    <div class="adminsidebar">
        <?php require APPROOT . '/views/inc/admin-sidebar.php'; ?>
    </div>
    <div class="right-component">
        <div class="mod">
            <div class="mod-above">
                <h2>Sales Per Day</h2>
            </div>
            <div class="mod-below">
                <div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // const ctx = document.getElementById('myChart');

    salesData = <?php echo json_encode($data['sales']); ?>;

    labels = salesData.map(function(item) {
        return item.order_date;
    });

    chartData = salesData.map(function(item) {
        return item.total_per_day;
    });

    console.log(chartData);

    var ctx = document.getElementById('myChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Sales Dataset',
                data: chartData,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        }
    });

    //new Chart(ctx, {
    //    type: 'line',
    //    data: {
    //        labels: <?php //echo $data['sales']->order_date?>// ,
    //        datasets: [{
    //            label: 'My First Dataset',
    //            data: [65, 59, 80, 81, 56, 55, 40],
    //            fill: false,
    //            borderColor: 'rgb(75, 192, 192)',
    //            tension: 0.1
    //        }]
    //    }
    //});
</script>
</body>
</html>