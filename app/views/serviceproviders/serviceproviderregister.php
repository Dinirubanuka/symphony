<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <style>
      /* Import Google font - Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  background: rgb(130, 106, 251);
}
.container {
  position: relative;
  max-width: 700px;
  width: 100%;
  background: #fff;
  padding: 25px;
  border-radius: 8px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}
.container header {
  font-size: 1.5rem;
  color: #333;
  font-weight: 500;
  text-align: center;
}
.container .form {
  margin-top: 30px;
}
.form .input-box {
  width: 100%;
  margin-top: 20px;
}
.input-box label {
  color: #333;
}
.form :where(.input-box input, .select-box) {
  position: relative;
  height: 50px;
  width: 100%;
  outline: none;
  font-size: 1rem;
  color: #707070;
  margin-top: 8px;
  border: 1px solid #ddd;
  border-radius: 6px;
  padding: 0 15px;
}
.input-box input:focus {
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}
.form .column {
  display: flex;
  column-gap: 15px;
}
.form .invalid-feedback{
  color: red;
}
.is-invalid {
  border-color: #dc3545; /* Red border color */
  background-color: #f8d7da; /* Light red background color */
  color: #dc3545; /* Red text color */
}

.form .gender-box {
  margin-top: 20px;
}
.gender-box h3 {
  color: #333;
  font-size: 1rem;
  font-weight: 400;
  margin-bottom: 8px;
}
.form :where(.gender-option, .gender) {
  display: flex;
  align-items: center;
  column-gap: 50px;
  flex-wrap: wrap;
}
.form .gender {
  column-gap: 5px;
}
.gender input {
  accent-color: rgb(130, 106, 251);
}
.form :where(.gender input, .gender label) {
  cursor: pointer;
}
.gender label {
  color: #707070;
}
.address :where(input, .select-box) {
  margin-top: 15px;
}
.select-box select {
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  color: #707070;
  font-size: 1rem;
}
.form button {
  height: 55px;
  width: 100%;
  color: #fff;
  font-size: 1rem;
  font-weight: 400;
  margin-top: 30px;
  border: none;
  cursor: pointer;
  transition: all 0.2s ease;
  background: rgb(130, 106, 251);
}
.form button:hover {
  background: rgb(88, 56, 250);
}
/*Responsive*/
@media screen and (max-width: 500px) {
  .form .column {
    flex-wrap: wrap;
  }
  .form :where(.gender-option, .gender) {
    row-gap: 15px;
  }
}
    </style>
  </head>
  <body>
    <section class="container">
      <header>Registration Form</header>
      <form action="<?php echo URLROOT; ?>/serviceproviders/serviceproviderregister" class="form" method="post">
        <div class="input-box">
          <label>Business Name</label>
          <!-- <input type="text" placeholder="Enter full name" required /> -->
          <input type="text" name="business_name" class="<?php echo (!empty($data['business_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['business_name']; ?>">
          <span class="invalid-feedback"><?php echo $data['business_name_err']; ?></span>
        </div>

        <div class="input-box">
          <label>Business Email Address</label>
          <!-- <input type="text" placeholder="Enter email address" required /> -->
          <input type="email" name="business_email" class="<?php echo (!empty($data['business_email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['business_email']; ?>">
          <span class="invalid-feedback"><?php echo $data['business_email_err']; ?></span>
        </div>

        <div class="input-box">
        <label>Business Phone Number</label>
        <!-- <input type="number" placeholder="Enter phone number" required /> -->
        <input type="number" name="business_contact_no" class="<?php echo (!empty($data['business_contact_no_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['business_contact_no']; ?>">
        <span class="invalid-feedback"><?php echo $data['business_contact_no_err']; ?></span>
        </div>

        <div class="input-box address">
          <label>Business Address</label>
          <input type="text" name="business_address" class="<?php echo (!empty($data['business_address_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['business_address']; ?>">
          <span class="invalid-feedback"><?php echo $data['business_address_err']; ?></span><br><br>
          <label>Password</label>
          <input type="password" name="password" class="<?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
          <span class="invalid-feedback"><?php echo $data['password_err']; ?></span><br><br>
          <label>Confirm Password</label>
          <input type="password" name="confirm_password" class="<?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
          <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
        </div>  

        <div class="input-box">
          <label>Owner Name</label>
          <!-- <input type="text" placeholder="Enter full name" required /> -->
          <input type="text" name="owner_name" class="<?php echo (!empty($data['owner_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['owner_name']; ?>">
          <span class="invalid-feedback"><?php echo $data['owner_name_err']; ?></span>
        </div>

        <div class="input-box">
          <label>Owner Email Address</label>
          <!-- <input type="text" placeholder="Enter email address" required /> -->
          <input type="owner_email" name="owner_email" class="<?php echo (!empty($data['owner_email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['owner_email']; ?>">
          <span class="invalid-feedback"><?php echo $data['owner_email_err']; ?></span>
        </div>

        <div class="input-box">
        <label>Owner Phone Number</label>
        <!-- <input type="number" placeholder="Enter phone number" required /> -->
        <input type="number" name="owner_contact_no" class="<?php echo (!empty($data['owner_contact_no_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['owner_contact_no']; ?>">
        <span class="invalid-feedback"><?php echo $data['owner_contact_no_err']; ?></span>
        </div>

        <div class="input-box">
        <label>Owner Address</label>
        <input type="text" name="owner_address" class="<?php echo (!empty($data['owner_address_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['owner_address']; ?>">
        <span class="invalid-feedback"><?php echo $data['owner_address_err']; ?></span><br><br>
        </div>

        <div class="input-box">
        <label>Owner NIC Number</label>
        <input type="text" name="owner_nic" class="<?php echo (!empty($data['owner_nic_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['owner_nic']; ?>">
        <span class="invalid-feedback"><?php echo $data['owner_nic_err']; ?></span><br><br>
        </div>

        <div class="input-box">
        <label>About</label>
        <input type="text" name="about"  class="<?php echo (!empty($data['about_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['about']; ?>">
        <span class="invalid-feedback"><?php echo $data['about_err']; ?></span>
        </div>

        <button>Submit</button>
      </form>
    </section>
  </body>
</html>