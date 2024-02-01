<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo SITENAME?></title>
    <!-- Font Awesome Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sp-login.css"/>
  </head>
  <body>
  <!-----------login-nav-bar-------->
  <?php require_once APPROOT . '/views/inc/sp-login-nav.php'; ?>
    <div class="login-page">
        <div class="form">
          <div class="login">
            <div class="login-header">
              <h3>SERVICE PROVIDER LOGIN</h3>
            </div>
          </div>
          <form action="<?php echo URLROOT; ?>/serviceproviders/serviceproviderlogin" method="post">
          <input type="email" placeholder="Business E-mail" name="business_email" class="<?php echo (!empty($data['business_email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['business_email']; ?>">
          <span class="invalid-feedback"><?php echo $data['business_email_err']; ?></span>
        <input type="password" placeholder="Password" name="password" class="<?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
          <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
            <button>login</button>
            <p class="message">Not registered? <a href="<?php echo URLROOT; ?>/serviceproviders/serviceproviderregister">Create an account</a></p>
          </form>
        </div>
    </div>
    <!-- Script -->
    <script src="<?php echo URLROOT;?>/js/sp-login.js"></script>
  </body>
</html>