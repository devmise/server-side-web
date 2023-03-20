<?php

$errors = '';
$myemail = 'D00240060@student.dkit.ie';

// Important: Create email headers to avoid spam folder
$headers .= 'From: '.$myemail."\r\n".
    'Reply-To: '.$myemail."\r\n" .
    'X-Mailer: PHP/' . phpversion();


$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$query = $_POST['query'];
$message = $_POST['message'];



if( empty($errors)){
        $to = $myemail;
        $email_subject = "Contact form submission: $name";
        $email_body = "You have received a new message. ".
        " Here are the details:\n Name: $name 
        \n Email: $email_address 
        \n Phone: $phone 
        \n Query type: $query
        \n Message \n $message";

        mail($to,$email_subject,$email_body,$headers);

        //redirect to the 'thank you' page
        header('Location: contact-form-thank-you.html');
}

?>
<!DOCTYPE HTML>
<html>
<head>
        <title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>
</body>
</html>