<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin-index.css">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <title><?php echo SITENAME; ?></title>
  <style>
    .featured {
      width: 100%;
      display: flex;
      justify-content: space-between;
      margin-top: 30px;
      margin-bottom: 30px;
    }



    .featuredItem {
      flex: 1;
      margin: 0px 20px;
      padding: 30px;
      border-radius: 10px;
      cursor: pointer;
      -webkit-box-shadow: 0px 0px 15px -10px rgba(0, 0, 0, 0.75);
      box-shadow: 0px 0px 15px -10px rgba(0, 0, 0, 0.75);
    }

    .featuredTitle {
      font-size: 20px;
    }

    .featuredMoneyContainer {
      margin: 10px 0px;
      display: flex;
      align-items: center;
    }

    .featuredMoney {
      font-size: 30px;
      font-weight: 600;
    }

    .featuredMoneyRate {
      display: flex;
      align-items: center;
      margin-left: 20px;
    }

    .featuredIcon {
      font-size: 14px;
      margin-left: 5px;
      color: green;
    }

    .featuredIcon.negative {
      color: red;
    }

    .featuredSub {
      font-size: 15px;
      color: gray;
    }

    .charts {
      display: flex;
      flex-direction: row;
    }
  </style>
</head>

<body>
  <div class="container_body">
    <div class="adminsidebar">
      <?php require APPROOT . '/views/inc/admin-sidebar.php'; ?>
    </div>
    <div class="right-component">
      <div class="featured">
        <div class="featuredItem">
          <span class="featuredTitle">Revanue</span>
          <div class="featuredMoneyContainer">
            <span class="featuredMoney">$2,415</span>
          </div>
          <span class="featuredSub">Compared to last month</span>
        </div>
        <div class="featuredItem">
          <span class="featuredTitle">Sales</span>
          <div class="featuredMoneyContainer">
            <span class="featuredMoney">$4,415</span>
          </div>
          <span class="featuredSub">Compared to last month</span>
        </div>
        <div class="featuredItem">
          <span class="featuredTitle">Users</span>
          <div class="featuredMoneyContainer">
            <span class="featuredMoney">500</span>
          </div>
          <span class="featuredSub">Compared to last month</span>
        </div>
      </div>
      <div class="charts">
        <div class="featuredItem">
          <canvas id="myChartServiceProvider" style="width:100%;max-width:600px"></canvas>
        </div>
        <div class="featuredItem">
          <canvas id="myChartUser" style="width:100%;max-width:600px"></canvas>
        </div>

      </div>
    </div>
  </div>

  <script>
    const xValues = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"];
    const yValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15, 4];

    new Chart("myChartServiceProvider", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{
          fill: false,
          lineTension: 0,
          backgroundColor: "rgba(0,0,255,1.0)",
          borderColor: "rgba(0,0,255,0.1)",
          data: yValues
        }]
      },
      options: {
        legend: {
          display: false
        },
        title: {
          display: true,
          text: "Service Providers Analytics"
        },
        scales: {
          yAxes: [{
            ticks: {
              min: 0,
              max: 20
            }
          }],
        }
      }
    });

    var xxValues = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"];
    var yyValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15, 11];
    var barColors = ["#B4D4FF", "#86B6F6", "#176B87", "#B4D4FF", "#86B6F6", "#176B87", "#B4D4FF", "#86B6F6", "#176B87", "#B4D4FF", "#86B6F6", "#176B87"];

    new Chart("myChartUser", {
      type: "bar",
      data: {
        labels: xxValues,
        datasets: [{
          backgroundColor: barColors,
          data: yyValues
        }]
      },
      options: {
        legend: {
          display: false
        },
        title: {
          display: true,
          text: "Users Analytics"
        }
      }
    });
  </script>



</body>

</html>