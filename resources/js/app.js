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


// Vue.
    import { createApp } from 'vue';
    import Example from './components/Example';

    const app = createApp({});

    app.component('example', Example);

    app.mount('#app');
//


// React.
    require('./components/ExampleReact');
//