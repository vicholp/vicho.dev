<template>
  <div class="bottom-0 right-0 fixed mb-3 mr-3 flex gap-2">
    <div
      class="bg-white text-black p-3 rounded shadow-lg border hover:bg-gray-100 transition ease-in-out duration-150"
      @click="showCart()"
    >
      Carrito
    </div>
  </div>
</template>
<script>

export default {
  emits: [
    'showCart',
  ],
  methods: {
    showCart() {
      this.$emit('showCart');
    },
  },
};

</script>
