import { createApp } from 'vue';

import { Icon } from '@iconify/vue';
import { camelizeKeys } from 'humps';

import * as Sentry from '@sentry/vue';

import i18n from './locales';
import pinia from './stores';

import VCurrency from './components/shared/currency.vue';

import CartPicker from './components/cart/picker.vue';
import CartModal from './components/cart/modal/index.vue';

import VSearch from './components/layout/search/search.vue';

import VFeatures from './components/features.vue';

import VCheckout from './components/checkout/index.vue';

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

app.use(i18n);
app.use(pinia);

app.config.globalProperties.$filters = {
  camelizeKeys,
};

app.component('VIcon', Icon);
app.component('VCurrency', VCurrency);
app.component('CartPicker', CartPicker);
app.component('CartModal', CartModal);
app.component('VSearch', VSearch);
app.component('VFeatures', VFeatures);
app.component('VCheckout', VCheckout);

app.mount('#app');
