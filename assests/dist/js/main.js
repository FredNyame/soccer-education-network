/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assests/js/components/accordion.js":
/*!********************************************!*\
  !*** ./assests/js/components/accordion.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function () {
  //Get the items to click on
  var buttonClick = document.querySelectorAll('.faq-show');

  if (buttonClick != null && buttonClick != undefined) {
    //loop through to add event listener
    buttonClick.forEach(function (btn) {
      return btn.addEventListener('click', showPanel);
    });
  } //Function to show panel


  function showPanel() {
    //get the next sibling element
    this.classList.toggle('active');
    var nextSibElm = this.nextElementSibling;
    var heightNextSib = nextSibElm.scrollHeight; //check if the element has height

    if (nextSibElm.style.maxHeight) {
      nextSibElm.style.maxHeight = null;
    } else {
      nextSibElm.style.maxHeight = heightNextSib + 'px';
    } //console.log(this);

  }
})();

/***/ }),

/***/ "./assests/js/components/carousel.js":
/*!*******************************************!*\
  !*** ./assests/js/components/carousel.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

//get all items
var wrapper = document.querySelector(".slide-wrap");
var allCards = document.querySelectorAll(".words");
var size;
var prevBtn = document.querySelector("a.prev");
var nextBtn = document.querySelector("a.next");

if (allCards != undefined && allCards.length > 0) {
  size = allCards[0].clientWidth;
}

if (prevBtn != undefined && prevBtn != null) {
  prevBtn.addEventListener('click', function () {
    //wrapper.style.transition = 'transition 0.5s ease-in-out';
    slideIndexFun(-1);
  });
}

if (nextBtn != undefined && nextBtn != null) {
  nextBtn.addEventListener('click', function () {
    //wrapper.style.transition = 'transition 0.5s ease-in-out';
    slideIndexFun(1);
  });
} //Keep track of the current Index


var sliderIndex = 1;
sliderFun(sliderIndex);

function slideIndexFun(n) {
  sliderFun(sliderIndex += n);
} //Display and control function


function sliderFun(numIndex) {
  if (numIndex > allCards.length) {
    sliderIndex = 1;
  }

  if (numIndex < 1) {
    sliderIndex = allCards.length;
  }

  if (allCards != undefined && allCards.length > 0) {
    for (var i = 0; i < allCards.length; i++) {
      allCards[i].style.display = "none";
    }

    allCards[sliderIndex - 1].style.display = "block";
  }
}

/***/ }),

/***/ "./assests/js/components/contact.js":
/*!******************************************!*\
  !*** ./assests/js/components/contact.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

(function () {
  //Get ref to the contact form
  var contactFrom = document.querySelector("#contact-form");
  contactFrom.addEventListener('submit', handleContact); //Handles the Contact form submission

  function handleContact(e) {
    e.preventDefault();
    var formData = new FormData(contactFrom); //if spam field is filled return

    if (formData['gsen_hp']) return; //Make Ajax Request

    fetch(form_info.form_url, {
      method: 'POST',
      body: formData
    }).then(function (response) {
      return response.json();
    }).then(function (data) {
      //check if there are errors
      if (!data['success']) {
        contactFrom.querySelector('#formError').innerHTML = data.errorMessage;

        if (data.errorInputs.length > 0 && _typeof(data.errorInputs) !== undefined && Array.isArray(data.errorInputs)) {
          removeErrorMessages();
          var firstElement = data.errorInputs[0]['field'];
          contactFrom.querySelector("#".concat(firstElement)).focus();
          data.errorInputs.forEach(function (element) {
            var elementDIV = contactFrom.querySelector("#".concat(element['field']));

            if (element['field'] !== 'person') {
              elementDIV.classList.add('error');
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
    })["catch"](function (error) {
      contactFrom.querySelector('#formError').innerHTML = 'Sorry an error occuried. Please try again later';
    });
  } //Check error message 


  function showErrorMessages(element, field, message) {
    //Check if there is an error that exist if not create one
    var errorMessage = element.parentElement.querySelector('.error-message');

    if (!errorMessage) {
      //Create error element
      errorMessage = document.createElement('p');
      errorMessage.className = 'error-message';
      errorMessage.id = 'error-' + field;
      element.parentElement.append(errorMessage);
    } // Show error message


    if (message) {
      errorMessage.innerHTML = message;
      errorMessage.style.display = 'block';
      errorMessage.style.visibility = 'visible';
    }
  } //Remove error message


  function removeErrorMessages() {
    //Get all error message and hide them
    var errorMessages = contactFrom.querySelectorAll('.error-message');
    var inputFields = contactFrom.querySelectorAll('.inutField');

    if (inputFields) {
      inputFields.forEach(function (field) {
        field.classList.remove('error');
      });
    }

    if (errorMessages) {
      errorMessages.forEach(function (element) {
        element.innerHTML = '';
        element.style.display = 'none';
      });
    }
  }
})();

/***/ }),

/***/ "./assests/js/components/nav.js":
/*!**************************************!*\
  !*** ./assests/js/components/nav.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
>> Mobile nav Js to show and hide on click of the menu
*/
(function () {
  //Get the element
  var menuBtn = document.querySelector('.mobile-container');
  var dateElm = document.querySelector('#date'); //Use Js to change the year for the footer Copyright

  dateElm.innerHTML = new Date().getFullYear(); //li items

  var menuItems = document.querySelectorAll('.menu-item'); //Add event to click

  menuBtn.addEventListener('click', showMenu); //function to do the showing of the elements

  function showMenu() {
    menuBtn.classList.toggle('change');
    document.querySelector('.main_nav').classList.toggle('right-show');
    menuItems.forEach(function (item) {
      return item.classList.toggle('right-show');
    });
  }
})();

/***/ }),

/***/ "./assests/js/components/scroll.js":
/*!*****************************************!*\
  !*** ./assests/js/components/scroll.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
>> Show Nav when scroll up
what goes into scroll event
*/
//get the value of the scroll position
var prevScrollValue = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop; //AddEventListerner

window.addEventListener('scroll', mainScrollFun); //Main function handling the calling of other functions when the scroll event is happening 

function mainScrollFun() {
  //Current scroll value
  var scrollBarValue = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop; //Call the Navbar function

  navBarscrollFun(scrollBarValue); //Show Top Arrow

  showTopArrow(scrollBarValue);
} ////////////////////////////////////////////////////////////
//function to Hide/Show the Navbar when scrolled down and up respestively


function navBarscrollFun(scrollValue) {
  //Get the NavBar
  var navBar = document.querySelector('#header'); //Make navbar show when scrolling to the top of the page
  //Hide Navbar when Prev is greater that Current 

  if (prevScrollValue > scrollValue) {
    navBar.classList.add('reveal');
  } else {
    navBar.classList.remove('reveal');
  } //Resets the value of the Prev


  prevScrollValue = scrollValue;

  if (prevScrollValue === 0) {
    navBar.classList.remove('reveal');
  }
} ///////////////////////////////////////////////////////////////
//Function to Show the Top Arrow


function showTopArrow(currentScrollvalue) {
  //Get the value of starting point to show the top arrow
  var showcaseHeight = document.querySelector('.showcase').clientHeight; //check if the current scroll value is passed that of the window scrollY value

  if (currentScrollvalue > showcaseHeight) {
    document.querySelector('.top-arrow').classList.add('show-top-arrow');
  } else {
    document.querySelector('.top-arrow').classList.remove('show-top-arrow');
  }
} //Click Event for Top Arrow


var topArrow = document.querySelector('.top-arrow');
topArrow.addEventListener('click', function () {
  smoothScrollFun('#header', 1000);
}); //Function to scroll to top of the Page

function smoothScrollFun(setTarget, setDuration) {
  var target = document.querySelector(setTarget); //where to animate to

  var duration = setDuration; //how long it will take to animate

  var targetPos = target.getBoundingClientRect().top; // relative size of the top of the traget

  var startPos = window.pageYOffset; //Current Position of the scrollBar

  var distace = targetPos - startPos; //Distance between the top and scrollBar

  var startTime = null; //start time for timer
  //Actully animating function

  function animateScroll(currentTime) {
    if (startTime === null) startTime = currentTime;
    var timeEplased = currentTime - startTime;
    var run = easeInOut(timeEplased, startPos, distace, duration);
    window.scrollTo(0, run);
    if (timeEplased < duration) requestAnimationFrame(animateScroll);
  } //Timing Function for transition


  function easeInOut(t, b, c, d) {
    t /= d / 2;
    if (t < 1) return c / 2 * t * t + b;
    t--;
    return -c / 2 * (t * (t - 2) - 1) + b;
  }

  ; //requestAnimationframe has a callback of the timestamp

  requestAnimationFrame(animateScroll);
}

/***/ }),

/***/ "./assests/js/components/service.js":
/*!******************************************!*\
  !*** ./assests/js/components/service.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function () {
  var colMain = document.querySelector('.col-row');

  if (colMain) {
    colMain.addEventListener('click', serviceDesc, true);
  } //function to show sevice info


  function serviceDesc(e) {
    var rowCol = colMain.querySelectorAll('.col-3');
    var rowLen = rowCol.length; //loop through them to add an event

    for (var i = 0; i < rowLen; i++) {
      var learnTags = rowCol[i].querySelectorAll('.strong');
      var learnLen = learnTags.length;

      for (var j = 0; j < learnLen; j++) {
        var descTag = learnTags[j].parentNode.parentNode.nextElementSibling;

        if (e.target === learnTags[j]) {
          descTag.classList.add('show');
          console.log('show');
        } else {
          descTag.classList.remove('show');
        }
      }
    }
  }
})();

/***/ }),

/***/ "./assests/js/components/show.js":
/*!***************************************!*\
  !*** ./assests/js/components/show.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function () {
  //Event on parrent
  var wrap = document.querySelector('.wrap');

  if (wrap != null && wrap != undefined) {
    wrap.addEventListener('click', showDesc, true);
  } //function to show the description


  function showDesc(e) {
    e.preventDefault();
    var allImages = wrap.querySelectorAll('img');

    for (var i = 0; i < allImages.length; i++) {
      var desc = allImages[i].parentElement.parentElement.nextElementSibling;

      if (e.target === allImages[i]) {
        desc.classList.add('show');
      } else {
        desc.classList.remove('show');
      }
    }
  }
})();

/***/ }),

/***/ "./assests/js/main.js":
/*!****************************!*\
  !*** ./assests/js/main.js ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ./components/nav.js */ "./assests/js/components/nav.js");

__webpack_require__(/*! ./components/scroll.js */ "./assests/js/components/scroll.js");

__webpack_require__(/*! ./components/service.js */ "./assests/js/components/service.js");

__webpack_require__(/*! ./components/carousel.js */ "./assests/js/components/carousel.js");

__webpack_require__(/*! ./components/accordion.js */ "./assests/js/components/accordion.js");

__webpack_require__(/*! ./components/show.js */ "./assests/js/components/show.js"); //require ('./components/form.js');


__webpack_require__(/*! ./components/contact.js */ "./assests/js/components/contact.js");

/***/ }),

/***/ "./assests/sass/main.scss":
/*!********************************!*\
  !*** ./assests/sass/main.scss ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***********************************************************!*\
  !*** multi ./assests/js/main.js ./assests/sass/main.scss ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\xamppp\htdocs\SoccerSitetoWordpress\wp-content\themes\gsen\assests\js\main.js */"./assests/js/main.js");
module.exports = __webpack_require__(/*! C:\xamppp\htdocs\SoccerSitetoWordpress\wp-content\themes\gsen\assests\sass\main.scss */"./assests/sass/main.scss");


/***/ })

/******/ });
//# sourceMappingURL=main.js.map