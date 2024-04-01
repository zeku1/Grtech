<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Company from '@/Components/Company.vue'
import { Head } from '@inertiajs/vue3';

defineProps(['companies']);
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>

        <div>
            <Company
             :companies="companies" 
             />
        </div>
        


    </AuthenticatedLayout>
</template>

