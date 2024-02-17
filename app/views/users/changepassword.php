<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password</title>
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/user-changepass.css">
</head>
<body>

<div class="change-password-form">
  <h2>Change Password</h2>
  <form action="<?php echo URLROOT; ?>/users/changepassword" class="form" method="post" enctype="multipart/form-data">
    <label for="current_password">Current Password:</label>
    <input type="password" id="current_password" name="current_password" required>
    <span class="invalid-feedback"><?php echo $data['current_password_err']; ?></span><br><br>

    <label for="new_password">New Password:</label>
    <input type="password" id="new_password" name="new_password" required>
    <span class="invalid-feedback"><?php echo $data['new_password_err']; ?></span><br><br>

    <label for="confirm_password">Confirm New Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required>
    <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span><br><br>

    <button type="submit" id="submit-btn">Change Password</button>
  </form>
</div>

</body>
</html>
