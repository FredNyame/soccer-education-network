(function() {
  //Get ref to the contact form
  let contactFrom = document.querySelector("#contact-form");
  contactFrom.addEventListener('submit', handleContact);

  //Handles the Contact form submission
  function handleContact(e) {
    e.preventDefault();
    let formData = new FormData(contactFrom);

    //if spam field is filled return
    if(formData['gsen_hp'])
      return;

    //Make Ajax Request
    fetch(form_info.form_url, {
      method: 'POST',
      body: formData
    })
    .then(response => {
      return response.json();
    })
    .then(data => {
      //check if there are errors
      if(!data['success']) {
        contactFrom.querySelector('#formError').innerHTML = data.errorMessage;

        if(data.errorInputs.length > 0 && typeof(data.errorInputs) !==
         undefined && Array.isArray(data.errorInputs)) {
          removeErrorMessages();

          let firstElement = data.errorInputs[0]['field'];
          contactFrom.querySelector(`#${firstElement}`).focus();

          data.errorInputs.forEach(element => {
            let elementDIV = contactFrom.querySelector(`#${element['field']}`);

            if(element['field'] !== 'person') {
              elementDIV.classList.add('error') 
            }

            showErrorMessages(elementDIV, element['field'], element['message']);
          
          });
        }
      } else {
        contactFrom.querySelector('#formError').innerHTML = '';
        contactFrom.querySelector('#success-msg').innerHTML = data.successMessage;
        removeErrorMessages();
        contactFrom.reset();
      }
    })
    .catch((error) => {
      contactFrom.querySelector('#formError').innerHTML = 'Sorry an error occuried. Please try again later';
    })
  }

  //Check error message 
  function showErrorMessages(element, field, message){
    //Check if there is an error that exist if not create one
    let errorMessage = element.parentElement.querySelector('.error-message');

    if(!errorMessage) {
      //Create error element
      errorMessage = document.createElement('p');
      errorMessage.className = 'error-message';
      errorMessage.id = 'error-'+field;

      element.parentElement.append(errorMessage);
    }

    // Show error message
    if(message) {
      errorMessage.innerHTML = message;
      errorMessage.style.display = 'block';
      errorMessage.style.visibility = 'visible';
    }
  }

  //Remove error message
  function removeErrorMessages() {
    //Get all error message and hide them
    let errorMessages = contactFrom.querySelectorAll('.error-message');
    let inputFields = contactFrom.querySelectorAll('.inutField');

    if(inputFields) {
      inputFields.forEach(field => {
        field.classList.remove('error')
      })
    }

    if(errorMessages) {
        errorMessages.forEach(element => {
          element.innerHTML = '';
          element.style.display = 'none';
        })
    }
  }
})();