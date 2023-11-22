<template>
  <div hidden />
</template>

<script>

import { getCurrentInstance } from 'vue';

function useCurrentApp() {
  return getCurrentInstance().appContext.app;
}

export default {
  props: {
    productVariations: {
      type: Boolean,
      required: true,
      default: false,
    },
  },
  beforeCreate() {
    let features = {
      productVariations: this.productVariations,
    };

    useCurrentApp().config.globalProperties.features = features;
  },
};

</script>
