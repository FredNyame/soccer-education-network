(function () {
  //Event on parrent
  let wrap = document.querySelector('.wrap');
  
  if(wrap != null && wrap != undefined) {
    wrap.addEventListener('click', showDesc, true);
  }

  //function to show the description
  function showDesc(e){
    e.preventDefault();
    let allImages = wrap.querySelectorAll('img');
    for(let i = 0; i < allImages.length; i++){
      let desc = allImages[i].parentElement.parentElement.nextElementSibling;
      if(e.target === allImages[i]){
        desc.classList.add('show');
      } else{
        desc.classList.remove('show');
      }
    }
}
})();