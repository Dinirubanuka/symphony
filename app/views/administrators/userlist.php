<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/mod-index.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/userlist.css">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <title><?php echo SITENAME; ?></title>
</head>

<body>
<body>
  <div class="container_body">
    <div class="adminsidebar">
      <?php require APPROOT . '/views/inc/admin-sidebar.php'; ?>
    </div>
    <div class="right-component">
      <div class="mod">
        <div class="mod-below">
          <div class="tab">
            <button class="tablink" onclick="openTab('users')">Users</button>
            <button class="tablink" onclick="openTab('serviceProviders')">Service Providers</button>
            <button class="tablink" onclick="openTab('moderators')">Moderators</button><br><br><br>
          </div>

          <div id="users" class="tabcontent">
          <h1>Generating Log Report for Users </h1>
            <table class="data-table">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              <?php foreach ($data['all_users'] as $user) : ?>
                <tr class="data-table-tr">
                  <td><?php echo $user->id; ?></td>
                  <td><?php echo $user->name; ?></td>
                  <td><?php echo $user->email; ?></td>
                  <td style="color: purple;">User</td>
                  <td style="color: <?php echo $user->status === 'Active' ? 'green' : 'red'; ?>"><?php echo $user->status; ?></td>
                  <td><button class="sp-icon" onclick="generateUser(<?php echo $user->id; ?>)">Generate Logs</button></td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>

          <div id="serviceProviders" class="tabcontent" hidden>
          <h1>Generating Log Report for Service Providers </h1>
            <table class="data-table">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              <?php foreach ($data['all_sp'] as $user) : ?>
                <tr class="data-table-tr">
                  <td><?php echo $user->serviceprovider_id; ?></td>
                  <td><?php echo $user->business_name; ?></div></td>
                  <td><?php echo $user->business_email; ?></td>
                  <td style="color: green;">Service Provider</td>
                  <td style="color: <?php echo $user->status === 'Active' ? 'green' : 'red'; ?>"><?php echo $user->status; ?></td>
                  <td><button class="sp-icon" onclick="generateSP(<?php echo $user->serviceprovider_id; ?>)">Generate Logs</button></td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>

          <div id="moderators" class="tabcontent" hidden>
          <h1>Generating Log Report for Moderators </h1>
            <table class="data-table">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              <?php foreach ($data['all_moderators'] as $user) : ?>
                <tr class="data-table-tr">
                  <td><?php echo $user->moderator_id; ?></td>
                  <td><?php echo $user->moderator_name; ?></div></td>
                  <td><?php echo $user->moderator_email; ?></td>
                  <td style="color: red;">Moderator</td>
                  <td style="color: <?php echo $user->status === 'Active' ? 'green' : 'red'; ?>"><?php echo $user->status; ?></td>
                  <td><button class="sp-icon" onclick="generateMOD(<?php echo $user->moderator_id; ?>)">Generate Logs</button></td>
              <?php endforeach; ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<script>
    function generateUser(userID) {
        window.location.href = "<?php echo URLROOT; ?>/administrators/generateUserLog/" + userID;
    }

    function generateSP(serviceproviderID) {
        window.location.href = "<?php echo URLROOT; ?>/administrators/generateSPLog/" + serviceproviderID;
    }

    function generateMOD(moderatorID) {
        window.location.href = "<?php echo URLROOT; ?>/administrators/generateModLog/" + moderatorID;
    }
    function openTab(tabName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      document.getElementById(tabName).style.display = "block";
    }
</script>
</body>

</html>