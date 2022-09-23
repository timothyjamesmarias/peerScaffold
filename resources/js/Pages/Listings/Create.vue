<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

import DatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import Uppy from '@uppy/core'
//import { Dashboard } from '@uppy/vue'
//import '@uppy/core/dist/style.css'
//import '@uppy/dashboard/dist/style.css'

import { useForm } from '@inertiajs/inertia-vue3';


const form = useForm({
    title: null,
    description: null,
    start_date: null,
    end_date: null,
    category: null,
    images: null
});

const submit = () =>{
    form.post(route(listing.store),{
        onFinish: () => form.reset(),
    })
};

</script>

<template>

    <Head title="Create Listing"/>

    <PageTitle>Create Listing</PageTitle>

    <form @submit.prevent="submit">
        <div>
            <InputLabel for="title" value="Listing Title"/>
            <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.password" required autofocus />
            <InputError class="mt-2" :message="form.errors.title" />
        </div>

        <div>
            <InputLabel for="category" value="Category"/>
            <TextInput id="category" type="text" class="mt-1 block w-full" v-model="form.password" required autofocus />
            <InputError class="mt-2" :message="form.errors.category" />
        </div>

        <div>
            <InputLabel for="description" value="Listing Description"/>
            <QuillEditor />
        </div>

        <div class="flex">
            <div>
                <InputLabel for="start_date" value="From:"/>
                <DatePicker id="start_date" v-model="form.start_date"/>
                <InputError class="mt-2" :message="form.errors.start_date"/>    
            </div>
            <div>
                <InputLabel for="end_date" value="Until:"/>
                <DatePicker id="end_date" v-model="form.end_date"/>    
                <InputError class="mt-2" :message="form.errors.end_date"/>    
            </div>
        </div>        

        <div class="flex justify-end mt-4">
            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Create
            </PrimaryButton>
        </div>
    </form>

</template>

<style scoped>


</style>