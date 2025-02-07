<script setup>
import { useForm } from "@inertiajs/vue3";
import Bookmark from "@/Components/Bookmark.vue";
import { computed, ref } from "vue";
import InputError from "@/Components/InputError.vue";
import { route } from "ziggy-js";
import invertColor from "../invertColor.js";

const props = defineProps(["bookmark", "groups"]);
const form = useForm({
  id: props.bookmark.id,
  color: props.bookmark.color,
  title: props.bookmark.title,
  link: props.bookmark.link,
  bookmark_group: props.bookmark.group,
});

const refLink = ref("");

const choice = ref(props.bookmark.bookmark_group);
form.bookmark_group = choice === "None" ? null : choice;

const sendForm = () => {
  form.patch(route("bookmark.update", form.id), {
    onSuccess: () => {
      form.reset();
    },
  });
};
</script>
<template>
  <div class="flex justify-center items-center" id="edit-bkmk">
    <Bookmark
      :bookmark="bookmark"
      :editMode="true"
      :style="{ backgroundColor: form.color, color: invertColor(form.color) }"
      :link="refLink"
    />
  </div>
  <div class="form-container">
    <form @submit.prevent="sendForm">
      <input type="hidden" v-model="form.id" />
      <label for="picker">Pick a color</label>
      <input type="color" name="picker" v-model="form.color" />
      <label for="link">Enter a link: </label>
      <input
        type="text"
        name="link"
        v-model="form.link"
        @input="(event) => (refLink = event.target.value)"
      />
      <label for="link">Enter a title: </label>
      <input type="text" name="title" v-model="form.title" />
      <label for="group">Group:</label>
      <select v-model="choice" name="group">
        <option v-for="group in groups" :key="group" :value="group">
          {{ group }}
        </option>
        <option>None</option>
      </select>

      <button>Confirm</button>
      <InputError :message="form.errors.message" />
    </form>
    <a :href="route('index')">Go back</a>
  </div>
</template>
