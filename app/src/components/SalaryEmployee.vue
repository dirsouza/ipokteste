<template>
  <div>
    <b-card bg-variant="light" border-variant="secondary">
      <b-card-body>
        <b-card-title>Evolução Salarial por Funcionário</b-card-title>
        <b-card-text>
          <line-chart
              :xtitle="chartTitle"
              ytitle="Salários"
              :data="chartData"
              :discrete="true"
              label="Salário"
              prefix="R$ "
              thousands="."
              decimal=","
              :round="2"
              :zeros="true"
          ></line-chart>
        </b-card-text>
        <div class="overflow-auto">
          <b-pagination v-model="currentPage" pills :total-rows="rows" align="right" class="mb-0"></b-pagination>
        </div>
      </b-card-body>
    </b-card>
  </div>
</template>

<script>
export default {
  name: "SalaryEmployee",
  data () {
    return {
      chartTitle: null,
      chartData: null,
      currentPage: 1,
      rows: 0
    }
  },
  beforeMount() {
    this.getTotalEmployees();
    this.getAnnualEmployeeSalary();
  },
  watch: {
    currentPage(val) {
      if(val) this.getAnnualEmployeeSalary();
    }
  },
  methods: {
    async getTotalEmployees() {
      try {
        const res = await this.axios.post("api/v1/get-total-employees");

        this.rows = res.data.data;
      } catch (e) {
        this.$bvToast.toast('Não foi possível recuperar o total de funcionários', {
          title: 'Erro!',
          variant: 'danger',
          autoHideDelay: 3000,
          solid: true
        });
      }
    },
    async getAnnualEmployeeSalary() {
      try {
        this.chartData = [];

        const res = await this.axios.post("api/v1/get-annual-employee-salary", {
          skip: this.currentPage,
          limit: 1,
        });

        const employee = res.data.data[0];

        this.chartTitle = employee.name;
        employee.salaries.forEach(sal => {
          this.chartData.push([ sal.year, sal.salary ]);
        });
      } catch (e) {
        this.$bvToast.toast('Não foi possível recuperar os dados do funcionários', {
          title: 'Erro!',
          variant: 'danger',
          autoHideDelay: 3000,
          solid: true
        });
      }
    }
  }
}
</script>