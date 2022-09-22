<script setup>
import AuthFormContainer from '@/Components/AuthFormContainer.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/inertia-vue3';

    const form = useForm({
        name: '',
    })

</script>

<template>

    <Head title="Setup Profile"/>

    <PageTitle>Create Profile</PageTitle>

    <AuthFormContainer>

        <form @submit.prevent="submit">

        </form>        

    </AuthFormContainer>

</template>

<style scoped>

</style>