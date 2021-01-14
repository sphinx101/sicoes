window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('overlayscrollbars');
    require('icheck-bootstrap');
    require('../../vendor/almasaeed2010/adminlte/dist/js/adminlte');

    require('bootstrap');

    //DataTable
    require('datatables.net-bs4');
    require('datatables.net-buttons/js/dataTables.buttons');
    //require('datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js');
    require('datatables.net-buttons/js/buttons.html5');
    require('datatables.net-buttons/js/buttons.print');
    require('datatables.net-responsive/js/dataTables.responsive');
    require('datatables.net-responsive-bs4/js/responsive.bootstrap4');

    //Bootstrap File input
    require('bootstrap-fileinput/js/fileinput');
    require('bootstrap-fileinput/js/locales/es');
    require('bootstrap-fileinput/js/plugins/piexif');
    require('bootstrap-fileinput/js/plugins/sortable');
    require('bootstrap-fileinput/themes/fa/theme');
    require('bootstrap-fileinput/themes/fas/theme');







} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');
window.toastr = require('toastr');
window.JSZip = require('jszip/dist/jszip');

// Utilizado para generar PDF
window.pdfMake = require('pdfmake/build/pdfmake');
window.pdfFonts = require('pdfmake/build/vfs_fonts');
pdfMake.vfs=pdfFonts.pdfMake.vfs;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
