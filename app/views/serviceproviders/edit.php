<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sp-edit.css"/>
  <title>UserProfile</title>
</head>
<body>
<!-----------edit-nav-bar-------->
<?php require_once APPROOT . '/views/inc/sp-edit-nav.php'; ?>
<!--------body-------->
<form action="<?php echo URLROOT; ?>/serviceproviders/edit" class="form" method="post">
  <div class="input-box">
    <label>Full Name</label>
    <input type="text" name="business_name" class="<?php echo (!empty($data['business_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['business_name']; ?>">
    <span class="invalid-feedback"><?php echo $data['business_name_err']; ?></span>
  </div>

  <div class="input-box">
    <label>Email Address</label>
    <input type="email" name="business_email" class="<?php echo (!empty($data['business_email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['business_email']; ?>">
    <span class="invalid-feedback"><?php echo $data['business_email_err']; ?></span>
  </div>

  <div class="column">
    <div class="input-box">
      <label>Phone Number</label>
      <input type="number" name="business_contact_no" class="<?php echo (!empty($data['business_contact_no_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['business_contact_no']; ?>">
      <span class="invalid-feedback"><?php echo $data['business_contact_no_err']; ?></span>
    </div>
  </div>
  <div class="input-box">
    <label>Address</label>
    <input type="text" name="business_address" class="<?php echo (!empty($data['business_address_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['business_address']; ?>">
    <span class="invalid-feedback"><?php echo $data['business_address_err']; ?></span><br><br>
  </div>

<div class="input-box">
  <label>Owner Name</label>
  <input type="text" name="owner_name" class="<?php echo (!empty($data['owner_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['owner_name']; ?>">
  <span class="invalid-feedback"><?php echo $data['owner_name_err']; ?></span><br><br>
</div>

<div class="input-box">
  <label>Owner Email</label>
  <input type="email" name="owner_email" class="<?php echo (!empty($data['owner_email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['owner_email']; ?>">
  <span class="invalid-feedback"><?php echo $data['owner_email_err']; ?></span><br><br>
</div>

<div class="input-box ">
  <label>Owner Address</label>
  <input type="text" name="owner_address" class="<?php echo (!empty($data['owner_address_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['owner_address']; ?>">
  <span class="invalid-feedback"><?php echo $data['owner_address_err']; ?></span><br><br>
</div>

<div class="input-box address">
  <label>Owner contact Number</label>
  <input type="number" name="owner_contact_no" class="<?php echo (!empty($data['owner_contact_no_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['owner_contact_no']; ?>">
  <span class="invalid-feedback"><?php echo $data['owner_contact_no_err']; ?></span><br><br>
</div>

<div class="input-box address">
  <label>About</label>
  <input type="text" name="about" class="<?php echo (!empty($data['about_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['about']; ?>">
  <span class="invalid-feedback"><?php echo $data['about_err']; ?></span><br><br>
  <button>Submit</button>
</div>
</form>
<script src="<?php echo URLROOT;?>/js/sp-edit.js"></script>
</body>
</html>
