<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/chat.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/mod-inquiry.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin-index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"/>

  <title>User Inquiry</title>
</head>
<body>
<script>
document.addEventListener('DOMContentLoaded', function() {
            if (<?php echo json_encode($data['inquiry']->status == 'In-Progress'); ?>) {
                toggleChat();
            }
});
      
function approveInquiry(inquiryId) {
    console.log('Button clicked for inquiry ID:', inquiryId);
    window.location.href = "<?php echo URLROOT; ?>/administrators/approveInquiry/"+inquiryId;
}

function completeInquiry(inquiryId) {
    console.log('Button clicked for inquiry ID:', inquiryId);
    window.location.href = "<?php echo URLROOT; ?>/administrators/completeInquiry/"+inquiryId;
}
</script>
<div class="container_body">
    <div class="adminsidebar">
      <?php require APPROOT . '/views/inc/admin-sidebar.php'; ?>
    </div>
    <div class="right-component">
      <div class="inquiry-container">
        <div class="inquiry-header">
          <h2>Inquiry ID: #<?php echo $data['inquiry']->inquiry_id ?></h2>
        </div>

        <div class="user-moderator-grid">
          <div class="user-section">
          <h3>User Information</h3><br><br>
            <div class="profile-picture">
              <img src="<?php echo URLROOT; ?>/img/mag_img/<?php echo $data['user']->profile_photo ?>">
            </div><br>
            <div class="user-details">
              <p><strong>Name: </strong><?php echo $data['user']->name ?></p><br>
              <p><strong>Email: </strong><?php echo $data['user']->email ?></p><br>
            </div>
          </div>

          <div class="moderator-section">
          <div <?php echo $data['inquiry']->status == 'Pending' ? '' : 'style="display: none;"'; ?>>
            <button class="approve-button" onclick="approveInquiry(<?php echo $data['inquiry']->inquiry_id ?>)">Accept Inquiry</button>
          </div>
          <div <?php echo $data['inquiry']->status == 'Pending' ? 'style="display: none;"' : ''; ?>>
              <h3>Moderator Information</h3><br><br>
              <p><strong>Name: </strong><?php echo $data['moderator']->moderator_name ?></p><br>
              <p><strong>Email: </strong><?php echo $data['moderator']->moderator_email ?></p><br>
              <p><strong>Moderator ID: </strong><?php echo $data['moderator']->moderator_id  ?></p><br>
            </div>
          <div <?php echo $data['inquiry']->status == 'In-Progress' ? '' : 'style="display: none;"'; ?>>
            <button class="complete-button" onclick="completeInquiry(<?php echo $data['inquiry']->inquiry_id ?>)">Mark As Completed</button>
          </div>
          </div>
        </div>

        <div class="inquiry-content">
          <h3>Inquiry Details</h3><br>
            <div><strong>Inquiry Type: </strong><?php echo $data['inquiry']->inquiryType ?></div><br>
            <div class="status-<?php echo $data['inquiry']->status ?>"><strong>Status:</strong> <?php echo $data['inquiry']->status ?></div><br>
            <?php if ($data['inquiry']->inquiryType == 'Recover Account'): ?>
                <div><strong>Account Name: </strong><?php echo $data['inquiry']->field_1; ?><br><br>
                <div><strong>Phone Number: </strong><?php echo $data['inquiry']->field_2; ?><br><br>
                <div><strong>Description: </strong><?php echo $data['inquiry']->field_3; ?><br>
            <?php elseif ($data['inquiry']->inquiryType == 'Technical Issue'): ?>
                <div><strong>Issue Type: </strong><?php echo $data['inquiry']->field_1; ?><br><br>
                <div><strong>Issue Description: </strong><?php echo $data['inquiry']->field_2; ?><br>
                <div class="inquiry-image-container">
                    <img src="<?php echo URLROOT; ?>/img/inquiries/<?php echo $data['inquiry']->photo_1; ?>">
                    <img src="<?php echo URLROOT; ?>/img/inquiries/<?php echo $data['inquiry']->photo_2; ?>">
                    <img src="<?php echo URLROOT; ?>/img/inquiries/<?php echo $data['inquiry']->photo_3; ?>">
                </div>
            <?php elseif ($data['inquiry']->inquiryType == 'Report Bug'): ?>
                <div><strong>Bug: </strong><?php echo $data['inquiry']->field_1; ?><br><br>
                <div><strong>Bug Description: </strong><?php echo $data['inquiry']->field_2; ?><br>
                <div class="inquiry-image-container">
                    <img src="<?php echo URLROOT; ?>/img/inquiries/<?php echo $data['inquiry']->photo_1; ?>">
                    <img src="<?php echo URLROOT; ?>/img/inquiries/<?php echo $data['inquiry']->photo_2; ?>">
                    <img src="<?php echo URLROOT; ?>/img/inquiries/<?php echo $data['inquiry']->photo_3; ?>">
                </div>
            <?php elseif ($data['inquiry']->inquiryType == 'Billing Issue'): ?>
                <div><strong>Billing Issue: </strong><?php echo $data['inquiry']->field_1; ?><br><br>
                <div><strong>Issue Explenation: </strong><?php echo $data['inquiry']->field_2; ?><br>
            <?php elseif ($data['inquiry']->inquiryType == 'Refund Purchase'): ?>
                <div><strong>Order ID: </strong><?php echo $data['inquiry']->field_1; ?><br><br>
                <div><strong>Refund Reason: </strong><?php echo $data['inquiry']->field_2; ?><br>
            <?php elseif ($data['inquiry']->inquiryType == 'Report User'): ?>
                <div><strong>User Profile: </strong><?php echo $data['inquiry']->field_1; ?><br><br>
                <div><strong>Reason: </strong><?php echo $data['inquiry']->field_2; ?><br>
            <?php elseif ($data['inquiry']->inquiryType == 'Question'): ?>
                <div><strong>Question: </strong><?php echo $data['inquiry']->field_1; ?><br><br>
                <div><strong>Description: </strong><?php echo $data['inquiry']->field_2; ?><br>
            <?php elseif ($data['inquiry']->inquiryType == 'Other'): ?>
                <div><strong>Type: </strong><?php echo $data['inquiry']->field_1; ?><br><br>
                <div><strong>Description: </strong><?php echo $data['inquiry']->field_2; ?><br>
                <div class="inquiry-image-container">
                    <img src="<?php echo URLROOT; ?>/img/inquiries/<?php echo $data['inquiry']->photo_1; ?>">
                    <img src="<?php echo URLROOT; ?>/img/inquiries/<?php echo $data['inquiry']->photo_2; ?>">
                    <img src="<?php echo URLROOT; ?>/img/inquiries/<?php echo $data['inquiry']->photo_3; ?>">
                </div>
            <?php endif; ?>
        </div>
      </div>
      <button id="chat-button" onclick="toggleChat()" <?php echo $data['inquiry']->status == 'In-Progress' ? '' : 'style="display: none;"'; ?>>Open Chat</button>

      <div id="chat-container" <?php echo $data['inquiry']->status == 'In-Progress' ? '' : 'style="display: none;"'; ?>>
            <!-- msg-header section starts -->
            <div class="msg-header">
              <div class="container1">
                <img src="http://localhost/symphony/img/mag_img/<?php echo $data['user']->profile_photo;?>" class="msgimg" />
                <div class="active">
                  <p><?php echo $data['user']->name; ?></p>
                </div>
                <!-- Minimize button -->
              <div class="minimize-button" onclick="toggleChat()">
                <i class="bi bi-dash-square"></i> <!-- You can use any icon you prefer -->
            </div>
              </div>
            </div>
            <!-- msg-header section ends -->
      
            <!-- Chat inbox  -->
            <div class="chat-page">
              <div class="msg-inbox">
                <div class="chats">
                  <!-- Message container -->
                  <div class="msg-page">
                    <!-- Incoming messages -->
                    <?php foreach ($data['chat'] as $chat) :
                          if ($chat->created_by == 'user'){
                            echo '<div class="received-chats">
                            <div class="received-chats-img">
                              <img src="http://localhost/symphony/img/mag_img/' . $data['user']->profile_photo . '" />
                            </div>
                            <div class="received-msg">
                              <div class="received-msg-inbox">
                                <p>
                                  ' . $chat->chat_data . '
                                </p>
                                <span class="time">' . $chat->chat_date . '</span>
                              </div>
                            </div>
                          </div>';
                          } else {
                            echo '<div class="outgoing-chats">
                            <div class="outgoing-chats-img">
                              <img src="http://localhost/symphony/img/moderator.jpg" />
                            </div>
                            <div class="outgoing-msg">
                              <div class="outgoing-chats-msg">
                                <p>
                                ' . $chat->chat_data . '
                                </p>
            
                                <span class="time">' . $chat->chat_date . '</span>
                              </div>
                            </div>
                          </div>';
                          } ?>
                    <?php endforeach; ?>
                  </div>
                </div>
      
                <!-- msg-bottom section -->
      
                <div class="msg-bottom">
                  <div class="input-group">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Write message..."
                    />
      
                    <span class="input-group-text send-icon">
                      <i class="bi bi-send" onclick=""></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </div>
<script src="<?php echo URLROOT; ?>/js/mod-user-chat.js"></script>
<script>
function addNewMessage(messageText, isOutgoing) {
    var newMessage = document.createElement('div');
    newMessage.className = isOutgoing ? 'outgoing-chats' : 'received-chats';
    var currentDateTime = getCurrentDateTime();
    if(isOutgoing){
        newMessage.innerHTML = `
            <div class="outgoing-chats">
                <div class="outgoing-chats-img">
                    <img src="http://localhost/symphony/img/moderator.jpg" />
                </div>
                <div class="outgoing-msg">
                    <div class="outgoing-chats-msg">
                        <p>
                            ${messageText}
                        </p>

                        <span class="time">${currentDateTime}</span>
                    </div>
                </div>
            </div>
        `;
    } else {
        newMessage.innerHTML = `
            <div class="received-chats">
                <div class="received-chats-img">
                    <img src="http://localhost/symphony/img/mag_img/' . $data['user']->profile_photo . '" />
                </div>
                <div class="received-msg">
                    <div class="received-msg-inbox">
                        <p>
                            ${messageText}
                        </p>
                        <span class="time">${currentDateTime}</span>
                    </div>
                </div>
            </div>
        `;
    }
    chatContainer.appendChild(newMessage);
    var modifieddate = currentDateTime.replace(/ /g, "_");
    var modifiedmessage = messageText.replace(/ /g, "_");
    window.location.href = "<?php echo URLROOT; ?>/administrators/sendMessageUser/"+modifiedmessage+"/"+<?php echo $data['inquiry']->inquiry_id ?>+"/"+<?php echo $data['user']->id ?>+"/"+modifieddate;   
}
</script>
</body>
</html>
