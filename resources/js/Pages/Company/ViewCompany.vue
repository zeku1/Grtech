<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Employee from '@/Components/Employee.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { defineProps } from 'vue';
import { Head, usePage } from '@inertiajs/vue3';

const page = usePage();
const employees = page.props.employees;

defineProps({
  company: Object,
});
</script>

<template>
    <AuthenticatedLayout>
        <div class="company">
            <Head :title="company.name" />
            <div class="company-details">
                <h2>{{ company.name }}</h2>
                <p>Email: {{ company.email }}</p>
                <p>Website: <a :href="company.website" target="_blank">{{ company.website }}</a></p>
                <img :src="'storage/' + company.logo" alt="Company Logo" class="logo" />
            </div>

            <PrimaryButton class="edit-button">
                <a :href="route('company.edit', { company: company.id })">Edit</a>
            </PrimaryButton>

            <PrimaryButton class="show-button">
                <a :href="route('employee.create', { company: company.id })">add employee</a>
            </PrimaryButton>
            
            <div class="employees">
                <Employee
                :employees="employees" 
                />
            </div>
            
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

button{
 margin-left: 5px;
}
.company {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

.company-details {
  margin-bottom: 20px;
}

.company-details img {
  max-width: 100px;
}

.employees {
  margin-top: 20px;
}

.employees ul {
  list-style: none;
  padding: 0;
}

.employees li {
  margin-bottom: 5px;
}

.button-container {
  display: flex;
  justify-content: space-between;
}

.show-button, .edit-button, .delete-button {
  padding: 8px 16px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.show-button {
  background-color: #4caf50;
  color: white;
}

.edit-button {
  background-color: #2196f3;
  color: white;
}

.delete-button {
  background-color: #f44336;
  color: white;
}
</style>
  