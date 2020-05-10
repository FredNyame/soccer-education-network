/*
>> Mobile nav Js to show and hide on click of the menu
*/

(function () {
  //Get the element
  const menuBtn = document.querySelector('.mobile-container');
  const dateElm = document.querySelector('#date');

  //Use Js to change the year for the footer Copyright
  dateElm.innerHTML = new Date().getFullYear();
  //li items
  const menuItems = document.querySelectorAll('.menu-item');
  //Add event to click
  menuBtn.addEventListener('click', showMenu);
  //function to do the showing of the elements
  function showMenu(){
    menuBtn.classList.toggle('change');
    document.querySelector('.main_nav').classList.toggle('right-show');
    menuItems.forEach(item => item.classList.toggle('right-show'));
  }
})();
