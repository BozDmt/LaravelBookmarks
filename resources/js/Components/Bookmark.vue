<script setup>
import DropDownLink from "./DropDownLink.vue";
import { route } from "ziggy-js";
import { reactive } from "vue";
import inverter from "../invertColor";
import { computed } from "vue";

const props = defineProps(["bookmark", "editor"]);
const col = reactive(props.bookmark);

const invertedColor = computed(() => {
  return inverter.textColor(col.color);
});
</script>

<template>
  <div
    class="cardcontainer shadow-md shadow-indigo-400 border-slate-950 border-solid border-2"
    :style="{ backgroundColor: col.color }"
  >
    <div class="card d-flex" style="filter: invert(100%)">
      <div class="txt-center">
        <div class="groupdef" v-if="bookmark.group !== 'None'">
          Group: {{ bookmark.bookmark_group }}
        </div>
        <a :href="bookmark.link" class="bkmk-a">{{
          bookmark.title ? bookmark.title : bookmark.link
        }}</a>
      </div>
      <DropDownLink
        class="edit-bkmk txt-center block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:bg-gray-100 transition duration-150 ease-in-out"
        :href="route('bookmark.edit', bookmark.id)"
        v-if="!editor"
      >
        > Edit
      </DropDownLink>
    </div>
  </div>
</template>

