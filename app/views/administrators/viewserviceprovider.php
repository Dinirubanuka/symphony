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
                    <h2>Service Providers</h2>
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
                                <td><?php echo $serviceprovider->business_name; ?></td>
                                <td><?php echo $serviceprovider->business_email; ?></td>
                                <td><?php echo $serviceprovider->business_contact_no; ?></td>
                                <td><?php echo $serviceprovider->business_address; ?></td>
                                <td><?php echo $serviceprovider->owner_nic; ?></td>
                                <td class="data-table-action">


                                    <a href="<?php echo URLROOT; ?>/administrators/viewsingleserviceprovider/<?php echo $serviceprovider->serviceprovider_id; ?>" class="mod-below-edit">
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

</body>

</html>