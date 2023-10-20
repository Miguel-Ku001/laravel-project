<template>
    <div>
        <bootstrap-4-datatable :columns="columns" :data="rows" :filter="filter" :per-page="perPage"></bootstrap-4-datatable>
        <bootstrap-4-datatable-pager v-model="page" type="abbreviated"></bootstrap-4-datatable-pager>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                columns:[{
                    label: 'id',
                    field: 'ID'
                },
                {
                    label: 'nombre',
                    field: 'NOMBRE'
                },
                {
                    label: 'poblacion',
                    field: 'POBLACION'
                },
                {
                    label: 'code',
                    field: 'codigo_estado'
                }
                ],
                rows:[],
                page:1,
                filter:'',
                perPage:10
            }
        },
        methods: {
            showEstados: function() {
                axios.get('/estados/getEstados').then(function(res){
                    this.rows = res.data;
                }.bind(this));
            }
        },
        created: function() {
            this.showEstados();
        }
    }
</script>