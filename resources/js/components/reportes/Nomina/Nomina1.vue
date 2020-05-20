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
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Fecha Inicial:</label>
                                                <input type="date" v-model="dataToSearch.field1" class="form-control form-control-sm" required>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Fecha Inicial:</label>
                                                <input type="date" v-model="dataToSearch.field2" class="form-control form-control-sm" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
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
                                                <export-excel :data="rows" :fields="fields" class="btn btn-success" worksheet = "My Worksheet" name="ReporteNomina.xls">
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
        name: "nomina1-component",
        data() {
            return {
                fields: {
                    "Cedula":"Cedula",
                    "Nombres":"Nombres",
                    "Apellidos":"Apellidos",
                    "Cargo":"Cargo",
                    "Centro de Costos":"Centro de Costos",
                    'Sueldo Basico': {
                        field: 'Sueldo Basico',
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    'Dias Laborados': {
                        field: 'Dias Laborados',
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Dias Incap < 2 dias": {
                        field: "Dias Incap < 2 dias",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Dias Incap > 2 dias": {
                        field: "Dias Incap > 2 dias",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Dias Incap ARL": {
                        field: "Dias Incap ARL",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Dias Lic Mat y Pat": {
                        field: "Dias Lic Mat y Pat",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Dias Lic Remunerada": {
                        field: "Dias Lic Remunerada",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Dias Lic No Remunerada": {
                        field: "Dias Lic No Remunerada",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Dias Vacaciones": {
                        field: "Dias Vacaciones",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Salario": {
                        field: "Salario",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Ajuste Salario": {
                        field: "Ajuste Salario",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Auxilio Alimentacion": {
                        field: "Auxilio Alimentacion",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Permisos remunerados": {
                        field: "Permisos remunerados",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Reliquidacion Horas": {
                        field: "Reliquidacion Horas",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Ausencias": {
                        field: "Ausencias",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Suspension": {
                        field: "Suspension",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Reliquidacion": {
                        field: "Reliquidacion",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Auxilio Transporte": {
                        field: "Auxilio Transporte",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Recargos": {
                        field: "Recargos",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Horas Extras": {
                        field: "Horas Extras",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Retroactivo Recargos": {
                        field: "Retroactivo Recargos",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Retroactivo Horas Extras": {
                        field: "Retroactivo Horas Extras",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Incap < 2 dias": {
                        field: "Incap < 2 dias",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Incap > 2 dias": {
                        field: "Incap > 2 dias",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Incapacidad ARL": {
                        field: "Incapacidad ARL",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Lic Remunerada": {
                        field: "Lic Remunerada",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Licencia Mat y Pat": {
                        field: "Licencia Mat y Pat",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Vacaciones Tiempo": {
                        field: "Vacaciones Tiempo",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Vacaciones Compensadas": {
                        field: "Vacaciones Compensadas",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Intereses Cesantias": {
                        field: "Intereses Cesantias",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Prima Legal": {
                        field: "Prima Legal",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Anticipo": {
                        field: "Anticipo",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Otros Ingresos": {
                        field: "Otros Ingresos",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Total Devengado": {
                        field: "Total Devengado",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Salud": {
                        field: "Salud",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Pension": {
                        field: "Pension",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Fondo Solidaridad": {
                        field: "Fondo Solidaridad",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Pensiones Voluntarias": {
                        field: "Pensiones Voluntarias",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Retefuente": {
                        field: "Retefuente",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Mayor Valor Horas Extras": {
                        field: "Mayor Valor Horas Extras",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Mayor Valor Subsidio Transp": {
                        field: "Mayor Valor Subsidio Transp",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Mayor Valor Vacaciones": {
                        field: "Mayor Valor Vacaciones",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Permisos No remunerados": {
                        field: "Permisos No remunerados",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Descuento Incentivos": {
                        field: "Descuento Incentivos",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Prestamos": {
                        field: "Prestamos",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Mayor Valor Salario": {
                        field: "Mayor Valor Salario",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Libranza": {
                        field: "Libranza",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Multas y Huellero": {
                        field: "Multas y Huellero",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "AMI": {
                        field: "AMI",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Casino": {
                        field: "Casino",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Celular": {
                        field: "Celular",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Colseguros": {
                        field: "Colseguros",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "El Cid": {
                        field: "El Cid",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Embargos": {
                        field: "Embargos",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Fundacion": {
                        field: "Fundacion",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Los Olivos": {
                        field: "Los Olivos",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Parqueadero": {
                        field: "Parqueadero",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Poliza Scare": {
                        field: "Poliza Scare",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Preverriso": {
                        field: "Preverriso",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Vacuna": {
                        field: "Vacuna",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Otros descuentos": {
                        field: "Otros descuentos",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Total Deducido": {
                        field: "Total Deducido",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                    "Neto Pagado": {
                        field: "Neto Pagado",
                        callback: (value) => {
                            return Math.trunc(value);
                        }
                    },
                },
                rows: [],
                dataToSearch: {},
                loading: false
            }
        },
        methods: {
            fetchData() {
                let me = this;
                let url = "http://172.16.52.162:8084/api/v1/report1getdata/" + me.dataToSearch.field1 + "/fin/" + me.dataToSearch.field2;

                me.loading = true;

                axios.get(url)
                    .then(res => {
                        me.rows = res.data;
                        me.loading = false;
                    })
                    .catch(err => {
                        console.log(err);
                    })
            }
        }
    }
</script>

<style scoped>

</style>
