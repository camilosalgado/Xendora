<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Fecha Inicial:</label>
                                                <input type="date" v-model="dataToSearch.field1" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group pt-4">
                                                <button type="button" class="btn btn-primary" @click.prevent="fetchData()">
                                                    <i class="fa fa-search"></i> Buscar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div v-show="loading" class="spinner-grow text-primary" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>

                                        <div class="col-md-2" v-show="!loading" role="status">
                                            <div class="form-group pt-4">
                                                <export-excel :data="rows" :fields="fields" class="btn btn-success" worksheet = "My Worksheet" name="ReporteConceDuplicado.xls">
                                                    <i class="fa fa-download"></i> Descargar Data
                                                </export-excel>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "nomina2-component",
        data() {
            return {
                fields: {
                    'Codigo Empleado': "cod_empl",
                    'Nombres': "nom_empl",
                    'Apellidos': "ape_empl",
                    'Cod Cargo': "cod_carg",
                    'Cargo': "nom_carg",
                    'Cod Ccos': "cod_ccos",
                    'Nombre Ccos': "nom_ccos",
                    'Sueldo Basico': {
                        field: "sue_basi",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    'Cod Conc': "cod_conc",
                    'Nombre Conc': "nom_conc",
                    'Fecha Acum': "fec_acum",
                    'Cantidad': "cantidad"
                },
                rows: [],
                dataToSearch: {},
                loading: false
            }
        },
        methods: {
            fetchData() {
                let me = this;
                let url = "http://172.16.52.162:8084/api/v1/report2getdata/" + me.dataToSearch.field1;

                me.loading = true;

                axios.get(url)
                    .then(res => {
                        me.rows = res.data;
                        me.loading = false;
                    })
                    .catch(err => {
                        console.log(err);
                    })
            },
        }
    }
</script>

<style scoped>

</style>
