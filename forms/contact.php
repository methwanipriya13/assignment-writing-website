<?php
  // Replace 'your-email@example.com' with your real receiving email address
  $receiving_email_address = 'methwanipriya13@gmailcom';

  // Validate if the form is submitted and fields are filled
  if( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message']) ) {

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Set email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Email subject and body
    $email_subject = $subject;
    $email_body = "You have received a new message from the contact form on your website.\n\n".
                  "Here are the details:\n\n".
                  "Name: $name\n".
                  "Email: $email\n".
                  "Subject: $subject\n".
                  "Message:\n$message\n";

    // Send email
    if( mail($receiving_email_address, $email_subject, $email_body, $headers) ) {
      echo 'Your message has been sent. Thank you!';
    } else {
      echo 'There was a problem sending your message. Please try again.';
    }

  } else {
    echo 'Please fill in all fields.';
  }
?>
