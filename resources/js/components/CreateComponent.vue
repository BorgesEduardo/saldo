<template>
  <div>
    <h1>Criar Saldo</h1>
    <form @submit.prevent="addSaldo">
      
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
          <button class="btn btn-primary">Salvar</button>
        </div>
    </form>
  </div>
</template>

<script>
    export default {
        data(){
        return {
          saldo:{}
        }
    },
    mounted: function(){
        //$('#cep').mask('99999-99');
    },
    methods: {
      addSaldo(){
        console.log(this.saldo);
        let uri = 'http://localhost:8000/api/saldo/create';
        this.axios.post(uri, this.saldo).then((response) => {
          this.$router.push({name: 'home'});
        });
      }
    }
  }
</script>