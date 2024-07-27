<?php
if (isset($_POST['sendEmail'])) {
    // Email addresses to send the message to
    $to1 = "maximalp86@gmail.com";
    $to2 = "w.v.semins@gmail.com";
    $subject = "Vierf";
    $message = "Hier bij een foto van de klus";

    // Handle the photo upload
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $photoTmpPath = $_FILES['photo']['tmp_name'];
        $photoName = $_FILES['photo']['name'];
        $photoSize = $_FILES['photo']['size'];
        $photoType = $_FILES['photo']['type'];

        $photoContent = file_get_contents($photoTmpPath);
        $photoEncoded = base64_encode($photoContent);

        $boundary = md5(time());

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"{$boundary}\"\r\n";

        $body = "--{$boundary}\r\n";
        $body .= "Content-Type: text/plain; charset=\"UTF-8\"\r\n";
        $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $body .= "{$message}\r\n";
        $body .= "--{$boundary}\r\n";
        $body .= "Content-Type: {$photoType}; name=\"{$photoName}\"\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n";
        $body .= "Content-Disposition: attachment; filename=\"{$photoName}\"\r\n\r\n";
        $body .= "{$photoEncoded}\r\n";
        $body .= "--{$boundary}--\r\n";

        // Send the email to both addresses
        mail($to1, $subject, $body, $headers);
        mail($to2, $subject, $body, $headers);

        echo "Email sent successfully!";
    } else {
        echo "Failed to upload photo.";
    }
} else {
    echo "No form submission detected.";
}
?>
