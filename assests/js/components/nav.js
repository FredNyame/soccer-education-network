/*
>> Mobile nav Js to show and hide on click of the menu
*/

(function () {
  document.addEventListener("DOMContentLoaded", function() {
    //Get the element
    const menuBtn = document.querySelector('.mobile-container');
    const dateElm = document.querySelector('#date');
    let mainNav = document.querySelector('.main_nav');
  
    //Use Js to change the year for the footer Copyright
    dateElm.innerHTML = new Date().getFullYear();
  
    //li items
    const menuItems = document.querySelectorAll('.menu-item');
    
    //Add event to click
    menuBtn.addEventListener('click', showMenu);
  
    //function to do the showing of the elements
    function showMenu(){
      menuBtn.classList.toggle('change');
      mainNav.classList.toggle('right-show');
      mainNav.classList.toggle('mobile_nav');
      menuItems.forEach(item => item.classList.toggle('right-show'));
    }
  });

})();
