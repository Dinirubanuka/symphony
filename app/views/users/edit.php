<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user-edit.css"/>
  <title>UserProfile</title>
</head>
<body>
<!-----------edit-nav-bar-------->
<?php require_once APPROOT . '/views/inc/edit-nav.php'; ?>

<!--------body-------->
<form action="<?php echo URLROOT; ?>/users/edit" class="form" method="post">
  <div class="input-box">
    <label>Full Name</label>
    <input type="text" name="name" class="<?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
    <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
  </div>

  <div class="input-box">
    <label>Email Address</label>
    <input type="email" name="email" class="<?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
  </div>

  <div class="column">
    <div class="input-box">
      <label>Phone Number</label>
      <input type="number" name="tel_Number" class="<?php echo (!empty($data['tel_Number_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['tel_Number']; ?>">
      <span class="invalid-feedback"><?php echo $data['tel_Number_err']; ?></span>
    </div>
    <div class="input-box">
      <label>Birth Date</label>
      <input type="date" name="date" class="<?php echo (!empty($data['date_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['date']; ?>">
      <span class="invalid-feedback"><?php echo $data['date_err']; ?></span>
    </div>
  </div>
  <div class="input-box address">
    <label>Address</label>
    <input type="text" name="address" class="<?php echo (!empty($data['address_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['address']; ?>">
    <span class="invalid-feedback"><?php echo $data['address_err']; ?></span><br><br>
    <button>Submit</button>
  </div>
</form>
<script src="<?php echo URLROOT;?>/js/user-edit.js"></script>
</body>
</html>
