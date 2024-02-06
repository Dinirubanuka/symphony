<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/mod-index.css">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <title><?php echo SITENAME; ?></title>
</head>

<body>
  <div class="container_body">
    <div class="adminsidebar">
      <?php require APPROOT . '/views/inc/mod-sidebar.php'; ?>
    </div>
    <div class="right-component">
<div class="mod">
    <div class="mod-above">
        <h2>Moderators</h2>
    </div>
    <div class="mod-below">
        <table class="data-table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Address</th>
            </tr>
            <?php foreach ($data['users'] as $user) : ?>
                <tr class="data-table-tr">
                    <td><?php echo $user->id; ?></td>
                    <td><?php echo $user->name; ?></td>
                    <td><?php echo $user->email; ?></td>
                    <td><?php echo $user->TelephoneNumber; ?></td>
                    <td><?php echo $user->address; ?></td>
                    <td class="data-table-action">

                    <a class="mod-below-delete" onclick="deleteUser(<?php echo $user->id; ?>)">
                        <i class='bx bx-trash'></i>
                    </a>
                    </td>
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
            window.location.href = "<?php echo URLROOT; ?>/moderators/deleteuser/" + userID;
        }
    }
</script>
</body>

</html>