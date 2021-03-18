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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin/rangs.js":
/*!*************************************!*\
  !*** ./resources/js/admin/rangs.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


function horizontal_handleDropEvent(event, ui) {
  var draggable = ui.draggable;
  ui.draggable.draggable('option', 'revert', false);
  setTimeout(function () {
    ui.draggable.draggable('option', 'revert', true);
  }, 100);
  $(ui.draggable).css('left', '0');
  $(ui.draggable).css('top', '0');
  $(ui.draggable).insertBefore(this);

  for (var i = 0; i < $('.js-sortable-item').length; i++) {// $('.js-sortable-item').eq(i).before($('#drag_target_' + i + '_div'));
  } // Change later (put in for loop with real data)


  $('.js-sortable-item').before($('#drag_target_0_div')); // Change later (put in for loop with real data)
  // update_rangs();
}

function handleDropEvent(event, ui) {
  var draggable = ui.draggable;
  ui.draggable.draggable('option', 'revert', false);
  setTimeout(function () {
    ui.draggable.draggable('option', 'revert', true);
  }, 100);
  $(ui.draggable).css('left', '0');
  $(ui.draggable).css('top', '0');
  $(ui.draggable).insertBefore(this);
  var k = 0;
  var f = 0;

  for (var i = 0; i < $('.standart_blocks_div').length; i++) {
    $('.standart_blocks_div').eq(i).before($('#drag_target_' + k + '_div'));
    k++;

    if (k > 0 && k % 5 === 0) {
      var o = k - 1;
      $('#drag_target_' + o + '_div').after($('.drag_target_clear_div').eq(f));
      $('.drag_target_clear_div').eq(f).after($('#drag_target_' + k + '_div'));
      k++;
      f++;
    } else {}
  }

  $('#drag_target_0_div').after($('.drag_target_clear_div'));
  $('.drag_target_clear_div').after($('#drag_target_0_div')); // update_rangs();
} // function update_rangs() {
// 	var rang = $('.rang_input').length * 5;
// 	var sql_table = $('#js_sql_table').val();
// 	//alert(sql_table);
// 	for(var i = 0; i < $('.rang_input').length; i++) {
// 		var id = $('.rang_input').eq(i).parent().find('.block_id').val();
// 		//console.log(id + ' | ' + rang);
// 		mysql_update(sql_table, "rang = '" + rang + "'", "id = '" + id + "'");
// 		rang -= 5;
// 	}
// 	//console.log('update_rangs');
// }


$(window).on('load', function () {
  $('.drag_target_div').find('div').height($('.standart_blocks_div').height() + 32);
});
$(document).ready(function () {
  $('.standart_blocks_div').draggable({
    stack: '.standart_blocks_div',
    containment: 'section',
    revert: true
  });
  $('.drag_target_div').droppable({
    hoverClass: 'dragover',
    drop: handleDropEvent,
    tolerance: 'touch'
  });
  $('.js-sortable-item').draggable({
    stack: '.js-sortable-item',
    containment: 'section',
    revert: true
  });
  $('.drag_target_horizontal_div').droppable({
    hoverClass: 'dragover',
    drop: horizontal_handleDropEvent,
    tolerance: 'touch'
  }); //console.log('drag_and_drop');
});

/***/ }),

/***/ 1:
/*!*******************************************!*\
  !*** multi ./resources/js/admin/rangs.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\MAMP\htdocs\laravel-template\resources\js\admin\rangs.js */"./resources/js/admin/rangs.js");


/***/ })

/******/ });