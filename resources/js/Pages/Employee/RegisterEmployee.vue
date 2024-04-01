<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps(['company_id']);

const form = useForm({
    first_name: '',
    last_name:'',
    company_id: props.company_id,
    email:'',
    phone:'',
  });

</script>

<template>
    <Head title="ADD Employee" />
 
    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('employee.store'), { onSuccess: () => form.reset() })">
                <div>
                  <InputLabel for="first_name" value="First_name" />

                  <TextInput
                      id="first_name"
                      type="text"
                      class="mt-1 block w-full"
                      v-model="form.first_name"
                      required
                      autofocus
                      autocomplete="name"
                  />

                  <InputError class="mt-2" :message="form.errors.first_name" />
                </div>

                <div class="mt-4">
                  <InputLabel for="last_name" value="Last_name" />

                  <TextInput
                      id="last_name"
                      type="text"
                      class="mt-1 block w-full"
                      v-model="form.last_name"
                      required
                  />

                  <InputError class="mt-2" :message="form.errors.last_name" />
                </div>



                <div class="mt-4">
                  <InputLabel for="email" value="Email" />

                  <TextInput
                      id="email"
                      type="email"
                      class="mt-1 block w-full"
                      v-model="form.email"
                      required
                      autocomplete="email"
                  />

                  <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                  <InputLabel for="phone" value="phone" />

                  <TextInput
                      id="phone"
                      type="text"
                      class="mt-1 block w-full"
                      v-model="form.phone"
                      required
                      autocomplete="username"
                  />

                  <InputError class="mt-2" :message="form.errors.phone" />
                </div>

                <PrimaryButton class="mt-4">Submit</PrimaryButton>
            </form>
        </div>
    </AuthenticatedLayout>

</template>