<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/user-forgotpass.css">
</head>
<body>
<header>
      <nav>
        <a href="#home" id="logo">Site Logo</a>
        <i class="fas fa-bars" id="ham-menu"></i>
        <ul id="nav-bar">
          <li>
            <a href="<?php echo URLROOT; ?>/users/login">Login</a>
          </li>
          <li>
            <a href="<?php echo URLROOT; ?>/users/register">Register</a>
          </li>
        </ul>
      </nav>
    </header>
<div class="recovery-form">
    <h2>Recover Account</h2>
    <?php if($data['message']){
        echo "<div style='color: blue; text-align: center; margin-bottom: 10px;'>".$data['message']."</div>";
    }; ?>
    <form action="<?php echo URLROOT; ?>/users/forgotpassword" class="form" id="supportForm" method="post" enctype="multipart/form-data">
        <label for="recoveryType">Recovery Type:</label>
        <select id="recoveryType" name="recoveryType" onchange="showFormSection()" required>
            <option value="">Select the recovery Type</option>
            <option value="emailMethod">Using Email</option>
            <option value="passwordMethod">Using Previous Password</option>
            <option value="dontRemember">Other</option>
        </select>

        <div id="emailMethodForm" class="form-section">
            <label for="email_accountName">User Name:</label>
            <input type="text" id="email_accountName" name="email_accountName">

            <label for="email">Email:</label>
            <input type="text" id="email" name="email">
        </div>

        <div id="passwordMethodForm" class="form-section">
            <label for="pw_accountName">User Name:</label>
            <input type="text" id="pw_accountName" name="pw_accountName">

            <label for="password">Last Password Remember:</label>
            <input type="text" id="password" name="password">
        </div>

        <div id="dontRememberForm" class="form-section">
            <div>
                Please provide the following to the best of your ability. Leave fields blank if you are unsure. Providing more information will help us verify your identity.
            </div><br>
            <label for="other_accountName">User Name:</label>
            <input type="text" id="other_accountName" name="other_accountName">

            <label for="lastPurchase">Last Purchase Item:</label>
            <input type="text" id="lastPurchase" name="lastPurchase">

            <label for="lastPurchaseDate">Last Purchase Date:</label>
            <input type="date" id="lastPurchaseDate" name="lastPurchaseDate">

            <label for="firstPurchase">First Purchase Item:</label>
            <input type="text" id="firstPurchase" name="firstPurchase">
            
            <label for="firstPurchaseDate">First Purchase Date:</label>
            <input type="date" id="firstPurchaseDate" name="firstPurchaseDate">

            <label for="accountCreatedDate">Account Created Date:</label>
            <input type="date" id="accountCreatedDate" name="accountCreatedDate">

            <label for="mobileNumber">Mobile Number:</label>
            <input type="text" id="mobileNumber" name="mobileNumber">

            <label for="address">Address:</label>
            <input type="text" id="address" name="address">

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob">

            <label for="gender">Gender:</label>
            <input type="text" id="gender" name="gender">

            <label for="otherInfo">Any other information:</label>
            <textarea id="otherInfo" name="otherInfo"></textarea>
            
            <div>
                <b>Please provide an email for us to contact you.</b>
            </div><br>
            <label for="contactEmail">Contact Email:</label>
            <textarea id="contactEmail" name="contactEmail"></textarea>
        </div>

        <br>
        <button type="submit" id="submit-btn">Submit</button>
    </form>
</div>

<script>
    function showFormSection() {
        var selectedValue = document.getElementById("recoveryType").value;
        var formSections = document.getElementsByClassName("form-section");

        for (var i = 0; i < formSections.length; i++) {
            formSections[i].style.display = "none";
        }

        if (selectedValue !== "") {
            document.getElementById(selectedValue + "Form").style.display = "block";
        }
    }
</script>
</body>
</html>
