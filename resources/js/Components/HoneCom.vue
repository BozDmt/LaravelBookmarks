<script setup>
const props = defineProps(["quote"]);
</script>

<template>
  <!-- <div class="border-4 border-gray p-4 m-2"> -->
  <div class="bg-orange-100">
    {{ quote }}
  </div>
  <!-- </div> -->
</template>
