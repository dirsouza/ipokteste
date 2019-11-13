<template>
  <div>
    <b-container class="pt-2" fluid>
      <b-row class="justify-content-md-center">
        <b-col lg="6" md="12" sm="12">
          <salary-employee />
        </b-col>

        <b-col lg="6" md="12" sm="12">
          <departments-payments />
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>
  import SalaryEmployee from "../components/SalaryEmployee";
  import DepartmentsPayments from "../components/DepartmentsPayments";

  export default {
    name: "Home",
    components: {
      SalaryEmployee,
      DepartmentsPayments
    }
  }
</script>

<style scoped>

</style>