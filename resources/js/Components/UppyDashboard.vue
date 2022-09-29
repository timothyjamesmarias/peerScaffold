<script setup>
import '@uppy/core/dist/style.css'
import '@uppy/dashboard/dist/style.css'
import Uppy from '@uppy/core'
import { Dashboard } from '@uppy/vue'
import { computed, onBeforeUnmount } from 'vue';

const uppy = computed(()=>{
    return new Uppy;
})

onBeforeUnmount(()=>{
    uppy.close({reason: 'unmount'});
})

</script>

<template>
    <dashboard :uppy="uppy"/>
</template>

<style scoped>

</style>
