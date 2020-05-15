(function() {
  document.addEventListener("DOMContentLoaded", function() {
    //get all items
    const wrapper = document.querySelector(".slide-wrap");
    const allCards = document.querySelectorAll(".words");
    let size;
    
    let prevBtn = document.querySelector("a.prev");
    let nextBtn = document.querySelector("a.next")
    
    if(allCards != undefined && allCards.length > 0) {
      size =  allCards[0].clientWidth;
    }
    
    if(prevBtn != undefined && prevBtn != null) {
      prevBtn.addEventListener('click', function(){
        //wrapper.style.transition = 'transition 0.5s ease-in-out';
        slideIndexFun(-1);
      });
    }
    
    if(nextBtn != undefined && nextBtn != null) {
      nextBtn.addEventListener('click', function(){
        //wrapper.style.transition = 'transition 0.5s ease-in-out';
        slideIndexFun(1);
      });
    }
    
    //Keep track of the current Index
    let sliderIndex = 1;
    sliderFun(sliderIndex);
    
    function slideIndexFun(n){
      sliderFun(sliderIndex += n);
    }

    //Display and control function
    function sliderFun(numIndex){ 
      if (numIndex > allCards.length) {sliderIndex = 1}    
      if (numIndex < 1) {sliderIndex = allCards.length}
    
      if(allCards != undefined && allCards.length > 0) {
        for (let i = 0; i < allCards.length; i++) {
          allCards[i].style.display = "none";  
        }
        
        allCards[sliderIndex-1].style.display = "block"; 
      } 
    }
  });
  
})();
