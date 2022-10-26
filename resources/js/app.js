import './bootstrap';
import '../css/app.css';

import {createApp, h} from 'vue';
import {createInertiaApp} from '@inertiajs/inertia-vue3';
import {InertiaProgress} from '@inertiajs/progress';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {ZiggyVue} from '../../vendor/tightenco/ziggy/dist/vue.m';
import {ObserveVisibility} from 'vue-observe-visibility';
import {createStore} from 'vuex';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

import cronologie from "@/Store/cronologie.js";
import likes from "@/Store/likes.js";
import reblasts from "@/Store/reblasts.js"

const store = createStore({
    modules: {
        cronologie,
        likes,
        reblasts
    }
})

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({el, app, props, plugin}) {
        const myApp = createApp({render: () => h(app, props)})
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(store)
            //Am introdus directiva din pachetul observe-visibility
            .directive('observe-visibility', {
                beforeMount: (el, binding, vnode) => {
                    vnode.context = binding.instance;
                    ObserveVisibility.bind(el, binding, vnode);
                },
                update: ObserveVisibility.update,
                unmounted: ObserveVisibility.unbind,
            });

        // config global property after createApp and before mount
        myApp.config.globalProperties.$user = User;

        myApp.mount(el);
    },
});

InertiaProgress.init({color: '#4B5563'});

Echo.channel('blasts').listen('.BlastLikesWereUpdated', (event) => {
    if (event.user_id === User.id) {
        store.dispatch('likes/syncLike', event.id);
    }
    store.commit('cronologie/SET_LIKES', {
        id: event.id,
        count: event.count
    })
}).listen('.BlastReblastsWereUpdated', (event) => {
    if (event.user_id === User.id) {
        store.dispatch('reblasts/syncReblast', event.id);
    }
    store.commit('cronologie/SET_REBLASTS', {
        id: event.id,
        count: event.count
    })
}).listen('.BlastWasDeleted', (event) => {
    store.commit('cronologie/ELIMINATE_BLAST',event.id)
})
