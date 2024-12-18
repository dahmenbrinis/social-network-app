import Echo from 'laravel-echo';
import Livewire from '../../vendor/livewire/livewire/dist/livewire.esm';
import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
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
