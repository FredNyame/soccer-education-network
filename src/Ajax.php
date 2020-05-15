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
    $emailBody = "
    <html>
    <body>
    <h2>The name of the sender is ". $form_data['firstName'] . " ". $form_data['lastName']." </h2>
    <h2><strong>Person sending the contact is a " .$form_data['person']. "</strong</h2>
    <h2>Their email address is ".$form_data['email'] ."</h2>
    <h2><strong>Enquiry message: </strong>".$form_data['message']."</h2>
    </body>
    </html>
    ";

    $mailSent = $this->sendEmail($form_data['firstName'], $form_data['lastName'], $form_data['email'], $emailBody, 'contact');

    if(!$mailSent['success']) {
      $response = $mailSent;

      echo json_encode($response);
      exit();
    }

    $mailSent['successMessage'] = 'Thank you for contacting us, someone will respond to your message and get back to you!';
    $response = $mailSent;
    echo json_encode($response);
    exit();

  }

  /**
   * Handles the Application form
   * @param void
   * @return json $sendResponse
  */
  public function gsen_save_form_app()
  {
    $response = [];

    //Honeypot check
    $this->check_spam_field($_POST['gsen_hp']);

    //Check nonce
    if(!wp_verify_nonce($_POST['gsf'], 'gsen_save_form')) {
      exit();
    }

    if(empty($_POST['firstName'])){
      $response['input_errors'][] = [
        'field' => 'firstName',
        'message' => 'First name filed is required'
      ];
    } else{
      //when there is data
      $firstName = $this->checkInput($_POST['firstName']);
      $firstName = filter_var($firstName, FILTER_SANITIZE_STRING);

      //check for it length
      if(strlen($firstName) < 4){
        $response['input_errors'][] = [
          'field' => 'firstName',
          'message' => 'First name field is too short'
        ];
      }
    }

    if(empty($_POST['lastName'])){
      $response['input_errors'][] = [
        'field' => 'lastName',
        'message' => 'Last name filed is required'
      ];
    } else{
      //when there is data
      $lastName = $this->checkInput($_POST['lastName']);
      $lastName = filter_var($lastName, FILTER_SANITIZE_STRING);

      //check for it length
      if(strlen($lastName) < 4){
        $response['input_errors'][] = [
          'field' => 'lastName',
          'message' => 'Last name field is too short'
        ];
      }
    }

    if(empty($_POST['email'])){
      $response['input_errors'][] = [
        'field' => 'email',
        'message' => 'Email filed is required'
      ];
    } else{
      //when there is data
      $email = $this->checkInput($_POST['email']);
      $email = filter_var($email, FILTER_SANITIZE_EMAIL);

      //check for if email is valid
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $response['input_errors'][] = [
          'field' => 'email',
          'message' => 'Email is not valid'
        ];
      }
    }

    if(empty($_POST['age'])){
      $response['input_errors'][] = [
        'field' => 'age',
        'message' => 'Age filed is required'
      ];
    } else{
      //when there is data
      $age = $this->checkInput($_POST['age']);
      $age = (int) filter_var($age, FILTER_SANITIZE_NUMBER_INT);
    }

    if(empty($_POST['school'])){
      $response['input_errors'][] = [
        'field' => 'school',
        'message' => 'School filed is required'
      ];
    } else{
      //when there is data
      $school = $this->checkInput($_POST['school']);
      $school = filter_var($school, FILTER_SANITIZE_STRING);

      //check for if email is valid
      if(strlen($school) < 4){
        $response['input_errors'][] = [
          'field' => 'school',
          'message' => 'School field is too short'
        ];
      }
    }

    if(empty($_POST['location'])){
      $response['input_errors'][] = [
        'field' => 'location',
        'message' => 'Location filed is required'
      ];
    } else{
      //when there is data
      $location = $this->checkInput($_POST['location']);
      $location = filter_var($location, FILTER_SANITIZE_STRING);

      //check for if email is valid
      if(strlen($location) < 4){
        $response['input_errors'][] = [
          'field' => 'location',
          'message' => 'Location field is too short'
        ];
      }
    }

    if(empty($_POST['message'])){
      $response['input_errors'][] = [
        'field' => 'message',
        'message' => 'Messages filed is required'
      ];
    } else{
      //when there is data
      $message = $this->checkInput($_POST['message']);
      $message = filter_var($message, FILTER_SANITIZE_STRING);

      //check for if email is valid
      if(strlen($message) < 5){
        $response['input_errors'][] = [
          'field' => 'message',
          'message' => 'Message field is too short'
        ];
      }
    }

    //Check if there no errors
    if(!empty($response['input_errors'])) {
      $response['success'] = false;
      $response['message'] = 'Form input errors please check fields below';
      echo json_encode($response);
      exit();
    }

    //Send the Email
    $emailBody = "
    <html>
    <body>
    <h2>Fill Name: ". $firstName. " ". $lastName." </h2>
    <h2><strong>Email: </strong> ".$email ."</h2>
    <h2><strong>Age: </strong> ".$age ."</h2>
    <h2><strong>School: </strong> ".$school ."</h2>
    <h2><strong>Location:</strong> ".$location ."</h2>
    <h2><strong>Application message: </strong>".$message."</h2>
    </body>
    </html>
    ";

    $mailSent = $this->sendEmail($firstName, $lastName, $email, $emailBody, 'application');

    if(!$mailSent['success']) {
      $response['success'] = false;
      $response['message'] = $mailSent['errorMessage'];
      echo json_encode($response);
      exit();
    }

    $response['message'] = 'Thank you for contacting us, someone will respond to your message and get back to you!';
    echo json_encode($response);
    exit();
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
  private function sendEmail($firstName, $lastName, $email, $emailBody, $formName) 
  {
    $response = [];

    //Email headers
    $headers ="MIME-Version: 1.0 \r\n";
    $headers .="Content-Type:text/html; charset=UTF-8 \r\n";
    $headers .="From: support@ghsen.org <support@ghsen.org> \r\n";
    $headers .="Reply-TO: ".$email." \r\n";
    $toEmail = "support@ghsen.org, douglas16@yahoo.co.uk";

    if($formName === 'contact') {
      $subject = "Contact Form Submission from $firstName $lastName";
    }

    if($formName === 'application') {
      $subject = "Application Form Submission from $firstName $lastName";
    }

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