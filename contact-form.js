document.getElementById('contactForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent default form submission

    const responseMessage = document.getElementById('responseMessage');
    responseMessage.style.display = 'none';
    responseMessage.classList.remove('success', 'error');

    // Helper function to show and auto-hide the message
    function showResponseMessage(message, type = 'success') {
        responseMessage.textContent = message;
        responseMessage.classList.remove('success', 'error');
        responseMessage.classList.add(type);
        responseMessage.style.display = 'block';    

        // Auto-hide after 5 seconds
        setTimeout(() => {
            console.log('Hiding message');
            responseMessage.style.display = 'none';
        }, 4000);
    }

    // Gather form data
    const formData = new FormData(this);

    // Send form data via AJAX
    fetch('submit-message.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            showResponseMessage(`Thank you, ${data.name}! Your message has been sent.`, 'success');
            this.reset(); // Optionally reset the form
        } else {
            showResponseMessage(`Sorry, Invalid Input: ${data.message}`, 'error');
        }
    })
    .catch(error => {
        showResponseMessage('An unexpected error occurred. Please try again.', 'error');
    });
});
