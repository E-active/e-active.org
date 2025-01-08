<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user inputs
    $department = htmlspecialchars($_POST['department']);
    $doctor = htmlspecialchars($_POST['doctor']);
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);
    $message = htmlspecialchars($_POST['message']);

    // Email details
    $to = "asimshahzad6763132@gmail.com"; // Replace with your email
    $subject = "New Appointment Request";
    $body = "
    <strong>Department:</strong> $department <br>
    <strong>Doctor:</strong> $doctor <br>
    <strong>Patient Name:</strong> $name <br>
    <strong>Phone:</strong> $phone <br>
    <strong>Email:</strong> $email <br>
    <strong>Date:</strong> $date <br>
    <strong>Time:</strong> $time <br>
    <strong>Message:</strong> $message
    ";

    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Attempt to send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "<p>Email sent successfully! We'll contact you soon.</p>";
    } else {
        echo "<p>Failed to send email. Please try again later.</p>";
    }
} else {
    echo "<p>Invalid request. Please fill out the form.</p>";
}
?>
