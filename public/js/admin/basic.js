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

/***/ "./resources/js/admin/basic.js":
/*!*************************************!*\
  !*** ./resources/js/admin/basic.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// window.$ = window.jQuery = require('jquery');
// import  'jquery-ui/ui/widgets/sortable';
// import  'jquery-ui/ui/widgets/draggable';
// import  'jquery-ui/ui/widgets/droppable';
var animation_speed = 50;

function init_type_select() {
  // show_type_blocks($('#type_select').val(), 0);
  $('#type_select').on('change', function () {
    // show_type_blocks($(this).val(), 250);
    // console.log('fff: ' + $(this).val());
    $('.step2 .dataBlock').fadeOut(0);

    if ($(this).val() === 'input') {
      $('.step2 .forInput').fadeIn(0);
    }

    if ($(this).val() === 'editor') {
      $('.step2 .forEditor').fadeIn(0);
    }

    if ($(this).val() === 'file') {
      $('.step2 .forFile').fadeIn(0);
    }

    if ($(this).val() === 'image') {
      $('.step2 .forImage').fadeIn(0);
    }

    if ($(this).val() === 'alias') {
      $('.step2 .forAlias').fadeIn(0);
    }

    if ($(this).val() === 'select') {
      $('.step2 .forSelect').fadeIn(0);
    }

    if ($(this).val() === 'calendar') {
      $('.step2 .forCalendar').fadeIn(0);
    }

    if ($(this).val() === 'color_picker') {
      $('.step2 .forColorPicker').fadeIn(0);
    }

    if ($(this).val() === 'rang') {
      $('.step2 .forRang').fadeIn(0);
    }

    if ($(this).val() === 'published') {
      $('.step2 .forPublished').fadeIn(0);
    }

    if ($(this).val() === 'select_with_optgroup') {
      $('.step2 .forSelectWithOptgroup').fadeIn(0);
    }

    if ($(this).val() === 'select_with_ajax') {
      $('.step2 .forSelectWithAjax').fadeIn(0);
    }

    if ($(this).val() === 'checkbox') {
      $('.step2 .forCheckbox').fadeIn(0);
    }

    if ($(this).val() === 'multiply_checkboxes') {
      $('.step2 .forMultiplyCheckboxes').fadeIn(0);
    }

    if ($(this).val() === 'multiply_checkboxes_with_category') {
      $('.step2 .forMultiplyCheckboxesWithCategory').fadeIn(0);
    }

    if ($(this).val() === 'multiply_input_params') {
      $('.step2 .forMultiplyInputParams').fadeIn(0);
    } // if($(this).val() === 'published') {
    // 	$('.step2 .forPublished').fadeIn(0);
    // }
    // if($(this).val() === 'published') {
    // 	$('.step2 .forPublished').fadeIn(0);
    // }

  });
}

function hide_type_blocks(speed_delay) {
  $('.type_div').fadeOut(speed_delay);
} // function show_type_blocks(id, speed_delay) {
// 	let block_id = $('#block_id_input').val();
// 	hide_type_blocks(speed_delay);
// 	$('.type_' + id).fadeIn(animation_speed);
// }


$(document).ready(function () {
  jQuery('.svg_img').each(function () {
    var $img = jQuery(this);
    var imgID = $img.attr('id');
    var imgClass = $img.attr('class');
    var imgURL = $img.attr('src');
    jQuery.get(imgURL, function (data) {
      /* Get the SVG tag, ignore the rest*/
      var $svg = jQuery(data).find('svg');
      /* Add replaced image's ID to the new SVG */

      if (typeof imgID !== 'undefined') {
        $svg = $svg.attr('id', imgID);
      }
      /* Add replaced image's classes to the new SVG */


      if (typeof imgClass !== 'undefined') {
        $svg = $svg.attr('class', imgClass + ' replaced-svg');
      }
      /* Remove any invalid XML tags as per http://validator.w3.org */


      $svg = $svg.removeAttr('xmlns:a');
      /* Check if the viewport is set, else we gonna set it if we can. */

      if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
        $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'));
      }
      /* Replace image with new SVG */


      $img.replaceWith($svg);
    }, 'xml');
  });
  $('.delete-block').on('click', function () {
    var conf = confirm('ნამდვილად გსურთ მონაცემების წაშლა?');

    if (conf) {
      window.location.href = $(this).data('delete-link');
    }
  });
  init_type_select(); // Modules.

  $('.modulesStep0__typeBox').fadeOut(0);
  var active_include_type = $('.modulesStep0 input[name="include_type"]:checked').val();
  $('.modulesStep0__type' + active_include_type + 'Box').fadeIn(0);
  $('.modulesStep0 input[name="include_type"]').on('change', function () {
    $('.modulesStep0__typeBox').fadeOut(0);
    $('.modulesStep0__type' + $(this).val() + 'box').fadeIn(0);
  }); //
});

/***/ }),

/***/ "./resources/sass/admin/_atom.scss":
/*!*****************************************!*\
  !*** ./resources/sass/admin/_atom.scss ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/admin/classes.scss":
/*!*******************************************!*\
  !*** ./resources/sass/admin/classes.scss ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/admin/custom-bootstrap.scss":
/*!****************************************************!*\
  !*** ./resources/sass/admin/custom-bootstrap.scss ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/admin/for_editors.scss":
/*!***********************************************!*\
  !*** ./resources/sass/admin/for_editors.scss ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/admin/html_tags.scss":
/*!*********************************************!*\
  !*** ./resources/sass/admin/html_tags.scss ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/admin/identifiers.scss":
/*!***********************************************!*\
  !*** ./resources/sass/admin/identifiers.scss ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/admin/jquery_ui.scss":
/*!*********************************************!*\
  !*** ./resources/sass/admin/jquery_ui.scss ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/modules/_atom.scss":
/*!*******************************************!*\
  !*** ./resources/sass/modules/_atom.scss ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/modules/app.scss":
/*!*****************************************!*\
  !*** ./resources/sass/modules/app.scss ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/modules/custom-bootstrap.scss":
/*!******************************************************!*\
  !*** ./resources/sass/modules/custom-bootstrap.scss ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/modules/html_tags.scss":
/*!***********************************************!*\
  !*** ./resources/sass/modules/html_tags.scss ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/modules/icons.scss":
/*!*******************************************!*\
  !*** ./resources/sass/modules/icons.scss ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/modules/main.scss":
/*!******************************************!*\
  !*** ./resources/sass/modules/main.scss ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** multi ./resources/js/admin/basic.js ./resources/sass/modules/_atom.scss ./resources/sass/modules/html_tags.scss ./resources/sass/modules/icons.scss ./resources/sass/modules/app.scss ./resources/sass/modules/main.scss ./resources/sass/modules/custom-bootstrap.scss ./resources/sass/admin/_atom.scss ./resources/sass/admin/bar.scss ./resources/sass/admin/classes.scss ./resources/sass/admin/for_editors.scss ./resources/sass/admin/html_tags.scss ./resources/sass/admin/identifiers.scss ./resources/sass/admin/left_part.scss ./resources/sass/admin/pages.scss ./resources/sass/admin/status_line.scss ./resources/sass/admin/custom-bootstrap.scss ./resources/sass/admin/tags.scss ./resources/sass/admin/jquery_ui.scss ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Applications/MAMP/htdocs/blog/resources/js/admin/basic.js */"./resources/js/admin/basic.js");
__webpack_require__(/*! /Applications/MAMP/htdocs/blog/resources/sass/modules/_atom.scss */"./resources/sass/modules/_atom.scss");
__webpack_require__(/*! /Applications/MAMP/htdocs/blog/resources/sass/modules/html_tags.scss */"./resources/sass/modules/html_tags.scss");
__webpack_require__(/*! /Applications/MAMP/htdocs/blog/resources/sass/modules/icons.scss */"./resources/sass/modules/icons.scss");
__webpack_require__(/*! /Applications/MAMP/htdocs/blog/resources/sass/modules/app.scss */"./resources/sass/modules/app.scss");
__webpack_require__(/*! /Applications/MAMP/htdocs/blog/resources/sass/modules/main.scss */"./resources/sass/modules/main.scss");
__webpack_require__(/*! /Applications/MAMP/htdocs/blog/resources/sass/modules/custom-bootstrap.scss */"./resources/sass/modules/custom-bootstrap.scss");
__webpack_require__(/*! /Applications/MAMP/htdocs/blog/resources/sass/admin/_atom.scss */"./resources/sass/admin/_atom.scss");
!(function webpackMissingModule() { var e = new Error("Cannot find module '/Applications/MAMP/htdocs/blog/resources/sass/admin/bar.scss'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
__webpack_require__(/*! /Applications/MAMP/htdocs/blog/resources/sass/admin/classes.scss */"./resources/sass/admin/classes.scss");
__webpack_require__(/*! /Applications/MAMP/htdocs/blog/resources/sass/admin/for_editors.scss */"./resources/sass/admin/for_editors.scss");
__webpack_require__(/*! /Applications/MAMP/htdocs/blog/resources/sass/admin/html_tags.scss */"./resources/sass/admin/html_tags.scss");
__webpack_require__(/*! /Applications/MAMP/htdocs/blog/resources/sass/admin/identifiers.scss */"./resources/sass/admin/identifiers.scss");
!(function webpackMissingModule() { var e = new Error("Cannot find module '/Applications/MAMP/htdocs/blog/resources/sass/admin/left_part.scss'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
!(function webpackMissingModule() { var e = new Error("Cannot find module '/Applications/MAMP/htdocs/blog/resources/sass/admin/pages.scss'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
!(function webpackMissingModule() { var e = new Error("Cannot find module '/Applications/MAMP/htdocs/blog/resources/sass/admin/status_line.scss'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
__webpack_require__(/*! /Applications/MAMP/htdocs/blog/resources/sass/admin/custom-bootstrap.scss */"./resources/sass/admin/custom-bootstrap.scss");
!(function webpackMissingModule() { var e = new Error("Cannot find module '/Applications/MAMP/htdocs/blog/resources/sass/admin/tags.scss'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
module.exports = __webpack_require__(/*! /Applications/MAMP/htdocs/blog/resources/sass/admin/jquery_ui.scss */"./resources/sass/admin/jquery_ui.scss");


/***/ })

/******/ });