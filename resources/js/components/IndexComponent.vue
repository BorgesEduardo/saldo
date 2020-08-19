<template>
  <div>
      <h1>Saldo</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'create' }" class="btn btn-primary">Criar Saldo</router-link>
          </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Cliente</th>
                <th>Saldo</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="saldo in saldos" :key="saldo.id">
                    <td>{{ saldo.cliente }}</td>
                    <td>{{ saldo.valor }}</td>

                    <td>
                      <router-link :to="{name: 'edit', params: { id: saldo.id }}" class="btn btn-primary">Editar</router-link>
                      <button class="btn btn-danger" @click.prevent="deleteSaldo(saldo.id)">Excluir</button>
                    </td>
                </tr>
            </tbody>
        </table>
  </div>
</template>

<script>
  export default {
      data() {
        return {
          saldos: []
        }
      },
      created() {
      let uri = 'http://localhost:8000/api/saldo';
      this.axios.get(uri).then(response => {
        this.saldos = response.data;
      });
    },
    methods: {
      deleteSaldo($id){
        console.log($id);
      }
    }
  }
</script>