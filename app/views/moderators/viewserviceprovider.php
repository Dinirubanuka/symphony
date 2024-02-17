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
        <h2><?php if($data['status'] == 'Active'){
            echo 'Active Service Providers';
        } else if($data['status'] == 'Rejected'){
            echo 'Rejected Service Providers';
        } else if($data['status'] == 'Deactivated'){
            echo 'Deactivated Service Providers';
        } else if($data['status'] == 'Banned'){
            echo 'Banned Service Providers';
        } ?>
        </h2>
    </div>
    <div class="mod-below">
        <table class="data-table">
            <tr>
                <th>ID</th>
                <th>Business Name</th>
                <th>Business Email</th>
                <th>Business Contact Number</th>
                <th>Business Address</th>
                <th>Owner NIC</th>
            </tr>
            <?php foreach ($data['serviceproviders'] as $serviceprovider) : ?>
                <tr class="data-table-tr">
                    <td><?php echo $serviceprovider->serviceprovider_id; ?></td>
                    <td><div class = "sp-icon" onclick = "viewSP(<?php echo $serviceprovider->serviceprovider_id; ?>)"><?php echo $serviceprovider->business_name; ?></div></td>
                    <td><?php echo $serviceprovider->business_email; ?></td>
                    <td><?php echo $serviceprovider->business_contact_no; ?></td>
                    <td><?php echo $serviceprovider->business_address; ?></td>
                    <td><?php echo $serviceprovider->owner_nic; ?></td>
                    <td class="data-table-action">

                    <a class="mod-below-delete" onclick="deleteServiceProvider(<?php echo $serviceprovider->serviceprovider_id; ?>)">
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
    function deleteServiceProvider(serviceproviderID) {
        // Display a confirmation dialog
        if (confirm("Are you sure you want to delete this Service Provider?")) {
            // Execute PHP code to delete the moderator
            window.location.href = "<?php echo URLROOT; ?>/moderators/deleteserviceprovider/" + serviceproviderID;
        }
    }

    function viewSP(serviceproviderID) {
        window.location.href = "<?php echo URLROOT; ?>/moderators/viewserviceprovider/" + serviceproviderID;
    }
</script>
</body>

</html>