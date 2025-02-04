<script setup>
import Bookmark from "@/Components/Bookmark.vue";
defineProps(["bookmarks"]);
</script>
<template>
  <div class="d-grid">
    <Bookmark
      v-for="bookmark in bookmarks"
      :key="bookmark.id"
      :bookmark="bookmark"
    />
  </div>
</template>
