<script setup>
import { objectToString } from '@vue/shared';


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
{{listing}}
</template>
