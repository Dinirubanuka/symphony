<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin-index.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title><?php echo SITENAME; ?></title>
    <style>
        .viewsinglesp {
            padding: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .viewsinglesp_container {
            width: 1000px;
            height: auto;
            border: 1px solid black;
            display: flex;
            flex-direction: column;
        }

        .viewsinglesp_container_title {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            margin-bottom: 20px;
        }

        .viewsinglesp_container_pp {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .viewsinglesp_container_pp_img {
            height: 200px;
            width: 200px;
        }

        .viewsinglesp_container_span {
            padding: 0 30px 0 30px;
            margin-bottom: 20px;
        }

        .viewsinglesp_container_div {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        .viewsinglesp_container_btn_div {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .viewsinglesp_container_btn_rej {
            width: 100px;
            height: 40px;
            cursor: pointer;
            background-color: #D04848;
            color: white;
            border: none;
        }

        .viewsinglesp_container_btn_acc {
            width: 100px;
            height: 40px;
            cursor: pointer;
            color: white;
            background-color: #0D9276;
            border: none;
        }
    </style>
</head>

<body>
    <div class="container_body">
        <div class="adminsidebar">
            <?php require APPROOT . '/views/inc/admin-sidebar.php'; ?>
        </div>
        <div class="right-component">
            <div class="viewsinglesp">
                <div class="viewsinglesp_container">
                    <div class="viewsinglesp_container_title">
                        <h1><?php echo $data['serviceprovider']->business_name ?></h1>
                    </div>
                    <div class="viewsinglesp_container_pp"><img class="viewsinglesp_container_pp_img" src="https://cdn3.iconfinder.com/data/icons/avatars-flat/33/man_5-1024.png" alt="">
                    </div>
                    <span class="viewsinglesp_container_span"><?php echo $data['serviceprovider']->about ?></span>
                    <div class="viewsinglesp_container_div">
                        <span class="viewsinglesp_container_span">Owner Name: <?php echo $data['serviceprovider']->owner_name ?></span>
                        <span class="viewsinglesp_container_span">Business Address: <?php echo $data['serviceprovider']->business_address ?></span>
                        <span class="viewsinglesp_container_span">Business Contact No: <?php echo $data['serviceprovider']->business_contact_no ?></span>
                        <span class="viewsinglesp_container_span">Business Email: <?php echo $data['serviceprovider']->business_email ?></span>
                        <span class="viewsinglesp_container_span">Owner Address: <?php echo $data['serviceprovider']->owner_address ?></span>
                        <span class="viewsinglesp_container_span">Owner Contact No: <?php echo $data['serviceprovider']->owner_contact_no ?></span>
                        <span class="viewsinglesp_container_span">Owner Nic: <?php echo $data['serviceprovider']->owner_nic ?></span>
                        <span class="viewsinglesp_container_span">Owner Email: <?php echo $data['serviceprovider']->owner_email ?></span>
                    </div>
                    <div class="viewsinglesp_container_btn_div">
                        <button class="viewsinglesp_container_btn_rej" onclick="deleteServiceProvider(<?php echo $data['serviceprovider']->serviceprovider_id; ?>)">Reject</button>
                        <button class="viewsinglesp_container_btn_acc" onclick="location.href='<?php echo URLROOT; ?>administrators/changeserviceproviderstate/' + $serviceprovider->serviceprovider_id">Accept</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteServiceProvider(serviceproviderId) {
            // Display a confirmation dialog
            if (confirm("Are you sure you want to delete this service provider?")) {
                // Execute PHP code to delete the moderator
                window.location.href = "<?php echo URLROOT; ?>/administrators/deleteserviceprovider/" + serviceproviderId;
            }
        }
    </script>
</body>

</html>