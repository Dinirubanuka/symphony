<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/mod-index.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/sp-icon.css">
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
        <h2> Account Recover Requests - User | <?php echo $data['status']; ?> </h2>
    </div>
    <div class="mod-below">
        <table class="data-table">
            <tr>
                <th>Request ID</th>
                <th>Username</th>
                <th>Mobile Number</th>
                <th>Account created on</th>
                <th>Email provided</th>
                <th>Action</th>
            </tr>
            <?php foreach ($data['recover'] as $recover) : ?>
                <tr class="data-table-tr">
                    <td><?php echo $recover->recover_id; ?></td>
                    <td><?php echo $recover->user_name; ?></td>
                    <td><?php echo $recover->mobile_number; ?></td>
                    <td><?php echo $recover->account_created_on; ?></td>
                    <td><?php echo $recover->contactEmail; ?></td>
                    <td><button class="sp-icon" onclick="viewRequest(<?php echo $recover->recover_id; ?>)">View Request</button></td>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>
</div>
</div>
</div>
<script>
    function viewRequest(id) {
        window.location.href = "<?php echo URLROOT; ?>/administrators/viewRecoverRequest/" + id;
    }
</script>
</body>

</html>