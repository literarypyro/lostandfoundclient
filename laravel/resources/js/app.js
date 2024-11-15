//require('./bootstrap');
import { createApp } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/inertia';

createInertiaApp({
    resolve:name=>require('./Pages/${name}.vue'),
    setup({ el,App,props,plugin}) {
        createApp({ render: () => h(Apps,props) })
        .use(plugin)
        .mount(el);


    },


});

InertiaProgress.init();
