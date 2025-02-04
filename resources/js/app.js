import './bootstrap';
import '../css/app.css';

import {createApp, h} from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';

const appName = import.meta.env.VITE_APP_NAME || 'My App';

createInertiaApp({
    title: title=> `${appName}`,
    resolve: name=>{
        // resolvePageComponent(`./Pages/${name}.vue`,
        //      import.meta.glob('./Pages/**/*.vue'),);
        const pages = import.meta.glob('./Pages/**/*.vue',{eager:true});
          return pages[`./Pages/${name}.vue`];

    },
    setup({el,App,props,plugin}){
        createApp({render: ()=> h(App,props)})
        .use(plugin)
        .mount(el);
    },
});
