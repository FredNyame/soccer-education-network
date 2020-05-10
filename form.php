<?php
//variables to store data and show errors
$first = $last = $email = $message = $person = '';
$firstErr  = $lastErr = $emailErr = $messageErr = $personErr = '';
//Track error messages
$error = false;
$errorMessage = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  //get the value from JS
  $receive = file_get_contents('php://input');
  $formValue = json_decode($receive, true);
  $_POST['firstName'] = $formValue['firstName'];
  //check if the data is empty
  if(empty($_POST['firstName'])){
    $error = true;
    $firstErr = "First name filed is required";
  } else{
    //when there is data
    $first = filter_var(checkData($_POST['firstName']), FILTER_SANITIZE_STRING);
    //check for it length
    if(strlen($first) < 4){
      $error = true;
      $firstErr = "Name field is too short";
    }
  }
  $_POST['lastName'] = $formValue['lastName'];
  //check if the data is empty
  if(empty($_POST['lastName'])){
    $error = true;
    $lastErr = "Last name filed is required";
  } else{
    //when there is data
    $last = filter_var(checkData($_POST['lastName']), FILTER_SANITIZE_STRING);
    //check for it length
    if(strlen($last) < 4){
      $error = true;
      $lastErr = "Last name field is too short";
    }
  }
  $_POST['email'] = $formValue['email'];
  //check if the data is empty
  if(empty($_POST['email'])){
    $error = true;
    $emailErr = "Email filed is required";
  } else{
    //when there is data
    $email = filter_var(checkData($_POST['email']), FILTER_SANITIZE_EMAIL);
    //check for if email is valid
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $error = true;
      $emailErr = "Invalid Email";
    }
  }
  $_POST['message'] = $formValue['message'];
  //check if the data is empty
  if(empty($_POST['message'])){
    $error = true;
    $messageErr = "Messages filed is required";
  } else{
    //when there is data
    $message = filter_var(checkData($_POST['message']), FILTER_SANITIZE_EMAIL);
    //check for if email is valid
    if(strlen($message) < 5){
      $error = true;
      $messageErr = "Message field is too short";
    }
  }
  $_POST['who'] = isset($formValue['who']) ? $formValue['who'] : '';
  //check if the data is empty
  if(empty($_POST['who'])){
    $error = true;
    $personErr = "Please select one";
  } else{
    //when there is data
    $person = filter_var(checkData($_POST['who']), FILTER_SANITIZE_EMAIL);
  }

  //check if there are errors
  if($personErr === '' && $messageErr === '' && $emailErr === '' && $lastErr === '' && $firstErr === ''){
    //Varaibles to send with the mail function
    //Email headers
    $headers ="MIME-Version: 1.0"."\r\n";
    $headers .="Content-Type:text/html;charset=UTF-8"."\r\n";

    //Additional headers
    $headers .="From: ".$first. " ".$last. "<".$email.">"."\r\n";

    $toEmail = $email;
    $subject = "Contact Form Submission from $first $last";
    $emailBody = "<h2>Contact Request</h2>
                  <h4>The name of the sender is $first $last </h4>
                  <h4><strong>Person sending the contact is a $person</strong</h4>
                  <h4>Their email address is $email </h4>
                  <h4><strong>Enquiry message: </strong>$message</h4>
    ";

    //check if there no error message
    if(mail($toEmail, $subject, $emailBody, $headers)){
      //when there are no error
      $error = false;
      //mail is sent
      $errorMessage = [
        'msg' => 'Message sent'
      ];
    } else{
      //when there are no error
      $error = false;
      //fail to send
      $errorMessage = [
        'msg' => 'Message is not sent'
      ];
    }
  }

  $errorMessage = [
    'firstError' => $firstErr,
    'lastError' => $lastErr,
    'emailError' => $emailErr,
    'messageError' => $messageErr,
    'personError' => $personErr
  ];

  //Output to JS
  $sendResponse = [
    'error' => $error,
    'errorMessages' => $errorMessage
  ];
  echo json_encode($sendResponse);
}

  //check value
  function checkData($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    $data = htmlentities($data);
    return $data;
  }
