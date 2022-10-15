<script setup>
import '@uppy/core/dist/style.css'
import '@uppy/dashboard/dist/style.css'
import Uppy from '@uppy/core'
import { Dashboard } from '@uppy/vue'
import Form from '@uppy/form'
import { computed, onBeforeUnmount } from 'vue'

const props = defineProps({
  target: {
    type: String,
    default: null
  }
})

const uppy = computed(() => {
  return new Uppy().use(Form, {
    target: props.target
  })
})

onBeforeUnmount(() => {
  uppy.value.close({ reason: 'unmount' })
})

</script>

<template>
    <dashboard :uppy="uppy"/>
</template>

<style scoped>

</style>
