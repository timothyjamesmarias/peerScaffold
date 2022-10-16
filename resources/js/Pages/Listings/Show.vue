<script setup>
import PageTitle from '@/Components/PageTitle.vue';
import ContentTitle from '../../Components/ContentTitle.vue';
import ContentParagraph from '../../Components/ContentParagraph.vue';

defineProps({
  listing: {
    type: Object,
    default: null
  },
  images: {
    type: Object,
    default: null
  }
})
</script>

<template>

<PageTitle>{{listing[0].title}}</PageTitle>

<div class="grid grid-cols-2">
    <ContentTitle>Description</ContentTitle>
    <ContentParagraph>{{listing[0].title}}</ContentParagraph>
</div>
</template>
