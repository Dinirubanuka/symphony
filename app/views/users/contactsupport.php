<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user-support.css"/>
  <title>Dashboard</title>
</head>
<body>
<!-----------profile-nav-bar-------->
<?php require_once APPROOT . '/views/inc/index-support.php'; ?>
<div class="contact-form">
        <h2>Contact Support</h2>
        <form action="<?php echo URLROOT; ?>/users/contactsupport" class="form" id="supportForm"  method="post" enctype="multipart/form-data">
            <label for="inquiryType">Inquiry Type:</label>
            <select id="inquiryType" name="inquiryType" onchange="showFormSection()">
                <option value="">Select an Inquiry Type</option>
                <option value="recoverAccount">Recover My Account</option>
                <option value="technicalIssue">Technical Issue</option>
                <option value="reportBug">Report a Bug</option>
                <option value="billingIssue">Billing/Payment Issue</option>
                <option value="refundPurchase">Refund a Purchase</option>
                <option value="reportUser">Report a User</option>
                <option value="question">Question</option>
                <option value="other">Other</option>
            </select>
    
            <div id="recoverAccountForm" class="form-section">
                <label for="accountName">User Name or Email:</label>
                <input type="text" id="accountName" name="accountName">
    
                <label for="phoneNumber">Phone Number:</label>
                <input type="text" id="phoneNumber" name="phoneNumber">
    
                <label for="accountDescription">Additional Data:</label>
                <textarea id="accountDescription" name="accountDescription" rows="4"></textarea>
            </div>
    
            <div id="technicalIssueForm" class="form-section">
                <label for="issueType">Issue Type:</label>
                <input type="text" id="issueType" name="issueType" >
    
                <label for="technicalDescription">Additional Data:</label>
                <textarea id="technicalDescription" name="technicalDescription" rows="4" ></textarea>
    
                <div class="photo_container">
                    <div class="input-box">
                        <label style="font-weight: bold">Add up to 3 photos (Optional)</label>
                    </div>
                    <div class="photo-table">
                        <div class="photo-outer">
                            <div class="photo-inner">
                                <img src="http://localhost/symphony/img/add-image.png" id="previewPhoto_1" onclick="triggerInput(1)">
                                <input type="file" id="photo_1" accept=".jpg, .jpeg, .png, .HEIC" name="photo_1" onchange="previewImage(this, 'previewPhoto_1')">
                            </div>
                        </div>
                        <div class="photo-outer">
                            <div class="photo-inner">
                                <img src="http://localhost/symphony/img/add-image.png" id="previewPhoto_2" onclick="triggerInput(2)">
                                <input type="file" id="photo_2" accept=".jpg, .jpeg, .png, .HEIC" name="photo_2" onchange="previewImage(this, 'previewPhoto_2')">
                            </div>
                        </div>
                        <div class="photo-outer">
                            <div class="photo-inner">
                                <img src="http://localhost/symphony/img/add-image.png" id="previewPhoto_3" onclick="triggerInput(3)">
                                <input type="file" id="photo_3" accept=".jpg, .jpeg, .png, .HEIC" name="photo_3" onchange="previewImage(this, 'previewPhoto_3')">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div id="reportBugForm" class="form-section">
                <label for="bugIssue">Issue:</label>
                <input type="text" id="bugIssue" name="bugIssue">
    
                <label for="bugDescription">Additional Data:</label>
                <textarea id="bugDescription" name="bugDescription" rows="4"></textarea>
    
                <div class="photo_container">
                    <div class="input-box">
                        <label style="font-weight: bold">Add up to 3 photos (Optional)</label>
                    </div>
                    <div class="photo-table">
                        <div class="photo-outer">
                            <div class="photo-inner">
                                <img src="http://localhost/symphony/img/add-image.png" id="previewPhoto_1" onclick="triggerInput(1)">
                                <input type="file" id="photo_1" accept=".jpg, .jpeg, .png, .HEIC" name="photo_1" onchange="previewImage(this, 'previewPhoto_1')">
                            </div>
                        </div>
                        <div class="photo-outer">
                            <div class="photo-inner">
                                <img src="http://localhost/symphony/img/add-image.png" id="previewPhoto_2" onclick="triggerInput(2)">
                                <input type="file" id="photo_2" accept=".jpg, .jpeg, .png, .HEIC" name="photo_2" onchange="previewImage(this, 'previewPhoto_2')">
                            </div>
                        </div>
                        <div class="photo-outer">
                            <div class="photo-inner">
                                <img src="http://localhost/symphony/img/add-image.png" id="previewPhoto_3" onclick="triggerInput(3)">
                                <input type="file" id="photo_3" accept=".jpg, .jpeg, .png, .HEIC" name="photo_3" onchange="previewImage(this, 'previewPhoto_3')">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div id="billingIssueForm" class="form-section">
                <label for="billingIssue">Issue:</label>
                <input type="text" id="billingIssue" name="billingIssue">
    
                <label for="billingExplanation">Brief Explanation:</label>
                <textarea id="billingExplanation" name="billingExplanation" rows="4"></textarea>
            </div>
    
            <div id="refundPurchaseForm" class="form-section">
                <label for="orderID">Order ID:</label>
                <input type="text" id="orderID" name="orderID">

    
                <label for="refundReason">Reason for Refund:</label>
                <textarea id="refundReason" name="refundReason" rows="4"></textarea>
            </div>
    
            <div id="reportUserForm" class="form-section">
                <label for="userProfile">User's Name/Profile Link:</label>
                <input type="text" id="userProfile" name="userProfile">
    
                <label for="reportReason">Reason:</label>
                <textarea id="reportReason" name="reportReason" rows="4"></textarea>
            </div>
    
            <div id="questionForm" class="form-section">
                <label for="userQuestion">Question:</label>
                <textarea id="userQuestion" name="userQuestion" rows="4"></textarea>
    
                <label for="questionDescription">Additional Data:</label>
                <textarea id="questionDescription" name="questionDescription" rows="4"></textarea>
            </div>
    
            <div id="otherForm" class="form-section">
                <label for="otherType">Type:</label>
                <input type="text" id="otherType" name="otherType">
    
                <label for="otherDescription">Additional Data:</label>
                <textarea id="otherDescription" name="otherDescription" rows="4"></textarea>
    
                <div class="photo_container">
                    <div class="input-box">
                        <label style="font-weight: bold">Add up to 3 photos (Optional)</label>
                    </div>
                    <div class="photo-table">
                        <div class="photo-outer">
                            <div class="photo-inner">
                                <img src="http://localhost/symphony/img/add-image.png" id="previewPhoto_1" onclick="triggerInput(1)">
                                <input type="file" id="photo_1" accept=".jpg, .jpeg, .png, .HEIC" name="photo_1" onchange="previewImage(this, 'previewPhoto_1')">
                            </div>
                        </div>
                        <div class="photo-outer">
                            <div class="photo-inner">
                                <img src="http://localhost/symphony/img/add-image.png" id="previewPhoto_2" onclick="triggerInput(2)">
                                <input type="file" id="photo_2" accept=".jpg, .jpeg, .png, .HEIC" name="photo_2" onchange="previewImage(this, 'previewPhoto_2')">
                            </div>
                        </div>
                        <div class="photo-outer">
                            <div class="photo-inner">
                                <img src="http://localhost/symphony/img/add-image.png" id="previewPhoto_3" onclick="triggerInput(3)">
                                <input type="file" id="photo_3" accept=".jpg, .jpeg, .png, .HEIC" name="photo_3" onchange="previewImage(this, 'previewPhoto_3')">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <br>    
            <button type="submit" id="submit-btn">Submit</button>
        </form>
    </div>

<script>
    function showFormSection() {
        var selectedValue = document.getElementById("inquiryType").value;
        var formSections = document.getElementsByClassName("form-section");
    
        for (var i = 0; i < formSections.length; i++) {
            formSections[i].style.display = "none";
        }
    
        if (selectedValue !== "") {
            document.getElementById(selectedValue + "Form").style.display = "block";
        }
    }

    function triggerInput(id){
        document.getElementById("photo_"+id).click();
    }
    function previewImage(input, imgId) {
        var preview = document.getElementById(imgId);

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    
</script>
</html>