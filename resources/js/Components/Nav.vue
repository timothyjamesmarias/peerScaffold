<script setup>
    import { Inertia } from '@inertiajs/inertia';
    import NavLink from './NavLink.vue';
    import ApplicationLogo from './ApplicationLogo.vue';

    const logout = () => {
        Inertia.post(route('logout'));
    };

</script>

<template>
    
    <nav class="flex justify-between p-4 bg-zinc-900 text-stone-200 sticky top-0 z-50">
            <Link href="/">
                <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
            </Link>
                
        <ul v-if="$page.props.user" class="flex">
            <li class="pl-4"><NavLink :href="route('dashboard')">Account</NavLink></li>
            <li class="pl-4">
                <form method="POST" @submit.prevent="logout">
                    <NavLink as="button">Log Out</NavLink>
                </form>
            </li>
        </ul>

        <ul v-else class="flex">
            <li><NavLink :href="route('login')">Sign In</NavLink></li>
            <li class="pl-4"><NavLink :href="route('register')">Sign Up</NavLink></li>
        </ul>

    </nav>

</template>

<style scoped>

    

</style>