<script setup>

    import Nav from "@/Components/Nav.vue";

</script>

<template>

    <header>
        <Nav/>
    </header>

    <main class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <slot/>
    </main>

    <footer>

    </footer>
    
</template>

<style scoped>

</style>