import { createApp } from 'vue';

import { Icon } from '@iconify/vue';
import { camelizeKeys } from 'humps';

import * as Sentry from '@sentry/vue';

import i18n from './locales';
import pinia from './stores';
import { createRouter, createWebHashHistory } from 'vue-router';

import Index from './pages/index.vue';

const app = createApp();

import.meta.glob([
  '../../resources/images/**',
  '../../resources/fonts/**',
]);

Sentry.init({
  app,
  dsn: import.meta.env.VITE_SENTRY_DSN || null,
  environment: import.meta.env.VITE_SENTRY_ENVIRONMENT,
  integrations: [
    new Sentry.BrowserTracing(),
  ],
  sampleRate: import.meta.env.VITE_SENTRY_SAMPLE_RATE || false,
  tracesSampleRate: import.meta.env.VITE_SENTRY_TRACES_SAMPLE_RATE || false,
});


const routes = [
  { path: '/', component: Index },
];

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = createRouter({
  // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
  history: createWebHashHistory(),
  routes, // short for `routes: routes`
});

app.use(router);
app.use(i18n);
app.use(pinia);

app.config.globalProperties.$filters = {
  camelizeKeys,
};

app.component('VIcon', Icon);

app.mount('#app');
