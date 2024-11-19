/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

import 'alpinejs';
import Echo from 'laravel-echo';

import _ from 'lodash';
window._ = _;
try {
    // window.Popper = require('popper.js').default;
    //
    // window.$ = window.jQuery = require('jquery');
} catch (e) {
}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;
// window.axios.defaults.withCredentials = true;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

// online users
window.Echo.join('online')
    .here((users) => {
        // window.console.log(users);

    })
    .joining((user) => {
        // console.log(user);
        Livewire.emit('newUser');
        window.axios.get('/api/user/' + user.id + '/online', {});
    })
    .leaving((user) => {
        // console.log(user);
        Livewire.emit('newUser');
        window.axios.get('/api/user/' + user.id + '/offline', {});
    });
