<script setup>
import { Head } from "@inertiajs/vue3";
import HoneCom from "@/Components/HoneCom.vue";

defineProps(["quotes"]);
</script>
<template>
  <Head title="HeadShop" />
  <div
    id="dragcontainer"
    @dragenter.prevent
    @drop="dropHandler($event)"
    @dragover="dragOverHandler($event)"
    style="width: 100%; height: 30vh; text-align: center"
  >
    You can drag here!
  </div>
  <div
    id="elemcontainer"
    @dragenter.prevent
    @drop="dropHandler($event)"
    @dragover="dragOverHandler($event)"
  >
    <HoneCom
      v-for="(quote, index) in quotes"
      :key="quote.id"
      :quote="quote"
      :id="index"
      draggable="true"
      @dragstart="dragStart($event)"
    />
  </div>
  <div
    id="imagecontainer"
    @dragenter.prevent
    @dragover.prevent
    @drop="dropHandler($event)"
  >
    drag images here
  </div>
</template>
  <script>
export default {
  methods: {
    dropHandler(ev, dType = null) {
      ev.preventDefault();
      console.log(ev.dataTransfer.dropEffect);
      const data = ev.dataTransfer.getData("text");
      ev.target.appendChild(document.getElementById(data));
    },
    dragOverHandler(ev) {
      ev.preventDefault();
      ev.dataTransfer.dropEffect = "move";
      ev.target.style.color = "red";
    },
    dragStart(ev) {
      ev.dataTransfer.setData("text", ev.target.id);
      ev.dataTransfer.effectAllowed = "move";
      ev.target.style.color = "cyan";
    },
  },
};
</script>
