<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $service_option = htmlspecialchars($_POST['service']);
    $add_service_option = htmlspecialchars($_POST['add_service']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    // Extract service text and price
    list($service, $service_price) = explode(" - ", $service_option);
    list($add_service, $add_service_price) = explode(" - ", $add_service_option);

    // Email details
    $to = "madikanelebohang@gmail.com"; 
    $subject = "New Booking Request from $name";
    
    // Create message
    $message = "Service: $service ($service_price)\n";
    if (!empty($add_service)) {
        $message .= "Additional Service: $add_service ($add_service_price)\n";
    }
    $message .= "Date: $date\nTime: $time\nName: $name\nEmail: $email";
    
    // Set headers
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "<div style='position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px; background-color: #dff0d8; border: 2px solid #d6e9c6; border-radius: 5px; font-size: 20px; color: #3c763d; text-align: center; z-index: 9999;'>Booking request sent successfully.</div>";
    } else {
        echo "<div style='position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px; background-color: #f2dede; border: 2px solid #ebccd1; border-radius: 5px; font-size: 20px; color: #a94442; text-align: center; z-index: 9999;'>Failed to send booking request.</div>";
    }
} else {
    echo "<div style='position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px; background-color: #f2dede; border: 2px solid #ebccd1; border-radius: 5px; font-size: 20px; color: #a94442; text-align: center; z-index: 9999;'>Invalid request method.</div>";
}
?>
