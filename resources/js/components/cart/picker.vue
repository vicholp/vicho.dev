<template>
  <div>
    <select
      v-if="features.productVariations"
      v-model="selectedVariationId"
    >
      <option
        v-for="variation in variations"
        :key="variation.id"
        :value="variation.id"
      >
        {{ variation.name }}
      </option>
    </select>
    <button @click="addToCart(selectedVariationId)">
      Add to cart
    </button>
  </div>
</template>
<script>
import { useCartStore } from '@/stores/cart';
import productsApi from '@/api/store/products';

export default {
  props: {
    productId: {
      type: Number,
      required: true,
    },
  },
  setup() {
    const cartStore = useCartStore();

    return {
      cartStore,
    };
  },
  data() {
    return {
      variations: [],
      product: null,
      selectedVariationId: null,
    };
  },
  async mounted() {
    this.product = (await productsApi.show(this.productId, {
      withVariations: true,
    })).data.data;

    this.variations = this.product.variations;

    if (! this.features.productVariations) {
      this.selectedVariationId = this.variations[0].id;
    }
  },
  methods: {
    addToCart(id) {
      this.cartStore.addProductVariationById(id);
    },
  },
};

</script>
