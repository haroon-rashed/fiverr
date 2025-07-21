<x-layout>

<!-- Notification Popup -->
<div id="notification" class="notification">
    <button class="close-btn" onclick="hideNotification()">&times;</button>
    <strong>Success!</strong>
    <p class="message mb-0"></p>
</div>

<style>
.notification {
  position: fixed;
  bottom: -100px;
  right: 20px;
  z-index: 9999;
  min-width: 300px;
  max-width: 350px;
  padding: 15px 20px;
  border-radius: 12px;
  background: linear-gradient(135deg, #4e54c8, #8f94fb);
  color: white;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
  opacity: 0;
  transform: translateY(100%);
  transition: all 0.5s ease-in-out;
  font-family: 'Segoe UI', sans-serif;
}

.notification.show {
  opacity: 1;
  transform: translateY(0);
  bottom: 20px;
}

.notification .close-btn {
  background: transparent;
  border: none;
  color: white;
  font-size: 1.4rem;
  position: absolute;
  right: 10px;
  top: 5px;
  cursor: pointer;
}
</style>

<script>
function showNotification(message = "Operation completed successfully!") {
    const notification = document.getElementById("notification");
    const messageElement = notification.querySelector(".message");

    messageElement.textContent = message;
    notification.classList.add("show");

    // Auto hide after 5 seconds
    setTimeout(() => {
        hideNotification();
    }, 5000);
}

function hideNotification() {
    const notification = document.getElementById("notification");
    notification.classList.remove("show");
}
</script>



</x-layout>