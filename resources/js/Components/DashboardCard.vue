<script setup>

    defineProps({
        
    })

</script>

<template>

    <Link href="">
        <div class="w-50 h-50 rounded-lg drop-shadow-md border-2 border-solid border-zinc-900 hover:brightness-75">
            <h1 class="align-middle text-center text-lg font-semibold">
                <slot/>
            </h1>
        </div>
    </Link>

</template>

<style scoped>


</style>