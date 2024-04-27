<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/mod-index.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/mod-graphs.css">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <title><?php echo SITENAME; ?></title>
</head>

<<body>
  <div class="container_body">
    <div class="adminsidebar">
      <?php require APPROOT . '/views/inc/admin-sidebar.php'; ?>
    </div>
    <div class="right-component">
      <div class="top">
        <h1>Status Report | <?php echo $data['admin_data']->admin_name; ?></h1>
          <div class="dashboard">
            <h2>Top Users - This Week</h2>
            <div class="containersologrid">
                <?php foreach ($data['user_data']['top5SpendingWeekly'] as $user) : ?>
                    <div class="containersolo">
                    <div class="tilesolo">
                        <img src="http://localhost/symphony/img/mag_img/<?php echo $user->profile_photo; ?>" alt="User Image">
                        <div><b>Name:</b> <?php echo $user->name; ?></div>
                        <div><b>Contact Number:</b> <?php echo $user->TelephoneNumber; ?></div>
                        <div><b>Weekly  Spending:</b> <?php echo $user->totalSpendingWeekly; ?>.00 LKR</div>
                        <button class="view-user" onclick="viewUser(<?php echo $user->id ?>)">View User</button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div><br><br>
            <h2>Top Users - This Month</h2>
            <div class="containersologrid">
                <?php foreach ($data['user_data']['top5SpendingMonthly'] as $user) : ?>
                    <div class="containersolo">
                    <div class="tilesolo">
                        <img src="http://localhost/symphony/img/mag_img/<?php echo $user->profile_photo; ?>" alt="User Image">
                        <div><b>Name:</b> <?php echo $user->name; ?></div>
                        <div><b>Contact Number:</b> <?php echo $user->TelephoneNumber; ?></div>
                        <div><b>Monthly  Spending:</b> <?php echo $user->totalSpendingMonthly; ?>.00 LKR</div>
                        <button class="view-user" onclick="viewUser(<?php echo $user->id ?>)">View User</button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div><br><br>
            <h2>Top Users - This Year</h2>
            <div class="containersologrid">
                <?php foreach ($data['user_data']['top5SpendingYearly'] as $user) : ?>
                    <div class="containersolo">
                    <div class="tilesolo">
                        <img src="http://localhost/symphony/img/mag_img/<?php echo $user->profile_photo; ?>" alt="User Image">
                        <div><b>Name:</b> <?php echo $user->name; ?></div>
                        <div><b>Contact Number:</b> <?php echo $user->TelephoneNumber; ?></div>
                        <div><b>Yearly  Spending:</b> <?php echo $user->totalSpendingYearly; ?>.00 LKR</div>
                        <button class="view-user" onclick="viewUser(<?php echo $user->id ?>)">View User</button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div><br><br>
            <h2>Top Service Providers - This Week</h2>
            <div class="containersologrid">
                <?php foreach ($data['sp_data']['top5RevenueWeekly'] as $serviceProvider) : ?>
                    <div class="containersolo">
                        <div class="tilesolo">
                            <img src="http://localhost/symphony/img/mag_img/<?php echo $serviceProvider->profile_photo; ?>" alt="Service Provider Image">
                            <div><b>Name:</b> <?php echo $serviceProvider->business_name; ?></div>
                            <div><b>Contact Number:</b> <?php echo $serviceProvider->business_contact_no; ?></div>
                            <div><b>Weekly Revenue:</b> <?php echo $serviceProvider->totalRevenueWeekly; ?>.00 LKR</div>
                            <button class="view-service-provider" onclick="viewServiceProvider(<?php echo $serviceProvider->serviceprovider_id  ?>)">View Service Provider</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div><br><br>

            <h2>Top Service Providers - This Month</h2>
            <div class="containersologrid">
                <?php foreach ($data['sp_data']['top5RevenueMonthly'] as $serviceProvider) : ?>
                    <div class="containersolo">
                        <div class="tilesolo">
                            <img src="http://localhost/symphony/img/mag_img/<?php echo $serviceProvider->profile_photo; ?>" alt="Service Provider Image">
                            <div><b>Name:</b> <?php echo $serviceProvider->business_name; ?></div>
                            <div><b>Contact Number:</b> <?php echo $serviceProvider->business_contact_no; ?></div>
                            <div><b>Monthly Revenue:</b> <?php echo $serviceProvider->totalRevenueMonthly; ?>.00 LKR</div>
                            <button class="view-service-provider" onclick="viewServiceProvider(<?php echo $serviceProvider->serviceprovider_id  ?>)">View Service Provider</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div><br><br>

            <h2>Top Service Providers - This Year</h2>
            <div class="containersologrid">
                <?php foreach ($data['sp_data']['top5RevenueYearly'] as $serviceProvider) : ?>
                    <div class="containersolo">
                        <div class="tilesolo">
                            <img src="http://localhost/symphony/img/mag_img/<?php echo $serviceProvider->profile_photo; ?>" alt="Service Provider Image">
                            <div><b>Name:</b> <?php echo $serviceProvider->business_name; ?></div>
                            <div><b>Contact Number:</b> <?php echo $serviceProvider->business_contact_no; ?></div>
                            <div><b>Yearly Revenue:</b> <?php echo $serviceProvider->totalRevenueYearly; ?>.00 LKR</div>
                            <button class="view-service-provider" onclick="viewServiceProvider(<?php echo $serviceProvider->serviceprovider_id  ?>)">View Service Provider</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div><br><br>

            </div>
      </div>
          <div class="graph">
              <div class="container" id="top">
                  <main class="grid-main">
                      <div class="grid-2" id="traffic">
                          <h2><u>Orders</u></h2><br>
                          <ul class="btn-chart">
                              <li class="li" id="hour">Last 24h</li>
                              <li class="li" id="day">Last Week</li>
                              <li class="li" id="week">Last 8 Weeks</li>
                              <li class="li" id="month">Last Year</li>
                          </ul>
                          <div class="chart-1" style="position: relative; height:221px; width:979px">
                              <canvas id="lineChart"></canvas>
                          </div>
                      </div>

                      <div class="grid-2" id="trafficR">
                          <h2><u>Revenue</u></h2><br>
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

      </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
  <script>

    // View User
    function viewUser(id) {
      window.location.href = "<?php echo URLROOT; ?>/administrators/viewuser/" + id;
    }

    // View Service Provider
    function viewServiceProvider(id) {
      window.location.href = "<?php echo URLROOT; ?>/administrators/viewserviceprovider/" + id;
    }
    // Chart Variables
  const hourChart = document.getElementById('hour');
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
      const datasetData = Object.values(data.last_8_weeks);
      
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
                      label: 'Orders',
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
  createInitialChart(<?php echo json_encode($data['orders']); ?>);
  

  hourChart.addEventListener('click', () => {
      const labels = [];
      const data = Object.values(<?php echo json_encode($data['orders']['last_24h']); ?>);

      const currentDate = new Date();

      for (let i = 23; i >= 0; i--) {
          const hour = (currentDate.getHours() - i + 24) % 24;
          labels.push(`${hour < 10 ? '0' : ''}${hour}:00`);
      }

      myChart.data.labels = labels;
      myChart.config.data.datasets[0].data = data;
      myChart.update();
  });

  dayChart.addEventListener('click', () => {
      const labels = [];
      const data = Object.values(<?php echo json_encode($data['orders']['last_week']); ?>);

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
      const data = Object.values(<?php echo json_encode($data['orders']['last_8_weeks']); ?>);

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
      const data = Object.values(<?php echo json_encode($data['orders']['last_year']); ?>);

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
      const datasetData = Object.values(data.last_8_weeks);
      
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
                      label: 'Revenue(LKR)',
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
  createInitialChartR(<?php echo json_encode($data['revenue']); ?>);
  

  hourChartR.addEventListener('click', () => {
      const labels = [];
      const data = Object.values(<?php echo json_encode($data['revenue']['last_24h']); ?>);

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
      const data = Object.values(<?php echo json_encode($data['revenue']['last_week']); ?>);

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
      const data = Object.values(<?php echo json_encode($data['revenue']['last_8_weeks']); ?>);

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
      const data = Object.values(<?php echo json_encode($data['revenue']['last_year']); ?>);

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
  </script>
  </body>
  </html>