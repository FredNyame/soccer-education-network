///////////////////////////////////////////////////
//UI class: handles showing and removing error messages
class UI{
  static showError(fieldInput ,error){
    //If there is an error add a class to the form input
    fieldInput.classList.add('error');

    // Get field id or name
    var id = fieldInput.id || fieldInput.name;
    if (!id) return; //if nothing was return don't continue

    let message = UI.createDiv(fieldInput, id)

    // Add ARIA role to the field
    fieldInput.setAttribute('aria-describedby', 'error-for-' + id);

    //Showing the error messsge
    //Update error message
    message.innerHTML = error;

    // Show error message
    message.style.display = 'block';
    message.style.visibility = 'visible';
  }

  static createDiv(formField, id){
     //Check if there is an error that exist if not create one
     let message = formField.form.querySelector('.error-message#error-for-' + id);


     if(!message){
       //Create a div tag to contain the error and class of error to style it up
       message = document.createElement('div');
       message.className = 'error-message';
       message.id = 'error-for-' + id;

      // If the field is a radio button or checkbox, insert error after the label
      var label;
      if (formField.type === 'radio' || formField.type ==='checkbox') {
          label = formField.form.querySelector('label[for="' + id + '"]') || formField.parentNode;
          if (label) {
              label.parentNode.insertBefore( message, label.nextSibling );
          }
      }

      // Otherwise, insert it after the field
      if (!label) {
        /* formField.parentNode.insertBefore( message, formField.nextElementSibling); */
        formField.parentNode.appendChild( message);
      }
     }

     return message;
  }

  static removeError(fieldInput){
    // Remove error class to field
    fieldInput.classList.remove('error');

    // Remove ARIA role from the field
    fieldInput.removeAttribute('aria-describedby');

    // If the field is a radio button and part of a group, remove error from all and get the last item in the group
    if (fieldInput.type === 'radio' && fieldInput.name) {
      var group = fieldInput.form.querySelectorAll('[name="' + fieldInput.name + '"]');

      if (group.length > 0) {
          for (var i = 0; i < group.length; i++) {
              group[i].classList.remove('error');
          }
          fieldInput = group[group.length - 1];
      }
    }

    // Get field id or name
    let id = fieldInput.id || fieldInput.name;
    if (!id) return;

    // Check if an error message is in the DOM
    let message = fieldInput.form.querySelector('.error-message#error-for-' + id);
    if (!message) return;

    // If so, hide it
    message.innerHTML = '';
    message.style.display = 'none';
    message.style.visibility = 'hidden';
  }

  static clearFields(){
    document.getElementById('firstName').value = '';
    document.getElementById('lastName').value = '';
    document.getElementById('email').value = '';
    document.getElementById('message').value = '';

    if(document.querySelector('#application-form')){
      document.getElementById('age').value = '';
      document.getElementById('school').value = '';
      document.getElementById('location').value = '';
    }

    let selectRadio = document.querySelectorAll('#person');
    //Check which one is seleted and get it value
    selectRadio.forEach((who) => {
      if(who.checked === true){
        who.value = '';
      }
    });
    
  }
}

/////////////////////////////////////////////////////
//Function for Validation
let checkVal = function(field){
  //Ignore some input fields
  if(field.type === 'reset' || field.type === 'file'){
    return;
  }

  //else go on with the validation
  let inputVal = field.validity; //this returns an object

  //If radio button is not selected
  if(field.type === 'radio'){
    let selectRadio = document.getElementsByName('Person');
    for(let i = 0; i < selectRadio.length; i++){
      //check if it is selected
      if(selectRadio[0].checked === true){
        return '';
      } else if(selectRadio[1].checked === true){
        return '';
      }
      else{
        return 'Please select one';
      }
    }
  }

  // If valid, return null
  if (inputVal.valid) return;

  //check if fields are empty
  if(inputVal.valueMissing){
    return 'Please fill out this field.'
  }

  //check if fields are the right type of data in them using pattern regex
  // If not the right type
  if(inputVal.typeMismatch) {
    //Check the field type and respond accordingly
    if(field.type === 'email'){
      //Email
      let regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return regex.test(field.value) ? '' : 'Please enter a valid email address';
    }

    if(field.type === 'url'){
      return 'Please enter a valid URL.';
    }
    
    //else gotcha all
    return 'Please use the correct input type.';
  }

  //check if fields have the right length above min
  // If too short
  if(inputVal.tooShort) {
    return 'Please lengthen this text to ' + field.getAttribute('minLength') + ' characters or more. You are currently using ' + field.value.length + ' characters.';
  };

   // If too long
   if(inputVal.tooLong) {
    return 'Please shorten this text to ' + field.getAttribute('maxLength') + ' characters or more. You are currently using ' + field.value.length + ' characters.';
  };

  // If number input isn't a number
  if(inputVal.badInput) return 'Please enter a number.';

  // If a number value doesn't match the step interval
  if (inputVal.stepMismatch) return 'Please select a valid value.';

  //check if a radio input is selected

  // If all else fails, return a generic catchall error
  return 'The value you entered for this field is invalid.';
}

//////////////////////////////////////////////////////////////////
//Event: Handles when input has been unfocus
const formElm = document.querySelector('#contact-form')  || document.querySelector('#application-form');

//const appFormElm = document.querySelector('#application-form');

if(formElm != null && formElm != undefined) {
  formElm.addEventListener('blur', inputblur, true);
  //appFormElm.addEventListener('blur', inputblur, true);
  
  //Stop Native Broswer validation behavoir
  formElm.setAttribute('novalidate', true);
  //appFormElm.setAttribute('novalidate', true);
}

//Funtion for Blur
function inputblur(e){
 //Check validity
 let error = checkVal(e.target);

 //if there is an error
 if(error){
   //get it to show on page
   UI.showError(e.target, error);
   return;
 }

 //Remove error
 UI.removeError(e.target);
}


////////////////////////////////////////////////////////////////////
//Event: Handles when form submit
if(formElm != null && formElm != undefined) {
  formElm.addEventListener('submit', (e) => {
    //Prevent form from actual submitting
    e.preventDefault();
    let formUrl = e.target.dataset.url;
  
    // Get all of the form elements
    let fields = e.target.elements;
  
    // Validate each field
    // Store the first field with an error to a variable so we can bring it into focus later
     let error, hasErrors;
  
     //looping through the form elements
     for (var i = 0; i < fields.length; i++) {
        error = checkVal(fields[i]);
  
        //if there is error show it
        if (error) {
            UI.showError(fields[i], error);
  
            if ( !hasErrors ) {
              hasErrors = fields[i];
            }
        }
     }
  
    // If there are errors, don't submit form but focus on first element with error
     if (hasErrors) {
         hasErrors.focus();
         return;
     }
  
    // Otherwise, let the form submit normally if there are no errors
    //Get the input values
    let person;
    let firstName = document.getElementById('firstName').value;
    let lastName = document.getElementById('lastName').value;
    let emailValue = document.getElementById('email').value;
    let textArea = document.getElementById('message').value;
    let selectRadio = document.querySelectorAll('.person');
  
    //Check which one is seleted and get it value
    selectRadio.forEach((who) => {
      if(who.checked === true){
        person = who.value;
      }
    });
  
    //Pass those values into the contact class to create a contact object
    if(formElm === document.querySelector('#contact-form')){
      //Rewrite this It should be the form element.find the element in that form
      let action = document.getElementById('hidden').value;
  
      //makeRequest(formUrl, formElm, action, firstName, lastName, emailValue, textArea, person);
  
      //Create xhr objet
      let xhr = new XMLHttpRequest();
  
      //prepare the request
      xhr.open('POST', formUrl , true);
  
      //set the content header
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  
      //handle the response
      xhr.onload = function (){
        if(this.status >= 200 && this.status < 400){
        let userResponse = JSON.parse(this.responseText);
        console.log(userResponse);
  
        let fields;
        if(formElm === document.querySelector('#contact-form')){
          fields = document.querySelector('#contact-form').elements
        }
  
        if(formElm === document.querySelector('#application-form')){
          fields = document.querySelector('#application-form').elements;
        }
  
        //when there is an error
        if(userResponse.error){
          for(let i = 0; i < fields.length; i++){
            if(fields[i].className === 'person'){
              //show error messages
              UI.showError(fields[i], userResponse.errorMessages.personError);
            }
  
            if(fields[i].id === 'firstName'){
              //show error messages
              UI.showError(fields[i], userResponse.errorMessages.firstError);
            }
  
            if(fields[i].id === 'lastName'){
              //show error messages
              UI.showError(fields[i], userResponse.errorMessages.lastError);
            }
  
            if(fields[i].id === 'email'){
              //show error messages
              UI.showError(fields[i], userResponse.errorMessages.emailError);
            }
  
            if(fields[i].id === 'message'){
              //show error messages
              UI.showError(fields[i], userResponse.errorMessages.messageError);
            }
          }
        } else{
          //when there is no error
           //Remove error
           for(let i = 0; i < fields.length; i++){
             UI.removeError(fields[i]);
          }
          //Show the message on the screen
          document.getElementById('success-msg').innerHTML = 'Message sent, thank you for contacting us';
          console.log('no error');
        }
      } else{
        //connection error
      }
      };
  
      let params = new URLSearchParams(new FormData(formElm));
      //send the request
      xhr.send(params);
    }
  
    //Pass those values into the application class to create a application object
    if(formElm === document.querySelector('#application-form')){
      let action = document.getElementById('apphidden').value;
      let age = document.getElementById('age').value;
      let school = document.getElementById('school').value;
      let location = document.getElementById('location').value;
  
      //Make Ajax request
      makeRequest(formUrl, formElm, action, age, school, location);
  
      //console.log(appForm);
    }
  
    // You could also bolt in an Ajax form submit process here
    //Reset the form when submitted
    UI.clearFields();
  });

  formElm.addEventListener('submit', (e) => {
    //Prevent form from actual submitting
    e.preventDefault();
    let formUrl = e.target.dataset.url;
  
    // Get all of the form elements
    let fields = e.target.elements;
  
    // Validate each field
    // Store the first field with an error to a variable so we can bring it into focus later
     let error, hasErrors;
  
     //looping through the form elements
     for (var i = 0; i < fields.length; i++) {
        error = checkVal(fields[i]);
  
        //if there is error show it
        if (error) {
            UI.showError(fields[i], error);
  
            if ( !hasErrors ) {
              hasErrors = fields[i];
            }
        }
     }
  
    // If there are errors, don't submit form but focus on first element with error
     if (hasErrors) {
         hasErrors.focus();
         return;
     }
  
    // Otherwise, let the form submit normally if there are no errors
    //Get the input values
    let person;
    let firstName = document.getElementById('firstName').value;
    let lastName = document.getElementById('lastName').value;
    let emailValue = document.getElementById('email').value;
    let textArea = document.getElementById('message').value;
    let selectRadio = document.querySelectorAll('.person');
  
    //Check which one is seleted and get it value
    selectRadio.forEach((who) => {
      if(who.checked === true){
        person = who.value;
      }
    });
  
    //Pass those values into the contact class to create a contact object
    if(formElm === document.querySelector('#contact-form')){
      //Rewrite this It should be the form element.find the element in that form
      let action = document.getElementById('hidden').value;
  
      //Create xhr objet
      let xhr = new XMLHttpRequest();
  
      //prepare the request
      xhr.open('POST',formUrl , true);
  
      //set the content header
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  
      //handle the response
      xhr.onload = function (){
        if(this.status >= 200 && this.status < 400){
        let userResponse = JSON.parse(this.responseText);
        console.log(userResponse);
  
        let fields;
        if(formElm === document.querySelector('#contact-form')){
          fields = document.querySelector('#contact-form').elements
        }
  
        if(formElm === document.querySelector('#application-form')){
          fields = document.querySelector('#application-form').elements;
        }
  
        //when there is an error
        if(userResponse.error){
          for(let i = 0; i < fields.length; i++){
            if(fields[i].className === 'person'){
              //show error messages
              UI.showError(fields[i], userResponse.errorMessages.personError);
            }
  
            if(fields[i].id === 'firstName'){
              //show error messages
              UI.showError(fields[i], userResponse.errorMessages.firstError);
            }
  
            if(fields[i].id === 'lastName'){
              //show error messages
              UI.showError(fields[i], userResponse.errorMessages.lastError);
            }
  
            if(fields[i].id === 'email'){
              //show error messages
              UI.showError(fields[i], userResponse.errorMessages.emailError);
            }
  
            if(fields[i].id === 'message'){
              //show error messages
              UI.showError(fields[i], userResponse.errorMessages.messageError);
            }
          }
        } else{
          //when there is no error
           //Remove error
           for(let i = 0; i < fields.length; i++){
             UI.removeError(fields[i]);
          }
          //Show the message on the screen
          document.getElementById('success-msg').innerHTML = 'Message Sent, Thank you for contacting us';
          console.log('no error');
        }
      } else{
        //connection error
      }
      };
  
      let params = new URLSearchParams(new FormData(formElm));
      //send the request
      xhr.send(params);
    }
  
    //Pass those values into the application class to create a application object
    if(formElm === document.querySelector('#application-form')){
      let action = document.getElementById('apphidden').value;
      let age = document.getElementById('age').value;
      let school = document.getElementById('school').value;
      let location = document.getElementById('location').value;
  
      //Make Ajax request
      makeRequest(formUrl, formElm, action, age, school, location);
    }
  
    // You could also bolt in an Ajax form submit process here
    //Reset the form when submitted
    UI.clearFields();
  });
}

//Function to handle the Ajax Request / Response
function makeRequest(formUrl, formElm, action, age, school, location) {
    //Create xhr objet
    let xhr = new XMLHttpRequest();

    //prepare the request
    xhr.open('POST', formUrl, true);

    //set the content header
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    //handle the response
    xhr.onload = function (){
      if(this.status >= 200 && this.status < 400){
        let userResponse = JSON.parse(this.responseText);
        let fields;

        if(formElm === document.querySelector('#contact-form')){
          fields = document.querySelector('#contact-form').elements
        }

        if(formElm === document.querySelector('#application-form')){
          fields = document.querySelector('#application-form').elements;
        }
  
        //when there is an error
        if(userResponse.error){
          for(let i = 0; i < fields.length; i++){
            if(fields[i].className === 'person'){
              //show error messages
              UI.showError(fields[i], userResponse.errorMessages.personError);
            }
            if(fields[i].id === 'firstName'){
              //show error messages
              UI.showError(fields[i], userResponse.errorMessages.firstError);
            }
            if(fields[i].id === 'lastName'){
              //show error messages
              UI.showError(fields[i], userResponse.errorMessages.lastError);
            }
            if(fields[i].id === 'email'){
              //show error messages
              UI.showError(fields[i], userResponse.errorMessages.emailError);
            }
            if(fields[i].id === 'message'){
              //show error messages
              UI.showError(fields[i], userResponse.errorMessages.messageError);
            }
          }
        }
        else{
          //when there is no error
            //Remove error
            for(let i = 0; i < fields.length; i++){
              UI.removeError(fields[i]);
          }
          //console.log('no error');
        }
      }
      else{
        //// If fail
        console.log(this.response);
      }
        //console.log(userResponse);
      };
  
      let params =`action=${action}&firstName=${firstName}&lastName=${lastName}&email=${emailValue}&message=${textArea}&age=${age}&school=${school}&location=${location}`;
  
      console.log(params);
  
      //send the request
      xhr.send(params);
}  
