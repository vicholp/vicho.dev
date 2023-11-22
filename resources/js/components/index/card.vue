<template>
  <div class="flex flex-col py-5 px-3 items-center justify-center gap-5 border rounded-xl">
    <div class="text-black text-opacity-50">
      <v-icon
        :icon="icon"
        class="text-6xl"
      />
    </div>
    <div>
      <div class="font-medium">
        {{ title }}
      </div>
      <div class="text-sm whitespace-break-spaces">
        {{ description }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    title: {
      type: String,
      required: true,
    },
    icon: {
      type: String,
      required: true,
    },
    description: {
      type: String,
      required: true,
    },
  },
};
</script>
