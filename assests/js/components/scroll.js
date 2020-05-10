/*
>> Show Nav when scroll up
what goes into scroll event
*/

//get the value of the scroll position
let prevScrollValue = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;

//AddEventListerner
window.addEventListener('scroll', mainScrollFun);

//Main function handling the calling of other functions when the scroll event is happening 
function mainScrollFun(){
  //Current scroll value
  let scrollBarValue = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;
  //Call the Navbar function
  navBarscrollFun(scrollBarValue);
  //Show Top Arrow
  showTopArrow(scrollBarValue);
}

////////////////////////////////////////////////////////////
//function to Hide/Show the Navbar when scrolled down and up respestively
function navBarscrollFun(scrollValue){
  //Get the NavBar
  const navBar = document.querySelector('#header');
  //Make navbar show when scrolling to the top of the page
  //Hide Navbar when Prev is greater that Current 
  if(prevScrollValue > scrollValue){
    navBar.classList.add('reveal');
  } else{
    navBar.classList.remove('reveal');
  }
  //Resets the value of the Prev
  prevScrollValue = scrollValue;
  if(prevScrollValue === 0){
    navBar.classList.remove('reveal');
  }
}

///////////////////////////////////////////////////////////////
//Function to Show the Top Arrow
function showTopArrow(currentScrollvalue){
  //Get the value of starting point to show the top arrow
  let showcaseHeight = document.querySelector('.showcase').clientHeight;
  //check if the current scroll value is passed that of the window scrollY value
  if(currentScrollvalue > showcaseHeight){
    document.querySelector('.top-arrow').classList.add('show-top-arrow');
  }else{
    document.querySelector('.top-arrow').classList.remove('show-top-arrow');
  }
}

//Click Event for Top Arrow
let topArrow = document.querySelector('.top-arrow');
topArrow.addEventListener('click', function(){
  smoothScrollFun('#header', 1000);
});

//Function to scroll to top of the Page
function smoothScrollFun(setTarget, setDuration){
  let target = document.querySelector(setTarget); //where to animate to
  
  let duration = setDuration; //how long it will take to animate
  let targetPos = target.getBoundingClientRect().top; // relative size of the top of the traget
  
  let startPos = window.pageYOffset; //Current Position of the scrollBar
  let distace = targetPos - startPos; //Distance between the top and scrollBar
  let startTime = null; //start time for timer

  //Actully animating function
  function animateScroll(currentTime){
    if(startTime === null) startTime = currentTime;
    let timeEplased = currentTime - startTime;
    let run = easeInOut(timeEplased, startPos, distace, duration);
    window.scrollTo(0, run);
    if(timeEplased < duration) requestAnimationFrame(animateScroll)
  }

  //Timing Function for transition
  function easeInOut(t, b, c, d) {
    t /= d/2;
    if (t < 1) return c/2*t*t + b;
    t--;
    return -c/2 * (t*(t-2) - 1) + b;
  };

  //requestAnimationframe has a callback of the timestamp
  requestAnimationFrame(animateScroll);
}
