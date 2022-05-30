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
    }else {
        $email = ($_POST["email"]);
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
<h1 class="centered">Contact Us</h1>

<p class="centered">Please use the form below to contact us.</p>

<div class="form-container">
<form action="" method="POST">

<p class="success centered"><?php if (isset($name) && ($email) && ($enquiry) && ($message)) {
  echo "Thank you for your enquiry, we will be in touch shortly.";
} ?></p>

<label for="name">Name<span class = "error"> * <?php echo $nameErr;?></span>
</label>
<input type="text" id="name" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>">

<label for="email">Email<span class = "error"> * <?php echo $emailErr;?></span>
</label>
<input type="email" id="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">

<label for="enquiry">Reason for enquiry<span class = "error"> * <?php echo $enquiryErr;?></span>
</label>
<input type="text" id="enquiry" name="enquiry" value="<?php if (isset($_POST['enquiry'])) echo $_POST['enquiry']; ?>">

<label for="message">Message<span class = "error"> * <?php echo $messageErr;?></span>
</label>
<textarea id="message" name="message"></textarea>

<p><span class="error">*</span> Required fields</p>

<button type="submit" name="submit">Submit Enquiry</button>

</form>
</div>

</body>
</html>