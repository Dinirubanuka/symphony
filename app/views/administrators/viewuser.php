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
        <h2><?php if($data['status'] == 'Active'){
            echo 'Active Users';
        } else if($data['status'] == 'Banned'){
            echo 'Banned Users';
        } else if($data['status'] == 'Deactivated'){
            echo 'Deactivated Users';
        } ?>
        </h2>
    </div>
    <div class="mod-below">
        <table class="data-table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            <?php foreach ($data['users'] as $user) : ?>
                <tr class="data-table-tr">
                    <td><?php echo $user->id; ?></td>
                    <td><?php echo $user->name; ?></td>
                    <td><?php echo $user->email; ?></td>
                    <td><?php echo $user->TelephoneNumber; ?></td>
                    <td><?php echo $user->address; ?></td>
                    <td><button class="sp-icon" onclick="viewUser(<?php echo $user->id; ?>)">View User</button></td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>
</div>
</div>
</div>
<script>
    function deleteUser(userID) {
        // Display a confirmation dialog
        if (confirm("Are you sure you want to delete this user?")) {
            // Execute PHP code to delete the moderator
            window.location.href = "<?php echo URLROOT; ?>/administrators/deleteuser/" + userID;
        }
    }

    function viewUser(userID) {
        // Execute PHP code to view the user
        window.location.href = "<?php echo URLROOT; ?>/administrators/viewuser/" + userID;
    }
</script>
</body>

</html>