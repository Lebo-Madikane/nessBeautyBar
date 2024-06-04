<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $service = htmlspecialchars($_POST['service']);
    $add_service = htmlspecialchars($_POST['add_service']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    // Email details
    $to = "madikanelebohang@gmail.com"; 
    $subject = "New Booking Request from $name";
    $message = "Service: $service\nAdditional Service: $add_service\nDate: $date\nTime: $time\nName: $name\nEmail: $email";
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Booking request sent successfully.";
    } else {
        echo "Failed to send booking request.";
    }
} else {
    echo "Invalid request method.";
}
?>
