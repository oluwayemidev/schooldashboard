<div class="contact-container">
    <h1>Contact Us</h1>

    <div class="contact-info">
        <div>
            <h2>Our Address</h2>
            <p>123 School Avenue,<br> City, Country</p>
        </div>
        <div>
            <h2>Email Us</h2>
            <p>contact@schooldashboard.com</p>
        </div>
        <div>
            <h2>Call Us</h2>
            <p>+123-456-7890</p>
        </div>
    </div>

    <div class="contact-form">
        <h2>Get in Touch</h2>
        <form action="/submit_contact_form" method="POST">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" required>

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="message">Your Message</label>
            <textarea id="message" name="message" placeholder="Enter your message" rows="4" required></textarea>

            <button type="submit">Send Message</button>
        </form>

        <div class="error" style="display: none;">Please fill in all fields correctly.</div>

        <div class="success" style="display: none;">Thank you for reaching out! We will get back to you soon.</div>
    </div>
</div>