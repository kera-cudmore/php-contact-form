<?php 

// defining form & error variables and setting to empty
$nameErr = $emailErr = $enquiryErr = $messageErr = "";
$name = $email = $enquiry = $message = "";

// form validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    }else {
        $name = ($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format"; 
    }else {
        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["enquiry"])) {
        $enquiryErr = "Enquiry type is required";
    }else {
        $enquiry = ($_POST["enquiry"]);
    }

    if (empty($_POST["message"])) {
        $messageErr = "A message is required";
    }else {
        $message = ($_POST["message"]);
    }

    // mail variables
    $mailTo = "company@name.com";
    $messageBody = "From: " . $name . "\r\n" . "Email: " . $email . "\r\n" . "Message: " . $message . "\r\n";
    $headers = "From: ".$email."\r\n";

    // mail function
    mail($mailTo, $enquiry, $messageBody, $headers);

    }
?>


<!DOCTYPE html>
<html lang="en-gb">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contact Us</title>
</head>

<body>
<h1>Contact Us</h1>

<p>Please use the form below to contact us.</p>

<form class="form-container" action="" method="POST">

<label for="name">Name</label>
<input type="text" id="name" name="name">
<span class = "error">* <?php echo $nameErr;?></span>

<label for="email">Email</label>
<input type="email" id="email" name="email">
<span class = "error">* <?php echo $emailErr;?></span>

<label for="enquiry">Reason for enquiry</label>
<input type="text" id="enquiry" name="enquiry">
<span class = "error">* <?php echo $enquiryErr;?></span>

<label for="message">Message</label>
<textarea id="message" name="message"></textarea>
<span class = "error">* <?php echo $messageErr;?></span>

<p><span class="error">*</span> Required fields</p>

<button type="submit" name="submit">Submit Enquiry</button>

</form>

</body>
</html>