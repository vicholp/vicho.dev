<template>
  <a
    :href="href"
    class="font-['Fira_Mono'] flex gap-2 items-center rounded-lg border border-black border-opacity-10 px-3 py-1"
  >
    <div>
      <v-icon :icon="icon" />
    </div>
    <div class="text-sm">
      {{ text }}
    </div>
  </a>
</template>

<script>
export default {
  props: {
    href: {
      type: String,
      required: true,
    },
    text: {
      type: String,
      required: true,
    },
    icon: {
      type: String,
      required: true,
    },
  },
};
</script>
