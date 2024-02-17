function toggleChat() {
    var chatContainer = document.getElementById('chat-container');
    chatContainer.style.display = (chatContainer.style.display === 'block') ? 'none' : 'block';
    scrollToBottom()
  }
var chatContainer = document.querySelector('.msg-page');
var sendIcon = document.querySelector('.send-icon');
var messageInput = document.querySelector('.form-control');
function scrollToBottom() {
    chatContainer.scrollTop = chatContainer.scrollHeight;
}

function getCurrentDateTime() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var day = now.getDate();
    var month = now.toLocaleString('default', { month: 'long' }); // Get the full month name
    var year = now.getFullYear();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;
    var currentDateTime =hours + ':' + minutes + ':' + seconds + ' ' + ampm + ' | ' + month + ' ' + day + ' ' + year;
    return currentDateTime;
}

sendIcon.addEventListener('click', function() {
    var messageText = messageInput.value.trim();
    if (messageText !== '') {
        addNewMessage(messageText, true);
        messageInput.value = '';
    }
});

function scrollToBottom() {
    chatContainer.scrollTop = chatContainer.scrollHeight;
}