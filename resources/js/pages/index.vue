<template>
  <VNavbar />
  <div class="container mx-auto flex flex-col gap-5">
    <div class="flex flex-col md:flex-row items-center gap-10 font-['Fira_Mono'] justify-center mt-10">
      <img
        class="rounded-full h-72 w-72 object-cover shadow"
        src="../assets/images/me.jpg"
      >
      <div class="flex flex-col justify-center">
        <div class="text-sm font-medium text-opacity-60 text-black">
          Tech enthusiast
        </div>
        <div class="text-2xl mt-2">
          Vicente Lineros Pardo
        </div>
        <div class="mt-5" />
        <div class="flex gap-4">
          <index-contact
            href="https://github.com/vicholp"
            icon="mdi:github"
            text="vicholp"
          />
          <index-contact
            href="https://linkedin.com/in/vicholp"
            icon="mdi:linkedin"
            text="Vicente Lineros Pardo"
          />
        </div>
      </div>
    </div>
    <div class="font-['Fira_Mono'] italic text-black text-opacity-70 text-center mt-10">
      This is under construction
    </div>
  </div>
</template>

<script>

import VNavbar from '@/components/layout/navbar.vue';
import IndexContact from '@/components/index/contact.vue';


export default {
  components: {
    VNavbar,
    IndexContact,
  },
};

</script>
