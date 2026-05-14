document.getElementById('contactForm').addEventListener('submit', async (e) => {
    e.preventDefault();

    // Get form values
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const subject = document.getElementById('subject').value.trim();
    const message = document.getElementById('message').value.trim();

    // Clear previous errors
    document.getElementById('nameError').textContent = '';
    document.getElementById('emailError').textContent = '';
    document.getElementById('subjectError').textContent = '';
    document.getElementById('messageError').textContent = '';

    let valid = true;

    // Validation checks
    if (name.length < 3) {
        document.getElementById('nameError').textContent = 'Name must be at least 3 characters.';
        valid = false;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        document.getElementById('emailError').textContent = 'Please enter a valid email address.';
        valid = false;
    }

    if (subject.length < 3) {
        document.getElementById('subjectError').textContent = 'Subject must be at least 3 characters.';
        valid = false;
    }

    if (message.length < 20) {
        document.getElementById('messageError').textContent = 'Message must be at least 20 characters.';
        valid = false;
    }

    if (!valid) return;

    // Show sending status
    const status = document.getElementById('formStatus');
    status.className = '';
    status.textContent = 'Sending...';
    status.style.display = 'block';

    try {
        // Send form data to API
        const response = await fetch('api/contact.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ name, email, subject, message })
        });

        const data = await response.json();

        if (data.success) {
            status.className = 'success';
            status.textContent = 'Your message has been sent successfully!';
            document.getElementById('contactForm').reset();
        } else {
            status.className = 'error';
            status.textContent = 'An error occurred, please try again.';
        }
    } catch (err) {
        status.className = 'error';
        status.textContent = 'Connection error!';
    }
});