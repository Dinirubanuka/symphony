<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/mod-acc-request-view.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin-index.css">
  <title>Profile View</title>
</head>
<body>
<div class="container_body">
    <div class="adminsidebar">
      <?php require APPROOT . '/views/inc/mod-sidebar.php'; ?>
    </div>
    <div class="right-component">
    <div class="overlay" id="overlay"></div>
      <div class="profile-container">
        <div class="profile-header">
          <div class="business-name">
            <h2>Recover Account - User | <?php echo $data['recover']->user_name; ?></h2>
          </div>
        </div>
        <div class="buttons">
            <div <?php echo $data['recover']->status == 'Pending' ? '' : 'style="display: none;"'; ?>>
              <button id="assignBtn" onclick="assignUser()">Assign User</button>
              <button contact_email="<?php echo $data['recover']->contactEmail ?>" request_id="<?php echo $data['recover']->recover_id  ?>" id="changePassBtn" onclick="changePassword(this)">Change Password</button>
              <button id="rejectBtn" onclick="rejectRequest(<?php echo $data['recover']->recover_id  ?>)">Reject Request</button>
            </div>
          </div>
        <div class="bio-data">
          <div class="form-data">
            <div class="business-data">
                <div>
                    <strong><h3><u>Request Data</u></h3></strong>
                </div><br>
                <div>
                    <strong>Request ID: </strong><?php echo $data['recover']->recover_id  ?>
                </div><br>
                <div>
                    <strong>User Name: </strong><?php echo $data['recover']->user_name ?>
                </div><br>
                <div>
                    <strong>Account Created On: </strong><?php echo $data['recover']->account_created_on ?>
                </div><br>
                <div>
                    <strong>Contact No: </strong><?php echo $data['recover']->mobile_number ?>
                </div><br>
                <div>
                    <strong>Contact Email: </strong><?php echo $data['recover']->contactEmail ?>
                </div><br>
                <div>
                    <strong>Birth Date: </strong><?php echo $data['recover']->dob ?>
                </div><br>
                <div>
                    <strong>Address: </strong><?php echo $data['recover']->address ?>
                </div><br>
                <div>
                    <strong>Gender: </strong><?php echo $data['recover']->gender ?>
                </div><br>
                <div>
                    <strong>Sequrity Question: </strong><?php echo $data['recover']->securityQuestion ?>
                </div><br>
                <div>
                    <strong>Answer: </strong><?php echo $data['recover']->securityAnswer ?>
                </div><br>
                <div>
                    <strong>Other Details: </strong><?php echo $data['recover']->other ?>
                </div><br>
                <div>
                    <strong>Request Placed On: </strong><?php echo $data['recover']->placed_on ?>
                </div><br>
                <div>
                    <strong>First Purchase Item: </strong><?php echo $data['recover']->first_purchase_item ?>
                </div><br>
                <div>
                    <strong>First Purchase Date: </strong><?php echo $data['recover']->first_purchase_date ?>
                </div><br>
                <div>
                    <strong>Last Purchase Item: </strong><?php echo $data['recover']->last_purchase_item ?>
                </div><br>
                <div>
                    <strong>Last Purchase Date: </strong><?php echo $data['recover']->last_purchase_date ?>
                </div><br>
                <div class = "status-<?php echo $data['recover']->status ?>">
                    <strong>Status: </strong><?php echo $data['recover']->status ?>
                </div><br>
            </div>
            <div class="assigned-user-data">

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
    <!-- Modal -->
    <div id="userModal" class="modal">
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>Created On</th>
            <th>Birth Date</th>
            <th>Contact Number</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Similarity Percentage</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data['user'] as $user): ?>
            <tr>
            <td><?php echo $user['User ID']; ?></td>
            <td><?php echo $user['User Name']; ?></td>
            <td><?php echo $user['Account Created On']; ?></td>
            <td><?php echo $user['Birth Date']; ?></td>
            <td><?php echo $user['Contact No']; ?></td>
            <td><?php echo $user['Address']; ?></td>
            <td><?php echo $user['Gender']; ?></td>
            <td>
                <div class="similarity-<?php    if($user['Similarity Percentage'] >= 80) {
                                                    echo 'very-high';
                                                } else if($user['Similarity Percentage'] >= 60) {
                                                    echo 'high';
                                                } else if($user['Similarity Percentage'] >= 40) {
                                                    echo 'medium';
                                                } else if($user['Similarity Percentage'] >= 20) {
                                                    echo 'low';
                                                } else {
                                                    echo 'very-low';
                                                }?> "> 
                    <?php echo $user['Similarity Percentage']; ?>%
                </div>
            </td>
            <td>
                <button id="selectBtn" onclick="selectUser('<?php echo $user['User ID']; ?>')">
                    Select
                </button>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <button id="closeBtn" onclick="closeModal()">Close</button>
</div>
<script>
    
var selectedUserDetails = null;
  var userData = <?php echo json_encode($data['user']); ?>;

  function assignUser() {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('userModal').style.display = 'block';
  }

  function selectUser(userId) {
    // Find the selected user in the userData array
    var selectedUser = userData.find(user => user['User ID'] == userId);
    selectedUserDetails = selectedUser;

    // Update the assigned-user-data div with the selected user details
    var assignedUserDataDiv = document.querySelector('.assigned-user-data');
    assignedUserDataDiv.innerHTML = ''; // Clear existing content

    // Create an h3 element with an underline for Selected User Data
    var heading = document.createElement('h3');
    heading.style.textDecoration = 'underline';
    heading.textContent = 'Selected User Data';
    assignedUserDataDiv.appendChild(heading);

    // Add a line break after each detail
    var lineBreak = document.createElement('br');
    assignedUserDataDiv.appendChild(lineBreak);

    // Display other user details
    for (var key in selectedUser) {
        if (selectedUser.hasOwnProperty(key) && key !== 'Purchases') {
            var detail = document.createElement('div');
            detail.innerHTML = `<strong>${key}:</strong> ${selectedUser[key]}`;
            if (key === 'Status') {
                detail.classList.add(`status-${selectedUser[key]}`);
            }
            assignedUserDataDiv.appendChild(detail);

            // Add a line break after each detail
            var lineBreak = document.createElement('br');
            assignedUserDataDiv.appendChild(lineBreak);
        }
    }

    // Display the "Purchases" attribute sorted by "Order Placed On"
    var purchases = selectedUser['Purchases'];

    if (Array.isArray(purchases) && purchases.length > 0) {
        // Sort the purchases array by "Order Placed On"
        purchases.sort((a, b) => new Date(a['Order Placed On']) - new Date(b['Order Placed On']));

        var purchasesHeading = document.createElement('h3');
        purchasesHeading.textContent = 'Purchases:';
        assignedUserDataDiv.appendChild(purchasesHeading);
        
        // Add a line break after each detail
        var lineBreak = document.createElement('br');
        assignedUserDataDiv.appendChild(lineBreak);


        for (var i = 0; i < purchases.length; i++) {
            var purchaseDetail = document.createElement('div');
            purchaseDetail.innerHTML = `<strong>${purchases[i]['Product Name']} (${purchases[i]['Product ID']})</strong> - Order Placed On: ${purchases[i]['Order Placed On']}`;
            assignedUserDataDiv.appendChild(purchaseDetail);

            // Add a line break after each purchase detail
            var purchaseLineBreak = document.createElement('br');
            assignedUserDataDiv.appendChild(purchaseLineBreak);
        }
    }

    // Close the modal
    closeModal();
}

  function closeModal() {
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('userModal').style.display = 'none';
  }

  function changePassword(element) {
    if (selectedUserDetails) {
        var userId = selectedUserDetails['User ID'];
        var request_id = element.getAttribute('request_id');
        var contactEmail = element.getAttribute('contact_email');
        if(confirm(`Are you sure you want to change the password for the user with ID ${userId}?`)) {
            window.location.href = `<?php echo URLROOT; ?>/moderators/changeUserPassword/${userId}/${contactEmail}/${request_id}`;
        }
    } else {
        alert('Please select a user to change the password');
    }
}

function rejectRequest(recover_id) {
    // Show a prompt to enter the reason for rejection
    var rejectionReason = prompt("Please enter the reason for rejecting the recover request:");

    // If the user provides a reason and clicks "OK", proceed with rejection
    if (rejectionReason !== null && rejectionReason !== "") {
        // URL encode the reason to include it in the URL
        var encodedReason = rejectionReason.replace(/ /g, '_');
        
        if (confirm(`Are you sure you want to reject the recover request with ID ${recover_id}?`)) {
            // Redirect to the rejection URL with the encoded reason
            window.location.href = `<?php echo URLROOT; ?>/moderators/rejectRecoverRequest/${recover_id}/${encodedReason}`;
        }
    } else {
        // If the user clicks "Cancel" or provides an empty reason, do nothing
        alert('Rejection canceled. Please provide a valid reason.');
    }
}

</script>

</body>
</html>
