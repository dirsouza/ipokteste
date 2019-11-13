<template>
  <div>
    <b-card bg-variant="light" border-variant="secondary">
      <b-card-body>
        <b-card-title>Percentual por Departamento sob Total de Pagamentos</b-card-title>
        <b-card-text>
          <column-chart
              :data="chartData"
              :stacked="true"
              suffix="%"
              decimal=","
              label="Percentual"
              xtitle="Departamentos"
              ytitle="Percentuais"
          ></column-chart>
        </b-card-text>
      </b-card-body>
    </b-card>
  </div>
</template>

<script>
  export default {
    name: "DepartmentsPayments",
    data () {
      return {
        chartData: null
      }
    },
    beforeMount() {
      this.getDepartmentsForPayments();
    },
    methods: {
      async getDepartmentsForPayments() {
        try {
          this.chartData = [];

          const res = await this.axios.post("api/v1/get-departments-for-payments");

          const payments = res.data.data;

          payments.forEach(payment => {
            this.chartData.push([ payment.dept_name, payment.sal_dep_percent ]);
          });
        } catch (e) {
          this.$bvToast.toast('Não foi possível recuperar os percentuais por Departamento.', {
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