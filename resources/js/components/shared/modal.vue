<template>
  <div
    class="fixed top-0 left-0 flex w-full h-full z-40 bg-black bg-opacity-50 transition ease-in-out duration-150"
    @click.self="hideModal"
  >
    <div class="my-auto mx-auto w-full z-50">
      <slot />
    </div>
  </div>
</template>
<script>
export default {
  emits: [
    'hideModal',
  ],
  methods: {
    hideModal() {
      this.$emit('hideModal');
    },
  },
};
</script>
