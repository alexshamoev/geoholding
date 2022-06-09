/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */


require('./bootstrap');
require('./bootstrap_size_getter'); // Comment this, after project finish.

require('./plugins/photo_swipe');

require('./modules/menu_buttons');
require('./modules/search');
require('./modules/basket');
require('./modules/products');


// Vue.
    import { createApp } from 'vue';
    import Example from './components/Example';

    const app = createApp({});

    app.component('example', Example);

    app.mount('#app');
//


// React.
    require('./components/ReactApp');
//


// Restricts input for the set of matched elements to the given inputFilter function.
    (function($) {
        $.fn.inputFilter = function(callback, errMsg) {
        return this.on("input keydown keyup mousedown mouseup select contextmenu drop focusout", function(e) {
            if (callback(this.value)) {
            // Accepted value
            if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
                $(this).removeClass("input-error");
                this.setCustomValidity("");
            }
            this.oldValue = this.value;
            this.oldSelectionStart = this.selectionStart;
            this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
            // Rejected value - restore the previous one
            $(this).addClass("input-error");
            this.setCustomValidity(errMsg);
            this.reportValidity();
            this.value = this.oldValue;
            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
            // Rejected value - nothing to restore
            this.value = "";
            }
        });
        };
    }(jQuery));
// 