<template>
  <modal>
    <div class="max-w-[45rem] bg-white dark:bg-gray-900 dark:text-white dark:text-opacity-90 rounded-lg p-6 mx-auto">
      <div
        v-if="isCartNotEmpty"
        class="flex flex-col gap-4"
      >
        <div class="flex">
          <h2 class="font-medium text-lg text-center">
            Carrito
          </h2>
          <div
            class="ml-auto"
            @click="hideModal"
          >
            <v-icon icon="bx:bx-x" />
          </div>
        </div>
        <div class="flex flex-col gap-4">
          <div
            v-for="product in cart.products"
            :key="product.id"
          >
            <div class="font-medium">
              {{ product.name }}
            </div>
            <div class="ml-3 flex flex-col gap-3">
              <div

                v-for="variation in product.variations"
                :key="variation.id"
                class="flex items-center"
              >
                <div
                  v-if="features.productVariations"
                >
                  <div>
                    {{ variation.name }}
                  </div>
                </div>
                <v-currency
                  class="ml-auto"
                  :amount="variation.quantity * variation.price"
                />
                <button
                  class="p-3"
                  @click="cart.removeProductVariationById(variation.id)"
                >
                  <v-icon icon="bx:bx-x" />
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="flex flex-row-reverse gap-4">
          <button
            @click="cart.clear()"
          >
            Clear
          </button>
          <a
            class="bg-purple-900 p-3 rounded-lg w-min text-white"
            href="/checkout"
          >
            Confirmar
          </a>
          <a
            class="bg-gray-600 p-3 rounded-lg w-min text-white"
            @click="hideModal"
          >
            Cerrar
          </a>
        </div>
      </div>
      <div
        v-else
        class="flex flex-col gap-3"
      >
        <span class="text-center font-medium my-3">
          El carrito esta vacio
        </span>
        <button
          type="button"
          class="bg-purple-900 p-3 rounded text-white text-center"
          @click="hideModal"
        >
          Seguir comprando
        </button>
      </div>
    </div>
  </modal>
</template>
<script>

import { useCartStore } from '@/stores/cart';
import modal from '@/components/shared/modal.vue';

export default {
  components: {
    modal,
  },
  emits: [
    'hideModal',
  ],
  setup() {
    return {
      cart: useCartStore(),
    };
  },
  computed: {
    isCartNotEmpty() {
      return this.cart.isCartNotEmpty;
    },
  },
  methods: {
    hideModal() {
      this.$emit('hideModal');
    },
  },
};
</script>
