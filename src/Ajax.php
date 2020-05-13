<?php
//This class handles the AJAX call

namespace GSEN;

class Ajax 
{
  /**
  * Class Constructor 
  * @param void
  * @return void
  */
  public function __construct()
  {
    $this->register_actions();
  }

  /**
  * Register actions 
  * @param viod
  * @return void
  */
  public function register_actions()
  {
    add_action('wp_ajax_nopriv_gsen_save_form',[$this, 'gsen_save_form']);
    add_action('wp_ajax_gsen_save_form', [$this, 'gsen_save_form']);
    add_action('wp_ajax_nopriv_gsen_save_form_app', [$this, 'gsen_save_form_app']);
    add_action('wp_ajax_gsen_save_form_app', [$this, 'gsen_save_form_app']);
  }

  /* 
  * Get Contact Form Data 
  */
  public function gsen_save_form()
  {
    //Honeypot check
    $this->check_spam_field($_POST['gsen_hp']);

    $form_data = $this->sanitize_form_data($_POST, ['firstName', 'lastName', 'email', 'message', 'gsf', 'person']);

    //Check nonce
    if(!wp_verify_nonce($_POST['gsf'], 'gsen_save_form')) {
      exit();
    }

    $response = [];

    $formValidation = $this->validateContact($form_data);

    //Check Validation
    if(!$formValidation['success']) {
      $formValidation['errorMessage'] = 'Form input errors please check fields below';
      $response = $formValidation;

      echo json_encode($response);
      exit();
    }

    //Send the Email
    $mailSent = $this->sendEmail($form_data['firstName'], $form_data['lastName'], $form_data['email'], $form_data['message'], $form_data['person']);

    if(!$mailSent['success']) {
      $response = $mailSent;

      echo json_encode($response);
      exit();
    }

    $mailSent['successMessage'] = 'Thank you for contacting us, someone will respond to your message and get back to you!';
    $response = $mailSent;
    echo json_encode($response);
    die();

  }

  /**
   * Handles the Application form
   * @param void
   * @return json $sendResponse
  */
  public function gsen_save_form_app()
  {
    $error = false;
    $errorMessage = [];
    $firstErr  = $lastErr = $emailErr = $messageErr = $personErr = '';

    //collect all form data fro JS file
    $firstName = wp_strip_all_tags($_POST['firstName']);
    //check if the data is empty
    if(empty($_POST['firstName'])){
      $error = true;
      $firstErr = "First name filed is required";
    } else{
      //when there is data
      $firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
      //check for it length
      if(strlen($firstName) < 4){
        $error = true;
        $firstErr = "Name field is too short";
      }
    }

    $lastName = wp_strip_all_tags($_POST['lastName']);
    //check if the data is empty
    if(empty($_POST['lastName'])){
      $error = true;
      $lastErr = "Last name filed is required";
    } else{
      //when there is data
      $last = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
      //check for it length
      if(strlen($lastName) < 4){
        $error = true;
        $lastErr = "Last name field is too short";
      }
    }

    $email = wp_strip_all_tags($_POST['email']);
    //check if the data is empty
    if(empty($_POST['email'])){
      $error = true;
      $emailErr = "Email filed is required";
    } else{
      //when there is data
      $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
      //check for if email is valid
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = true;
        $emailErr = "Invalid Email";
      }
    }

    $message = wp_strip_all_tags($_POST['message']);
    //check if the data is empty
    if(empty($_POST['message'])){
      $error = true;
      $messageErr = "Messages filed is required";
    } else{
      //when there is data
      $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
      //check for if email is valid
      if(strlen($message) < 5){
        $error = true;
        $messageErr = "Message field is too short";
      }
    }

    $age = wp_strip_all_tags($_POST['age']);
    $school = wp_strip_all_tags($_POST['school']);
    $location = wp_strip_all_tags($_POST['location']);

    $errorMessage = [
      'firstError' => $firstErr,
      'lastError' => $lastErr,
      'emailError' => $emailErr,
      'messageError' => $messageErr
    ];

    //Output to JS
    $sendResponse = [
      'error' => $error,
      'errorMessages' => $errorMessage
    ];
    echo json_encode($sendResponse);

    //echo $firstName . ',' . $lastName . ',' . $email . ',' . $message . ',' . $age . ',' . $school . ',' . $location;
    //wp_insert_post();

    die();
  }

  /**
   * Check if a bot filled the honey pot field
   * @param $spam_field
   */
  private function check_spam_field($spam_field) {
    if(!empty($spam_field)) {
      echo json_encode(['succes' => true]);
      exit();
    }
  }

  /**
   * Sanitize the input data
   */
  private function sanitize_form_data($postData, $postFields) {
    $sanitize_data = [];
    
    foreach($postFields as $field) {
      switch(strtolower($field)) {
        case "gsf":
          $sanitize_data[$field] = $postData[$field];
        case "email":
          $sanitize_data[$field] = $this->sanitize_email($postData[$field]);
          break;
        default:
          $sanitize_data[$field] = $this->sanitize_string($postData[$field]);
      }
    }
    return $sanitize_data;
  }

  /**
   * Santinze the string input
   */
  private function sanitize_string($field) {
    $data = $this->checkInput($field);
    $data = filter_var($data, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    return $data;
  }

  /**
   * Santinze the email input
   */
  private function sanitize_email($field) {
    $data = $this->checkInput($field);
    $data = filter_var($data, FILTER_SANITIZE_EMAIL);
    return $data;
  }

  //filter the data
  private function checkInput($data){
    $data = trim($data); //trim extra spaces from the value
    $data = stripslashes($data); //Get rid of backslashe
    $data = htmlspecialchars($data); //strip tags from code to html entities
    $data = htmlentities($data);
    return $data;
  }

  /** 
  * Validate the Contact Info 
  * @param string $value
  * @return string
  */
  private function validateContact($formFields)
  {
    $response = [];
    $input_errors =[];

    //Check the empty field
    foreach($formFields as $key => $value) {
      if(empty($value)) {
        $input_errors[] = [
          'field' => $key,
          'message' => 'Field is required'
        ];
      }
    }

    if(!empty($formFields['firstName']) && strlen($formFields['firstName']) < 4){
      $input_errors[] = [
        'field' => 'firstName',
        'message' => 'First name field is too short'
      ];
    }

    if(!empty($formFields['lastName']) && strlen($formFields['lastName']) < 4){
      $input_errors[] = [
        'field' => 'lastName',
        'message' => 'Last name field is too short'
      ];
    }

    if(!empty($formFields['email']) && !filter_var($formFields['email'], FILTER_VALIDATE_EMAIL)){
      $input_errors[] = [
        'field' => 'email',
        'message' => 'Email is invalid'
      ];
    }

    if(!empty($formFields['message']) && strlen($formFields['message']) < 4){
      $input_errors[] = [
        'field' => 'message',
        'message' => 'Message field is too short'
      ];
    }

    //Check if the input_errors is empty
    if(empty($input_errors)) {
      $response['success'] = true;
    } else {
      $response['success'] = false;
      $response['errorInputs'] = $input_errors;
    }

    return $response;
  }

  /*
  * Send Email 
  */
  private function sendEmail($firstName, $lastName, $email, $message, $person) 
  {
    $response = [];

    //Email headers
    $headers ="MIME-Version: 1.0 \r\n";
    $headers .="Content-Type:text/html; charset=UTF-8 \r\n";
    $headers .="From: <do46867@gmail.com> \r\n";
    $toEmail = "support@ghsen.org";
    $subject = "Contact Form Submission from $firstName $lastName";
    $emailBody = "<h2>Contact Request</h2>
                  <h4>The name of the sender is $firstName $lastName </h4>
                  <h4><strong>Person sending the contact is a $person</strong</h4>
                  <h4>Their email address is $email </h4>
                  <h4><strong>Enquiry message: </strong>$message</h4>
    ";

    //check if there no error message
    if(mail($toEmail, $subject, $emailBody, $headers)){
      $response['success'] = true;
    } else{
      $response['success'] = false;
      $response['errorMessage'] = "Error sending message. Please try again later";
    }
    
    return $response;
  }
}