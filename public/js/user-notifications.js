document.addEventListener("DOMContentLoaded", function() {
    const notificationBtn = document.getElementById('notificationBtn');
    const notificationDropdown = document.getElementById('notificationDropdown');

    // Toggle dropdown menu when notification button is clicked
    notificationBtn.addEventListener('click', function() {
      if (notificationDropdown.style.display === 'block') {
        notificationDropdown.style.display = 'none';
      } else {
        notificationDropdown.style.display = 'block';
      }
    });

    // Close notification when close button is clicked
    const closeButtons = document.querySelectorAll('.close-btn');
    closeButtons.forEach(function(button) {
      button.addEventListener('click', function() {
        const notificationItem = button.parentNode;
        notificationItem.style.display = 'none';
      });
    });

    // Mark all notifications as read when "Mark All as Read" button is clicked
    const markAllAsReadBtn = document.querySelector('.mark-all-as-read-btn');
    markAllAsReadBtn.addEventListener('click', function() {
      const notificationItems = document.querySelectorAll('.notification-item');
      notificationItems.forEach(function(item) {
        item.style.display = 'none';
      });
    });
  });