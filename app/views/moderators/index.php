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
      <?php require APPROOT . '/views/inc/mod-sidebar.php'; ?>
    </div>
    <div class="right-component">
      <div class="top">
        <h1>Moderator Dashboard | <?php echo $data['mod_data']->moderator_name; ?></h1>
          <div class="dashboard">
          <section class="container">
              <!-- CSS Chart -->
              <ul>
                <li>
                  <figure class="chart" data-percent="100">
                      <figcaption data-to="25" data-speed="16" style="font-size: 50px;"><?php echo $data['user_total']; ?></figcaption>
                    <svg width="190" height="190">
                      <defs>
                      <linearGradient id="linear" x1="0%" y1="0%" x2="100%" y2="100%" gradientUnits="userSpaceOnUse" gradientTransform="rotate(65)">
                        <stop offset="0%"   stop-color="#4A148C"/>
                        <stop offset="40%"   stop-color="#AB47BC"/>
                        <stop offset="100%" stop-color="#CE93D8"/>
                      </linearGradient>
                      </defs>
                    <circle class="outer" cx="95" cy="95" r="85" transform="rotate(-90, 95, 95)"/> 
                    </svg>
                  </figure> 
                  <p class="wow slideInUp" style="font-size: 25px;">Users</p>
                </li>
            
                <li>
                  <figure class="chart" data-percent="100">
                      <figcaption class="counter simple" data-to="25" data-speed="16"><?php echo $data['sp_total']; ?></figcaption>
                    <svg width="190" height="190">
            
                    <circle class="outer" cx="95" cy="95" r="85" transform="rotate(-90, 95, 95)"/> 
                    </svg>
                  </figure> 
                  <p class="wow slideInUp" style="font-size: 25px;">Service Providers</p>
                </li><br><br><br><br><br>
                
                <li>
                  <figure class="chart" data-percent="100">
                      <figcaption class="counter simple" data-to="25" data-speed="16"><?php echo $data['instrument_count']; ?></figcaption>
                    <svg width="190" height="190">
            
                    <circle class="outer" cx="95" cy="95" r="85" transform="rotate(-90, 95, 95)"/> 
                    </svg>
                  </figure> 
                  <p class="wow slideInUp" style="font-size: 25px;">Instruments</p>
                </li>
                
                <li>
                  <figure class="chart" data-percent="100">
                      <figcaption class="counter simple" data-to="25" data-speed="16"><?php echo $data['studio_count']; ?></figcaption>
                    <svg width="190" height="190">
            
                    <circle class="outer" cx="95" cy="95" r="85" transform="rotate(-90, 95, 95)"/> 
                    </svg>
                  </figure> 
                  <p class="wow slideInUp" style="font-size: 25px;">Studios</p>
                </li>

                <li>
                  <figure class="chart" data-percent="100">
                      <figcaption class="counter simple" data-to="25" data-speed="16"><?php echo $data['singer_count']; ?></figcaption>
                    <svg width="190" height="190">
            
                    <circle class="outer" cx="95" cy="95" r="85" transform="rotate(-90, 95, 95)"/> 
                    </svg>
                  </figure> 
                  <p class="wow slideInUp" style="font-size: 25px;">Singers</p>
                </li>

                <li>
                  <figure class="chart" data-percent="100">
                      <figcaption class="counter simple" data-to="25" data-speed="16"><?php echo $data['band_count']; ?></figcaption>
                    <svg width="190" height="190">
            
                    <circle class="outer" cx="95" cy="95" r="85" transform="rotate(-90, 95, 95)"/> 
                    </svg>
                  </figure> 
                  <p class="wow slideInUp" style="font-size: 25px;">Bands</p>
                </li>

                <li>
                  <figure class="chart" data-percent="100">
                      <figcaption class="counter simple" data-to="25" data-speed="16"><?php echo $data['musician_count']; ?></figcaption>
                    <svg width="190" height="190">
            
                    <circle class="outer" cx="95" cy="95" r="85" transform="rotate(-90, 95, 95)"/> 
                    </svg>
                  </figure> 
                  <p class="wow slideInUp" style="font-size: 25px;">Musicians</p>
                </li>
              </ul>
            </section>
            
            <script>
                new WOW().init();
            </script>
          <!-- Bar Chart - Daily Login History -->
          <div class="graph">
              <div class="container" id="top">
                  <main class="grid-main">
                      <div class="grid-2" id="traffic">
                          <h2><u>Traffic</u></h2>
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
          
                      <div class="grid-3">
                          <h2><u>New Registrations (Last 7 days)</u></h2>
                          <div class="chart-2" style="position: relative; height:221px; width:979px">
                              <canvas id="barChart"></canvas>
                          </div>
                      </div>
          
                      <div class="doughnut-grid">
                          <div class="grid-4">
                              <h3><u>Users Stats</u></h3>
                              <div class="chart-3" style="position: relative; height:221px; width:40%px">
                                  <canvas id="doughnutChart"></canvas>
                              </div>
                          </div>
      
                          <div class="grid-4">
                              <h3><u>Service Provider Stats</u></h3>
                              <div class="chart-3" style="position: relative; height:221px; width:40%px">
                                  <canvas id="spDoughnutChart"></canvas>
                              </div>
                          </div>
                      </div>
                  </main>
              </div>
          </div>
      </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
  <script src="script.js"></script>
  <script>
      

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
                      label: 'Visitors',
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
  createInitialChart(<?php echo json_encode($data['traffic_data']); ?>);
  

  hourChart.addEventListener('click', () => {
      const labels = [];
      const data = Object.values(<?php echo json_encode($data['traffic_data']['last_24h']); ?>);

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
      const data = Object.values(<?php echo json_encode($data['traffic_data']['last_week']); ?>);

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
      const data = Object.values(<?php echo json_encode($data['traffic_data']['last_8_weeks']); ?>);

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
      const data = Object.values(<?php echo json_encode($data['traffic_data']['last_year']); ?>);

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


  // BAR CHART
  // Function to create the bar chart with dynamic data for the last week
  function createDynamicBarChart(data) {
      const barChart = document.getElementById('barChart');

      const labels = [];
      const userData = Object.values(data.user);
      const serviceProviderData = Object.values(data.sp);

      const currentDate = new Date();
      for (let i = 6; i >= 0; i--) {
          const day = (currentDate.getDay() - i + 7) % 7;
          labels.push(getDayName(day));
      }

      new Chart(barChart, {
          type: 'bar',
          data: {
              labels: labels,
              datasets: [
                  {
                      label: 'Users',
                      data: userData,
                      backgroundColor: 'rgba(206, 147, 216, 0.8)',
                      hoverBackgroundColor: '#CE93D8',
                      barPercentage: 0.4, // Adjust the width of the bars
                  },
                  {
                      label: 'Service Providers',
                      data: serviceProviderData,
                      backgroundColor: 'rgba(74, 20, 140, 0.8)',
                      hoverBackgroundColor: '#4A148C',
                      barPercentage: 0.4, // Adjust the width of the bars
                  },
              ]
          },
          options: {
              scales: {
                  x: {
                      stacked: true,
                  },
                  y: {
                      stacked: true,
                  },
              },
          },
      });
  }

  // Call the function to create the dynamic bar chart
  createDynamicBarChart(<?php echo json_encode($data['reg_data']); ?>);
  // DOUGHNUT CHART
  // Reference to the doughnut chart canvas element
  const doughnutChartCanvas = document.getElementById('doughnutChart');

  // Initial data for the chart (you can replace this with your actual data)

  // Function to create and update the doughnut chart
  function updateDoughnutChart(userData) {
      new Chart(doughnutChartCanvas, {
          type: 'doughnut',
          data: {
              labels: Object.keys(userData),
              datasets: [
                  {
                      data: Object.values(userData),
                      backgroundColor: ['#CE93D8', '#AB47BC', '#4A148C'],
                      hoverBackgroundColor: ['#CE93D8', '#AB47BC', '#4A148C'],
                  },
              ],
          },
          options: {
              legend: {
                  display: true,
                  position: 'right',
              },
          },
      });
  }

  // Call the function to initially create the chart with the initial data
  updateDoughnutChart(<?php echo json_encode($data['user_data']); ?>);

  // Reference to the SP doughnut chart canvas element
  const spDoughnutChartCanvas = document.getElementById('spDoughnutChart');

  // Function to create and update the SP doughnut chart
  function updateSpDoughnutChart(spData) {
      new Chart(spDoughnutChartCanvas, {
          type: 'doughnut',
          data: {
              labels: Object.keys(spData),
              datasets: [
                  {
                      data: Object.values(spData),
                      backgroundColor: ['#CE93D8 ', '#BA68C8', '#AB47BC', '#9C27B0', '#4A148C'],
                      hoverBackgroundColor: ['#CE93D8 ', '#BA68C8', '#AB47BC', '#9C27B0', '#4A148C'],
                  },
              ],
          },
          options: {
              legend: {
                  display: true,
                  position: 'right',
              },
          },
      });
  }

  // Call the function to initially create the SP doughnut chart with the initial data
  updateSpDoughnutChart(<?php echo json_encode($data['sp_data']); ?>);

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
      </div>
    </div>
  </div>
  </body>
  </html>