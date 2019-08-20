<template>

   <div class="container">

       <div class="row">

           <div class="col-md-12">

               <div class="panel panel-default">
                   
                   <div class="panel-heading">
                   
                        <h3><span class="glyphicon glyphicon-dashboard"></span>LISTA DE PESSOAS</h3> <br>
                  
                   </div>
                   
                   <div style='width:100%' class="panel-body">

                        <table style='width:100%' class="table table-bordered table-striped" v-if="pessoas.length > 0">

                                   <tbody>

                                       <tr>
                                           <th>
                                               ID
                                           </th>
                                           <th>
                                               Nome
                                           </th>
                                           <th>
                                               E-mail
                                           </th>
                                           <th>
                                               DDD
                                           </th>
                                           <th>
                                               Telefone
                                           </th>
                                       </tr>

                                       <tr v-for="(pessoa, index) in pessoas">
                                           <td>{{ pessoa.id }}</td>
                                           <td>
                                               {{ pessoa.nome }}
                                           </td>
                                           <td>
                                               {{ pessoa.email }}
                                           </td>

                                          <td>
                                               {{ pessoa.ddd }}
                                           </td>

                                           <td>
                                               {{ pessoa.telefone }}
                                           </td>

                                          
                                       </tr>

                                   </tbody>

                                    <paginate
                                        :page-count="pageCount"
                                        :click-handler="fetch"
                                        :prev-text="' Anterior - '"
                                        :next-text="'- Próximo - '"
                                        :container-class="'pagination'">
                                    </paginate>

                       </table>

                   </div>

               </div>

           </div>

       </div>
                   
   </div>

 </template>



<script>
    export default {
        data() {
            return {
                pessoas: [],
                pageCount: 1,
                endpoint: 'api/pessoas?page='
            };
        },
        created() {
            this.fetch();
        },
        methods: {
            fetch(page = 1) {
                axios.get(this.endpoint + page)
                    .then(({data}) => {
                        this.pessoas = data.data;
                        this.pageCount = data.meta.last_page;
                    });
            }
           
           
        }
    }
</script>
