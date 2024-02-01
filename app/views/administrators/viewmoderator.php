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
        <h2>Moderators</h2>
        <a href="<?php echo URLROOT; ?>/administrators/addmoderator">
            <button>Add Moderator</button>
        </a>
    </div>
    <div class="mod-below">
        <table class="data-table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>NIC Number</th>
                <th>Type</th>
            </tr>
            <?php foreach ($data['moderators'] as $moderator) : ?>
                <tr class="data-table-tr">
                    <td><?php echo $moderator->moderator_id; ?></td>
                    <td><?php echo $moderator->moderator_name; ?></td>
                    <td><?php echo $moderator->moderator_email; ?></td>
                    <td><?php echo $moderator->moderator_contact_no; ?></td>
                    <td><?php echo $moderator->moderator_nic; ?></td>
                    <td><?php echo $moderator->type; ?></td>
                    <td class="data-table-action">

                    <a class="mod-below-delete" onclick="deleteModerator(<?php echo $moderator->moderator_id; ?>)">
                        <i class='bx bx-trash'></i>
                    </a>

                    <a href="<?php echo URLROOT; ?>/administrators/editmoderator/<?php echo $moderator->moderator_id; ?>" class="mod-below-edit">
                        <i class='bx bx-edit'></i>
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
    function deleteModerator(moderatorId) {
        // Display a confirmation dialog
        if (confirm("Are you sure you want to delete this moderator?")) {
            // Execute PHP code to delete the moderator
            window.location.href = "<?php echo URLROOT; ?>/administrators/deletemoderator/" + moderatorId;
        }
    }
</script>
</body>

</html>