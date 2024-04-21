<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/mod-index.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/genreports.css">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <title><?php echo SITENAME; ?></title>
</head>

<body>
  <div class="container_body">
    <div class="adminsidebar">
      <?php require APPROOT . '/views/inc/admin-sidebar.php'; ?>
    </div>
    <div class="right-component">
      <div class="title">
        <h1>Generating Log Report for <?php if($data['type'] == 'User'){
                                                echo $data['user']->name;
                                            } else if($data['type'] == 'SP'){
                                                echo $data['user']->business_name;
                                            } else if($data['type'] == 'MOD'){
                                                echo $data['user']->moderator_name;
                                            } ?>
        </h1>
      </div> 
        <div class="container">
        <form id="report-form" action="<?php 
              switch ($data['type']) {
                  case 'User':
                      echo URLROOT . '/administrators/generateUserLog/' . $data['user']->id;
                      break;
                  case 'SP':
                      echo URLROOT . '/administrators/generateSPLog/' . $data['user']->serviceprovider_id;
                      break;
                  case 'MOD':
                      echo URLROOT . '/administrators/generateModLog/' . $data['user']->moderator_id;
                      break;
              }
          ?>" method="post" enctype="multipart/form-data">
      <div class="customize">
        <input type="checkbox" id="customize-checkbox">
        <label for="customize-checkbox">Customize</label>
        <div class="dropdown">
          <select id="options" name="options" disabled>
            <option value="">Select Option</option>
            <option value="login">Log In</option>
            <option value="logout">Log Out</option>
            <option value="acc_new" <?php echo $data['type'] == 'MOD' ? '' : 'hidden' ?>>Manage New Service Provider</option>
            <option value="ban_user" <?php echo $data['type'] == 'MOD' ? '' : 'hidden' ?>>Ban User</option>
            <option value="unban_user" <?php echo $data['type'] == 'MOD' ? '' : 'hidden' ?>>Unban User</option>
            <option value="ban_sp" <?php echo $data['type'] == 'MOD' ? '' : 'hidden' ?>>Ban Service Provider</option>
            <option value="unban_sp" <?php echo $data['type'] == 'MOD' ? '' : 'hidden' ?>>Unban Service Provider</option>
            <option value="acc_inq" <?php echo $data['type'] == 'MOD' ? '' : 'hidden' ?>>Accept Inquiry</option>
            <option value="close_inq" <?php echo $data['type'] == 'MOD' ? '' : 'hidden' ?>>Close Inquiry</option>
            <option value="purchases" <?php echo $data['type'] == 'User' ? '' : 'hidden' ?>>Purchases</option>
            <option value="accept_orders" <?php echo $data['type'] == 'SP' ? '' : 'hidden' ?>>Accepted Orders</option>
            <option value="reject_orders" <?php echo $data['type'] == 'SP' ? '' : 'hidden' ?>>Rejected Orders</option>
            <option value="inventory" <?php echo $data['type'] == 'SP' ? '' : 'hidden' ?>>Manage Inventory</option>
            <option value="inquiries"  <?php echo ($data['type'] == 'User' || $data['type'] == 'SP') ? '' : 'hidden' ?>>Inquiries</option>
            <option value="update-profile" <?php echo ($data['type'] == 'User' || $data['type'] == 'SP') ? '' : 'hidden' ?>>Update Profile</option>
            <option value="reviews" <?php echo $data['type'] == 'User' ? '' : 'hidden' ?>>Reviews</option>
          </select>
        </div>
      </div>
      <div class="date-selectors">
        <label for="from-date">From Date:</label>
        <input type="date" id="from-date" name="from-date" required>
        <label for="to-date">To Date:</label>
        <input type="date" id="to-date" name="to-date" disabled required>
      </div>
      <button type="submit" id="generate-report">Generate Report</button>
    </form>
  </div>
  <div class="mod">
    <div class="mod-above">
    <h3 <?php echo $data['log_data'] == 'NA' ? 'hidden' : '' ?>>
    Showing log reports for <?php 
        switch ($data['type']) {
            case 'User':
                echo $data['user']->name;
                break;
            case 'SP':
                echo $data['user']->business_name;
                break;
            case 'MOD':
                echo $data['user']->moderator_name;
                break;
        }
    ?> from <?php echo $data['from_date'] ?> to <?php echo $data['to_date'] ?>
</h3>

    </div>
    <div class="mod-below" <?php echo $data['log_data'] == 'NA' ? 'hidden' : '' ?>>
        <table class="data-table">
            <tr>
                <th>LogID</th>
                <th>Date and Time</th>
                <th>Log Type</th>
                <th>Data</th>
            </tr>
            <?php foreach ($data['log_data'] as $log_data) : ?>
                <tr class="data-table-tr">
                    <td><?php echo $log_data->log_id ; ?></td>
                    <td><?php echo $log_data->date_and_time; ?></td>
                    <td><?php echo $log_data->log_type; ?></td>
                    <td><?php echo $log_data->data; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
</div>
</div>
</div>
<script>
// Get elements
const customizeCheckbox = document.getElementById('customize-checkbox');
const dropdown = document.querySelector('.dropdown');
const options = document.getElementById('options');
const fromDate = document.getElementById('from-date');
const toDate = document.getElementById('to-date');
const reportForm = document.getElementById('report-form');

// Event listener for checkbox
customizeCheckbox.addEventListener('change', function() {
  if (this.checked) {
    dropdown.style.display = 'block';
    options.disabled = false;
  } else {
    dropdown.style.display = 'none';
    options.disabled = true;
  }
});

// Event listener for "From Date" input
fromDate.addEventListener('change', function() {
  toDate.min = this.value; // Set the minimum date for "To Date"
  toDate.disabled = false; // Enable "To Date" input
});

// Event listener for "To Date" input
toDate.addEventListener('change', function() {
  fromDate.max = this.value; // Set the maximum date for "From Date"
});

</script>
</body>

</html>