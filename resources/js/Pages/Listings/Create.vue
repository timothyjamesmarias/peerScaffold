<script setup>
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'
import UppyDashboard from '@/Components/UppyDashboard.vue'
import RichTextEditor from '@/Components/RichTextEditor.vue'

import '@vuepic/vue-datepicker/dist/main.css'
import DatePicker from '@vuepic/vue-datepicker'

import { useForm } from '@inertiajs/inertia-vue3'

const form = useForm({
  title: null,
  description: null,
  start_date: null,
  end_date: null,
  category: null,
  images: null
})

const submit = () => {
  form.post(route('listing.store'), {
    onFinish: () => form.reset()
  })
}

</script>

<template>

    <Head title="Create Listing"/>

    <PageTitle>Create Listing</PageTitle>

    <form @submit.prevent="submit" id="uppy_target">
        <div>
            <InputLabel for="title" value="Listing Title"/>
            <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" required autofocus />
            <InputError class="mt-2" :message="form.errors.title" />
        </div>

        <div>
            <InputLabel for="category" value="Category"/>
            <TextInput id="category" type="text" class="mt-1 block w-full" v-model="form.category" required />
            <InputError class="mt-2" :message="form.errors.category" />
        </div>

        <div>
            <InputLabel for="description" value="Listing Description"/>
            <RichTextEditor id="description" v-model="form.description" />
        </div>

        <div class="flex">
            <div>
                <InputLabel for="start_date" value="From:"/>
                <DatePicker id="start_date" v-model="form.start_date" modelType="yyyy-MM-dd"/>
                <InputError class="mt-2" :message="form.errors.start_date" />
            </div>
            <div>
                <InputLabel for="end_date" value="Until:"/>
                <DatePicker id="end_date" v-model="form.end_date" modelType="yyyy-MM-dd"/>
                <InputError class="mt-2" :message="form.errors.end_date"/>
            </div>
        </div>

        <div class="mt-4">
            <InputLabel for="images" value="Images"/>
            <input type="file"
            id="images"
            @input="form.images = $event.target.files"
            multiple=true
            />
        </div>

        <div class="flex justify-end mt-4">
            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" >
                Create
            </PrimaryButton>
        </div>
    </form>

</template>

<style scoped>

</style>
