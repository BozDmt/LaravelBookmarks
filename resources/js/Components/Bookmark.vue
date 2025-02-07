<script setup>
import { route } from "ziggy-js";
import { computed } from "vue";
import invertColor from "../invertColor.js";
const props = defineProps({
  bookmark: Object,
  editMode: false,
  link: { type: String, default: "" },
});
let anchorText = computed(() => {
  return props.link.length > 0 ? props.link : props.bookmark.link;
});
</script>

<template>
  <div
    class="card d-flex"
    :style="{
      backgroundColor: props.bookmark.color,
      color: invertColor(props.bookmark.color),
    }"
  >
    <div class="txt-center">
      <div class="groupdef" v-if="bookmark.group !== 'None'">
        Group: {{ bookmark.bookmark_group }}
      </div>
      <a :href="bookmark.link" class="bkmk-a">{{ anchorText }}</a>
    </div>
    <a
      class="edit-bkmk txt-center w-full px-4 py-2 leading-5 hover:bg-gray-100 focus:bg-gray-100 transition duration-150 ease-in-out"
      :href="route('bookmark.edit', bookmark.id)"
      v-if="!editMode"
    >
      Edit
    </a>
  </div>
</template>
