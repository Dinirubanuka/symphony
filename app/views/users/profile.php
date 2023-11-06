<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user-profile.css"/>
  <title>UserProfile</title>
</head>
<body>

<!-----------profile-nav-bar-------->
<?php require_once APPROOT . '/views/inc/profile-nav.php'; ?>

<div class="flex-outer">
    <div class="photo-outer">
        <div class="photo-inner">
            <img src="<?php echo URLROOT; ?>/img/mag_img/<?php echo $data['photo']?>" alt="user image" class = "photo" id="photo-1"/>
            <img src="<?php echo URLROOT; ?>/img/camera_10762333.png" alt="camera-icon"  class = "photo" id="photo-1" onclick="myfunc()"/>
        </div>
    </div>

    <!------options------->
    <div class="modal" id="options-modal">
        <div class="modal-content">
            <a href="#" onclick="myfunc()">X</a>
            <form action="<?php echo URLROOT; ?>/users/profilePhotoUpdate"  method="post" enctype="multipart/form-data">
                <input type="file" id="photo" accept=".jpg, .jpeg, .png, .HEIC" name="photo" class="<?php echo (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['image']; ?>">
                <input type="submit" value="Upload" id="upload-btn"/>
            </form>
            <br><br>
            <button class="delete-btn" id="delete-btn" onclick="confirmDelete()">Delete</button>
        </div>
    </div>

<!--    ----------form---------->
    <div class = "bigClass">
        <div class="input-box" >
            <label>Full Name:</label>
            <label style="background: rgba(217, 212, 212, 0.08);border-radius: 8px;"><?php echo $data['name']; ?></label>
        </div>
        <div class="column">
            <div class="input-box" >
                <label>Email Address: </label>
                <label style="background: rgba(217, 212, 212, 0.08);border-radius: 8px;color: #feffff;z-index:-5;"><?php echo $data['email']; ?></label>
            </div>
            <div class="input-box">
                <label>Phone Number:</label>
                <label style="background: rgba(217, 212, 212, 0.08);border-radius: 8px;color: #feffff;"><?php echo $data['tel_Number']; ?></label>
            </div>
            <div class="input-box">
                <label>Birth Date:</label>
                <label style="background: rgba(217, 212, 212, 0.08);border-radius: 8px;"><?php echo $data['date']; ?></label>
            </div>
            <div class="input-box">
                <label>Gender:</label>
                <label style="background: rgba(217, 212, 212, 0.08);border-radius: 8px;"><?php echo $data['gender']; ?></label>
            </div>
            <div class="input-box">
                <label>Address: </label>
                <label style="background: rgba(217, 212, 212, 0.08);border-radius: 8px;"><?php echo $data['address']; ?></label><br><br>
            </div>
            <div class="llink">
                <form action = "<?php echo URLROOT; ?>/users/editDeatil/<?php echo $_SESSION['user_id']; ?>" method ="post">
                    <div class = "edit-link">
                        <input type = "submit" value = "edit" id = "editButton">
                    </div>
                </form>
                <div class="editButton" onclick="EditAcc()" id = "editButton">Edit Details</div>
                <div class="delButton" id = "delButton" onclick="deleteAcc()">Remove account</div>
                <div class="deleteAccUpper">
                    <div class="deleteAcc">
                        <a href="#" onclick="deleteAcc()">X</a>
                        <form action="<?php echo URLROOT; ?>/users/delete" method ="post">
                            <label >Password</label>
                            <input type="password" name="password" id="passwordInput" class="<?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                            <div class = "delete-link">
                                <input type = "submit" value = "delete" id="button123">
                            </div>
                        </form>
                        <input type="submit" onclick="AbsoluteDeleteAcc()" value="Delete Account" id="deleteButton" >
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="<?php echo URLROOT;?>/js/user-profile.js"></script>
    <script>
        //logout account
        function Logout() {
            // Display a confirmation dialog
            var confirmed = confirm("Are you sure you want to logout?");

            // Check the user's response
            if (confirmed) {
                var urlRoot = "<?php echo URLROOT; ?>";
                window.location.href = "<?php echo URLROOT; ?>/users/logout";
                alert("Logged out.");
            } else {
                alert("Logout canceled.");
            }
        }
    </script>
</body>
</html>
