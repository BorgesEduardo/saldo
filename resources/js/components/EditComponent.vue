<template>
  <div>
    <h1>Editar Saldo</h1>
    <form @submit.prevent="updateSaldo">
      <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label>Cliente</label>
                <input id="cliente" type="text" class="form-control" v-model="saldo.cliente">
            </div>
          </div>

        <div class="col-md-2">
            <div class="form-group">
              <label>Valor</label>
              <input id="valor" type="number" class="form-control" v-model="saldo.valor" >
            </div>
          </div>

          <div class="col-md-2">
            <div class="form-group">
              <label>Valor Deposito</label>
              <input id="valor_deposito" type="number" class="form-control" v-model="saldo.valor_deposito" >
            </div>
          </div>

          <div class="col-md-2">
            <div class="form-group">
              <label>Valor Saque</label>
              <input id="valor_saque" type="number" class="form-control" v-model="saldo.valor_saque" >
            </div>
          </div>
        </div>
        <div class="form-group">
          <button class="btn btn-primary">Atualizar</button>
        </div>
    </form>
  </div>
</template>

<script>
    export default {
        data(){
        return {
          saldo:{},
          notFound: false
        }
    },
    mounted: function(){
        

        $('#valor_deposito').change(function(){
            let saldo_atual = $("#valor").val();
            let deposito = $(this).val();

            let novo_saldo = parseInt(saldo_atual) + parseInt(deposito);

            $("#valor").val(novo_saldo).change();

        });


        $('#valor_saque').change(function(){
            let saldo_atual = $("#valor").val();
            let deposito = $("#valor_deposito").val();
            let saque = $(this).val();

            console.log(saldo_atual);

            let novo_saldo = (parseInt(saldo_atual) + parseInt(deposito)) - parseInt(saque);

            $("#valor").val(novo_saldo);

        });

    },
    created() {
        let uri = `http://localhost:8000/api/saldo/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.saldo = response.data;
        });
      },
    methods: {
      updateSaldo() {
          let uri = `http://localhost:8000/api/saldo/update/${this.$route.params.id}`;

          console.log(this.saldo);
          
        }
    }
  }
</script>