
<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Link } from '@inertiajs/vue3';
import { Head, usePage } from '@inertiajs/vue3';
const page = usePage();
const employees = page.props.employees;

</script>

<template>
  <div class="dashboard">
    <h1 class="dashboard-title">Employees</h1>
    
    <table class="company-table">
      <thead>
        <tr>
          <th>Last Name</th>
          <th>First Name</th>
          <th>Email</th>
          <th>Phone</th> 
        </tr>
      </thead>
      <tbody>
        <tr v-for="(employee, index) in employees" :key="index" class="company-row">
          <td>{{ employee.last_name }}</td>
          <td>{{ employee.first_name }}</td>
          <td>{{ employee.email }}</td>
          <td>{{ employee.phone }}</td>
          <td>
            <PrimaryButton class="edit-button">
                <a :href="route('employee.edit', { employee: employee.id })">edit</a>
            </PrimaryButton>
            <Link as="button" :href="route('employee.destroy', employee.id)" method="delete" class="delete-button">
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

