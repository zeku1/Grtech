
<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Link } from '@inertiajs/vue3';
    defineProps(['companies']);
</script>

<template>
  <div class="dashboard">
    <h1 class="dashboard-title">Company Dashboard</h1>
    
    <table class="company-table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Logo</th>
          <th>Website</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(company, index) in companies" :key="index" class="company-row">
          <td>{{ company.name }}</td>
          <td>{{ company.email }}</td>
          <td>
            <img :src="'storage/' + company.logo" alt="Company Logo" class="logo" v-if="company.logo" />
            <span v-else>No logo available</span>
          </td>
          <td><a :href="company.website" target="_blank">{{ company.website }}</a></td>
          <td class="button-container">
            
            <PrimaryButton class="show-button">
                <a :href="route('employee.create', { company: company.id })">add employee</a>
            </PrimaryButton>
            <PrimaryButton class="edit-button">
                <a :href="route('company.view', { company: company.id })">view company</a>
            </PrimaryButton>
            <Link as="button" :href="route('company.destroy', company.id)" method="delete" class="delete-button">
                Delete
            </Link>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>


<style scoped>

button{
 margin-left: 5px;
}

.dashboard {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

.dashboard-title {
  font-size: 24px;
  margin-bottom: 20px;
}

.company-table {
  width: 100%;
  border-collapse: collapse;
}

.company-table th,
.company-table td {
  border: 1px solid #ddd;
  padding: 8px;
}

.company-table th {
  background-color: #f0f0f0;
  text-align: left;
}

.company-row {
  border: 1px solid #ddd; /* Add border around each row */
}

.logo {
  max-width: 100px;
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

