
import axios from 'axios';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['CSRF-TOKEN'] = getValueFromId('token');
window.axios.defaults.headers.common["Authorization"] = getValueFromId('token');

window.url = getValueFromId('base_url');
window.app_path = getValueFromId('app_path');

// window.axios.defaults.headers.common['pusher_app_key'] = document.getElementById('pusher_app_key').value;
// window.axios.defaults.headers.common['pusher_app_cluster'] = document.getElementById('pusher_app_cluster').value;


/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */


// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: getValueFromId("f_pusher_app_key"),
//     cluster: getValueFromId("f_pusher_app_cluster"),
//     forceTLS: true
// });


// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
//     wsHost: import.meta.env.VITE_PUSHER_HOST ? import.meta.env.VITE_PUSHER_HOST : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });



function getValueFromId(id)
{
    let value = '';
    let input_box = document.getElementById(id);

    if (input_box)
    {
        value = input_box.value;
    }
    return value;
}
