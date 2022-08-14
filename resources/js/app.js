/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { createPopper } from '@popperjs/core';
import bootstrap from 'bootstrap'

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 * 
 * Because we are using inertia for SSR & CSR, we're following the instruction
 * that's set by Inertia to create a new Vue App.
 */

createInertiaApp({
    title: title => title ? `${title} - Tuition PayUp` : 'Tuition PayUp',
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
      createApp({ 
        render: () => h(App, props) })
        .use(plugin)
        .use(createPopper)
        .use(bootstrap)
        .mount(el)
    },
  })

