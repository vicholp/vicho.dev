<template>
  <div>
    <cart-modal-button
      v-if="shouldShowButton"
      @show-cart="showCart"
    />
    <cart-modal
      v-if="shouldShowModal"
      @hide-modal="hideModal"
    />
  </div>
</template>
<script>

import { useCartStore } from '@/stores/cart';

import CartModalButton from './button.vue';
import CartModal from './modal.vue';

export default {
  components: {
    CartModalButton,
    CartModal,
  },
  setup() {
    return {
      cart: useCartStore(),
    };
  },
  data() {
    return {
      shouldShowModal: false,
    };
  },
  computed: {
    shouldShowButton() {
      return this.cart.isCartNotEmpty;
    },
  },
  methods: {
    showCart() {
      this.shouldShowModal = true;
    },
    hideModal() {
      this.shouldShowModal = false;
    },
  },
};
</script>
