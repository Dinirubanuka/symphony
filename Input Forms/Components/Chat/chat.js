function toggleChat() {
    var chatContainer = document.getElementById('chat-container');
    chatContainer.style.display = (chatContainer.style.display === 'block') ? 'none' : 'block';
    scrollToBottom()
  }
  // Assuming you have an element representing the chat container
// Assuming you have an element representing the chat container
// Assuming you have an element representing the chat container
var chatContainer = document.querySelector('.msg-page');
var sendIcon = document.querySelector('.send-icon');
var messageInput = document.querySelector('.form-control');
// Function to scroll to the bottom of the chat container
function scrollToBottom() {
    chatContainer.scrollTop = chatContainer.scrollHeight;
}

// Function to get the current date and time
function getCurrentDateTime() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var day = now.getDate();
    var month = now.toLocaleString('default', { month: 'long' }); // Get the full month name
    var year = now.getFullYear();
    var ampm = hours >= 12 ? 'PM' : 'AM';

    // Convert hours to 12-hour format
    hours = hours % 12;
    hours = hours ? hours : 12;

    // Add leading zero to minutes and seconds if needed
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;

    // Format: Month Day, Year HH:mm:ss AM/PM
    var currentDateTime =hours + ':' + minutes + ':' + seconds + ' ' + ampm + ' | ' + month + ' ' + day + ' ' + year;

    return currentDateTime;
}



// Function to add a new message to the chat
function addNewMessage(messageText, isOutgoing) {
    // Create a new message element
    var newMessage = document.createElement('div');
    newMessage.className = isOutgoing ? 'outgoing-chats' : 'received-chats';

    // Get the current date and time
    var currentDateTime = getCurrentDateTime();

    // Add content to the message element
    if(isOutgoing){
        newMessage.innerHTML = `
            <div class="outgoing-chats">
                <div class="outgoing-chats-img">
                    <img src="user1.jpg" />
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
                    <img src="user2.jpg" />
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

    // Append the new message to the chat container
    chatContainer.appendChild(newMessage);

    // Scroll to the bottom after adding the message
    scrollToBottom();
}

// Event listener for the send icon
sendIcon.addEventListener('click', function() {
    addNewMessage("Hello, this is a new outgoing message!", false)
    // Get the message text from the input field
    var messageText = messageInput.value.trim();

    // Check if the message is not empty
    if (messageText !== '') {
        // Add a new outgoing message to the chat
        addNewMessage(messageText, true);

        // Clear the input field
        messageInput.value = '';
    }
});

// Example usage:
// You can also call addNewMessage function elsewhere in your code to add incoming messages.
// addNewMessage("Hi there, this is an incoming message!", false);

function scrollToBottom() {
    chatContainer.scrollTop = chatContainer.scrollHeight;
}

// Example usage:
// addNewMessage("Hello, this is a new outgoing message!", true);
// addNewMessage("Hi there, this is a new incoming message!", false);
