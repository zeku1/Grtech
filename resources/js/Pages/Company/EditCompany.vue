<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps(['company']);

const form = useForm({
    name: props.company.name,
    email: props.company.email,
    logo:null,
    website:props.company.website,
  });

  // Method to handle file selection
const handleFileInputChange = (event) => {
    const file = event.target.files[0];
    form.logo = file;
};

</script>

<template>
    <Head title="Edit Company" />
 
    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.put(route('company.update',{ company: company.id }), { onSuccess: () => form.reset() })">
                <div>
                  <InputLabel for="name" value="Name" />

                  <TextInput
                      id="name"
                      type="text"
                      class="mt-1 block w-full"
                      v-model="form.name"
                      required
                      autofocus
                      autocomplete="name"
                  />

                  <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="mt-4">
                  <InputLabel for="email" value="Email" />

                  <TextInput
                      id="email"
                      type="email"
                      class="mt-1 block w-full"
                      v-model="form.email"
                      required
                      autocomplete="username"
                  />

                  <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div>
                    <InputLabel for="logo" value="Logo" />
                    <input
                        id="logo"
                        type="file"
                        class="mt-1 block w-full"
                        @change="handleFileInputChange"
                        autocomplete="name"
                    />
                </div>

                <div class="mt-4">
                  <InputLabel for="website" value="Website" />

                  <TextInput
                      id="website"
                      type="text"
                      class="mt-1 block w-full"
                      v-model="form.website"
                      required
                      autocomplete="username"
                  />

                  <InputError class="mt-2" :message="form.errors.website" />
                </div>

                <PrimaryButton class="mt-4">edit</PrimaryButton>
            </form>
        </div>
    </AuthenticatedLayout>

</template>

