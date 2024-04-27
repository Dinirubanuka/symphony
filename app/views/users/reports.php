<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <!-- <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/> -->
    <title>Reports</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/mod-index.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/user-box.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/mod-graphs.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/nav-bar.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin-stat.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
</head>
<body>
<!------------nav-bar-------->
<?php require_once APPROOT . '/views/inc/user-orders-nav.php'; ?>
<div class="main-grid-reports">
    <div class="graph">
        <div class="container" id="top">
            <main class="grid-main">
                <div class="grid-2" id="traffic">
                    <h2><u>Spending</u></h2><br>
                    <ul class="btn-chart">
                        <li class="li" id="day">Last Week</li>
                        <li class="li" id="week">Last 8 Weeks</li>
                        <li class="li" id="month">Last Year</li>
                    </ul>
                    <div class="chart-1" style="position: relative; height:221px; width:979px">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>

                <div class="grid-2" id="trafficR">
                    <h2><u>Activity</u></h2><br>
                    <ul class="btn-chart">
                        <li class="li" id="hourR">Last 24h</li>
                        <li class="li" id="dayR">Last Week</li>
                        <li class="li" id="weekR">Last 8 Weeks</li>
                        <li class="li" id="monthR">Last Year</li>
                    </ul>
                    <div class="chart-1" style="position: relative; height:221px; width:979px">
                        <canvas id="lineChartR"></canvas>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <div class="user-info-box">
        <div class="user-avatar">
            <!-- User avatar image goes here -->
            <img src="<?php echo URLROOT; ?>/img/mag_img/<?php echo $data['user']->profile_photo; ?>" alt="User Avatar">
        </div>
        <div class="user-details">
            <h2><?php echo $data['user']->name; ?></h2><br>
            <ul>
                <li><strong>Lifetime Spending(LKR):</strong> <?php echo  $data['lifetimeSpending'] ?>.00 </li><br>
                <li><strong>Lifetime Orders:</strong> <?php echo $data['lifetimeOrders'] ?></li><br>
                <li><strong>Lifetime Reviews:</strong> <?php echo $data['lifetimeReviews'] ?></li><br>
            </ul>
            <br><h1>Report Generation</h1>
            <form id="reportForm" action="<?php echo URLROOT; ?>/users/generateReports" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="fromDate">From:</label>
                <input type="date" id="fromDate" name="fromDate" required>
            </div>
            <div class="form-group">
                <label for="toDate">To:</label>
                <input type="date" id="toDate" name="toDate" disabled required>
            </div>
            <div class="form-group">
                <label for="selection">Report type Selection:</label>
                <select id="timeSlot" name="selection" required>
                <option value="byOrder">By Order</option>
                <option value="byDay">By Day</option>
                <option value="byWeek">By Week</option>
                <option value="byMonth">By Month</option>
                <option value="byYear">By Year</option>
                </select>
            </div>
            <button type="submit" id="submitButton">Submit</button>
            </form>
            <button id="printButton" <?php echo ($data['data'] === 'NA') ? 'style="display: none;"' : ''; ?>>Print PDF</button>

        </div>
    </div>
</div>
<div id="users" class="tabcontent" <?php echo ($data['data'] === 'NA') ? 'style="display: none;"' : ''; ?>>
<h2>Revenue reports from <?php echo $data['from_date']; ?> to <?php echo $data['to_date']; ?></h2>
            <table class="data-table">
                <?php if ($data['type'] != 'Order') : ?>
                <tr>
                    <th><?php echo $data['type']; ?></th>
                    <th>Revenue(LKR)</th>
                </tr>
                <?php foreach ($data['datalist'] as $key => $value) : ?>
                <tr class="data-table-tr">
                    <td><?php echo $key; ?></td>
                    <td><?php echo $value; ?>.00</td>
                </tr>
                <?php endforeach; ?>
                <?php else : ?>
                <tr>
                    <th><?php echo $data['type']; ?></th>
                    <th>User ID</th>
                    <th>Service Provider ID</th>
                    <th>Product Type/ID</th>
                    <th>Quantity</th>
                    <th>Revenue(LKR)</th>
                </tr>
                <?php foreach ($data['datalist'] as $value) : ?>
                <tr class="data-table-tr">
                    <td><?php echo $value->sorder_id ; ?></td>
                    <td><?php echo $value->user_id; ?></td>
                    <td><?php echo $value->serviceprovider_id; ?></td>
                    <td><?php echo $value->type; ?> - <?php echo $value->product_id; ?></td>
                    <td><?php echo $value->qty; ?></td>
                    <td><?php echo $value->total; ?>.00</td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </table>
            </div>
    </div>
<script src="https://kit.fontawesome.com/3376ff6b83.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
<script>

document.addEventListener('DOMContentLoaded', function() {
  const fromDateInput = document.getElementById('fromDate');
  const toDateInput = document.getElementById('toDate');
  const timeSlotSelect = document.getElementById('timeSlot');

  fromDateInput.addEventListener('change', function() {
    toDateInput.disabled = false;
    toDateInput.min = fromDateInput.value;
  });

  toDateInput.addEventListener('change', function() {
    timeSlotSelect.disabled = false;
  });

  timeSlotSelect.addEventListener('change', function() {
    submitButton.disabled = false;
  });

});

  const dayChart = document.getElementById('day');
  const weekChart = document.getElementById('week');
  const monthChart = document.getElementById('month');
  const chartButtons = document.querySelectorAll('.li');

  // Chart Buttons, change color when selected
  chartButtons.forEach(function (btn) {
      weekChart.classList.add('liSelected');
      btn.addEventListener('click', function () {
          chartButtons.forEach(function (btn) {
              btn.classList.remove('liSelected');
          });
          this.classList.add('liSelected');
      });
  });

  // Global chart defaults
  Chart.defaults.global.responsive = true;
  Chart.defaults.global.maintainAspectRatio = false;
  Chart.defaults.scale.ticks.beginAtZero = true;
  Chart.defaults.global.legend.display = false;
  Chart.defaults.global.defaultFontFamily = 'Ubuntu';
  Chart.defaults.global.defaultFontSize = 12;
  Chart.defaults.global.defaultFontColor = '#9e9e9e';

  // LINE CHARTS
  let myChart; // Declare myChart globally

  // Function to create the initial chart with last 8 weeks data
  // Function to create the initial chart with last 8 weeks data
  function createInitialChart(data) {
      const lineChart = document.getElementById('lineChart');

      const labels = [];
      const datasetData = Object.values(data.count_8weeks);
      
      const currentDate = new Date();
      currentDate.setDate(currentDate.getDate() - 1);

      for (let i = 8; i >= 1; i--) {
          const startOfWeek = new Date(currentDate);
          startOfWeek.setDate(startOfWeek.getDate() - (7 * i));
          const endOfWeek = new Date(currentDate);
          endOfWeek.setDate(endOfWeek.getDate() - (7 * (i - 1)));
          labels.push(`${getMonthName(startOfWeek.getMonth())}-${formatWeekNumber(startOfWeek)} to ${formatWeekNumber(endOfWeek)}`);
      }

      myChart = new Chart(lineChart, {
          type: 'line',
          data: {
              labels: labels, // Reverse the labels
              datasets: [
                  {
                      label: 'Spending(LKR)',
                      data: datasetData,
                      backgroundColor: 'rgba(206, 147, 216, 0.4)',
                      borderColor: '#4A148C',
                      borderWidth: 1.5,
                      pointBorderWidth: 1.8,
                      pointBackgroundColor: '#fff',
                      pointHoverBackgroundColor: '#e7e8f9',
                      pointRadius: 5,
                      lineTension: 0,
                  }
              ]
          },
      });
  }

  createInitialChart(<?php echo json_encode($data['spending']); ?>);


  dayChart.addEventListener('click', () => {
      const labels = [];
      const data = Object.values(<?php echo json_encode($data['spending']['count_week']); ?>);

      const currentDate = new Date();

      for (let i = 6; i >= 0; i--) {
          const day = (currentDate.getDay() - i + 7) % 7;
          labels.push(getDayName(day));
      }

      myChart.data.labels = labels;
      myChart.config.data.datasets[0].data = data;
      myChart.update();
  });

  weekChart.addEventListener('click', () => {
      const labels = [];
      const data = Object.values(<?php echo json_encode($data['spending']['count_8weeks']); ?>);

      const currentDate = new Date();
      currentDate.setDate(currentDate.getDate() - 1);

      for (let i = 8; i >= 1; i--) {
          const startOfWeek = new Date(currentDate);
          startOfWeek.setDate(startOfWeek.getDate() - (7 * i));
          const endOfWeek = new Date(currentDate);
          endOfWeek.setDate(endOfWeek.getDate() - (7 * (i - 1)));
          labels.push(`${getMonthName(startOfWeek.getMonth())}-${formatWeekNumber(startOfWeek)} to ${formatWeekNumber(endOfWeek)}`);
      }

      myChart.data.labels = labels;
      myChart.config.data.datasets[0].data = data;
      myChart.update();
  });

  monthChart.addEventListener('click', () => {
      const labels = [];
      const data = Object.values(<?php echo json_encode($data['spending']['count_year']); ?>);

      const currentDate = new Date();
      const currentMonth = currentDate.getMonth();
      const currentYear = currentDate.getFullYear();

      for (let i = 11; i >= 0; i--) {
          const month = (currentMonth - i + 12) % 12;
          const year = (currentMonth - i) < 0 ? currentYear - 1 : currentYear;
          labels.push(`${getMonthName(month)}-${year}`);
      }

      myChart.data.labels = labels;
      myChart.config.data.datasets[0].data = data;
      myChart.update();
  });


  const hourChartR = document.getElementById('hourR');
  const dayChartR = document.getElementById('dayR');
  const weekChartR = document.getElementById('weekR');
  const monthChartR = document.getElementById('monthR');
  const chartButtonsR = document.querySelectorAll('.li');

  // Chart Buttons, change color when selected
  chartButtonsR.forEach(function (btn) {
      weekChartR.classList.add('liSelected');
      btn.addEventListener('click', function () {
          chartButtonsR.forEach(function (btn) {
              btn.classList.remove('liSelected');
          });
          this.classList.add('liSelected');
      });
  });
  // LINE CHARTS
  let myChartR; // Declare myChart globally

  // Function to create the initial chart with last 8 weeks data
  // Function to create the initial chart with last 8 weeks data
  function createInitialChartR(data) {
      const lineChartR = document.getElementById('lineChartR');

      const labels = [];
      const datasetData = Object.values(data.activity_8weeks);
      
      const currentDate = new Date();
      currentDate.setDate(currentDate.getDate() - 1);

      for (let i = 8; i >= 1; i--) {
          const startOfWeek = new Date(currentDate);
          startOfWeek.setDate(startOfWeek.getDate() - (7 * i));
          const endOfWeek = new Date(currentDate);
          endOfWeek.setDate(endOfWeek.getDate() - (7 * (i - 1)));
          labels.push(`${getMonthName(startOfWeek.getMonth())}-${formatWeekNumber(startOfWeek)} to ${formatWeekNumber(endOfWeek)}`);
      }

      myChartR = new Chart(lineChartR, {
          type: 'line',
          data: {
              labels: labels, // Reverse the labels
              datasets: [
                  {
                      label: 'Activity',
                      data: datasetData,
                      backgroundColor: 'rgba(206, 147, 216, 0.4)',
                      borderColor: '#4A148C',
                      borderWidth: 1.5,
                      pointBorderWidth: 1.8,
                      pointBackgroundColor: '#fff',
                      pointHoverBackgroundColor: '#e7e8f9',
                      pointRadius: 5,
                      lineTension: 0,
                  }
              ]
          },
      });
  }

  // Call the function to create the initial chart
  createInitialChartR(<?php echo json_encode($data['activityUser']); ?>);

  hourChartR.addEventListener('click', () => {
      const labels = [];
      const data = Object.values(<?php echo json_encode($data['activityUser']['activity_24h']); ?>);

      const currentDate = new Date();

      for (let i = 23; i >= 0; i--) {
          const hour = (currentDate.getHours() - i + 24) % 24;
          labels.push(`${hour < 10 ? '0' : ''}${hour}:00`);
      }

      myChartR.data.labels = labels;
      myChartR.config.data.datasets[0].data = data;
      myChartR.update();
  });

  dayChartR.addEventListener('click', () => {
      const labels = [];
      const data = Object.values(<?php echo json_encode($data['activityUser']['activity_week']); ?>);

      const currentDate = new Date();

      for (let i = 6; i >= 0; i--) {
          const day = (currentDate.getDay() - i + 7) % 7;
          labels.push(getDayName(day));
      }

      myChartR.data.labels = labels;
      myChartR.config.data.datasets[0].data = data;
      myChartR.update();
  });

  weekChartR.addEventListener('click', () => {
      const labels = [];
      const data = Object.values(<?php echo json_encode($data['activityUser']['activity_8weeks']); ?>);

      const currentDate = new Date();
      currentDate.setDate(currentDate.getDate() - 1);

      for (let i = 8; i >= 1; i--) {
          const startOfWeek = new Date(currentDate);
          startOfWeek.setDate(startOfWeek.getDate() - (7 * i));
          const endOfWeek = new Date(currentDate);
          endOfWeek.setDate(endOfWeek.getDate() - (7 * (i - 1)));
          labels.push(`${getMonthName(startOfWeek.getMonth())}-${formatWeekNumber(startOfWeek)} to ${formatWeekNumber(endOfWeek)}`);
      }

      myChartR.data.labels = labels;
      myChartR.config.data.datasets[0].data = data;
      myChartR.update();
  });

  monthChartR.addEventListener('click', () => {
      const labels = [];
      const data = Object.values(<?php echo json_encode($data['activityUser']['activity_year']); ?>);

      const currentDate = new Date();
      const currentMonth = currentDate.getMonth();
      const currentYear = currentDate.getFullYear();

      for (let i = 11; i >= 0; i--) {
          const month = (currentMonth - i + 12) % 12;
          const year = (currentMonth - i) < 0 ? currentYear - 1 : currentYear;
          labels.push(`${getMonthName(month)}-${year}`);
      }

      myChartR.data.labels = labels;
      myChartR.config.data.datasets[0].data = data;
      myChartR.update();
  });

  function getDayName(day) {
      const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat'];
      return days[day];
  }

  function getMonthName(month) {
      const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
      return months[month];
  }

  function formatWeekNumber(date) {
      const weekNumber = getISOWeek(date);
      return weekNumber < 10 ? `0${weekNumber}` : weekNumber.toString();
  }

  function getISOWeek(date) {
      const d = new Date(date);
      d.setHours(0, 0, 0, 0);
      d.setDate(d.getDate() + 4 - (d.getDay() || 7));
      const yearStart = new Date(d.getFullYear(), 0, 1);
      return Math.ceil((((d - yearStart) / 86400000) + 1) / 7);
  }

  var stats_counter = function() {
    if($('.counter').length > 0) { 
      function increment($this, speed){
        var current = parseInt($this.html(), 10);
        $this.html(++current);
        if(current !== $this.data('to')){
          setTimeout(function(){increment($this, speed)}, speed);
        }
      }  
      $('.counter').each(function(index) {
        increment($(this), parseInt($(this).data('speed')));
      });
    }
  }
  stats_counter();


document.addEventListener('DOMContentLoaded', function() {
  const printButton = document.getElementById('printButton');

  printButton.addEventListener('click', function() {
    // Get the HTML content of the table
    const tableContent = document.getElementById('users').innerHTML;

    // Create a hidden iframe
    const iframe = document.createElement('iframe');
    iframe.style.display = 'none';
    document.body.appendChild(iframe);

    // Open a new window inside the iframe
    const printWindow = iframe.contentWindow;

    // Write the HTML content to the new window
    printWindow.document.write('<html><head>');
    printWindow.document.write('<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/mod-index.css">');
    printWindow.document.write('<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin-stat.css">');
    printWindow.document.write('</head><body>');
    printWindow.document.write(tableContent);
    printWindow.document.write('</body></html>');

    // Close the document after writing
    printWindow.document.close();

    // Print the content
    printWindow.print();
  });
});

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/instrument.js"></script>
</body>
</html>