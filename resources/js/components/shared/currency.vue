<template>
  <span>
    {{ formattedAmount }}
  </span>
</template>
<script>

export default {
  props: {
    amount: {
      required: true,
      default: 0,
      type: Number,
    },
  },
  computed: {
    formattedAmount() {
      return Intl.NumberFormat('es-CL', {
        style: 'currency',
        currency: 'CLP',
      }).format(this.amount);
    },
  },
};
</script>
