<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 border-right">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-danger btn-glow add-task-btn btn-block my-1"
                                            @click="openModalCreatePermiso()">
                                        <i class="feather icon-plus"></i>
                                        <span>Nuevo Permiso</span>
                                    </button>

                                    <!-- Modal actions rol -->
                                    <div class="modal fade text-left" tabindex="-1" role="dialog" id="modalCreateRoles"
                                         aria-labelledby="myModalLabel12" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel12">Crear Nuevo Permiso</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form enctype="multipart/form-data">
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="text" v-model="newPermiso.name"
                                                                   class="form-control form-control-sm mb-1"
                                                                   id="iconLeft1" placeholder="Nombre del Permiso">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-search danger font-small-4"></i>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="text" v-model="newPermiso.display_name"
                                                                   class="form-control form-control-sm mb-1"
                                                                   id="iconLeft2" placeholder="Nombre de Display">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-search danger font-small-4"></i>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="form-group">
                                                            <textarea class="form-control"
                                                                      v-model="newPermiso.description" id="descTextarea"
                                                                      rows="3"
                                                                      placeholder="Descripcion del Permiso"></textarea>
                                                        </fieldset>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cerrar
                                                    </button>
                                                    <button type="button" class="btn btn-primary" @click="savePermiso()">Guardar Permiso</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr v-for="permiso in permisos" :key="permiso.id" @click="openModalPermiso(permiso)">
                                        <td>{{ permiso.name }}</td>
                                        <td v-text="permiso.display_name"></td>
                                        <td v-text="permiso.description"></td>
                                        <td v-text="permiso.created_at"></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!-- Modal actions rol -->
                                <div class="modal fade text-left" tabindex="-1" role="dialog" id="modalRowRoles"
                                     aria-labelledby="myModalLabel11" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-info white">
                                                <h4 class="modal-title" id="myModalLabel11">Basic Modal</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Check First Paragraph</h5>
                                                <p>Oat cake ice cream candy chocolate cake chocolate cake cotton candy
                                                    dragée apple pie. Brownie carrot cake candy canes bonbon fruitcake
                                                    topping halvah. Cake sweet roll cake cheesecake cookie chocolate
                                                    cake liquorice. Apple pie sugar plum powder donut soufflé.</p>
                                                <p>Sweet roll biscuit donut cake gingerbread. Chocolate cupcake
                                                    chocolate bar ice cream. Danish candy cake.</p>
                                                <hr>
                                                <h5>Some More Text</h5>
                                                <p>Cupcake sugar plum dessert tart powder chocolate fruitcake jelly.
                                                    Tootsie roll bonbon toffee danish. Biscuit sweet cake gummies
                                                    danish. Tootsie roll cotton candy tiramisu lollipop candy cookie
                                                    biscuit pie.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn grey btn-outline-secondary"
                                                        data-dismiss="modal">Close
                                                </button>
                                                <button type="button" class="btn btn-outline-info">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        name: "Permisos",
        data() {
            return {
                permisos: [],
                newPermiso: {},
            }
        },
        methods: {
            getPermisos: function () {
                let url = "http://172.16.52.162:8083/getpermisos";
                axios.get(url)
                    .then(response => {
                        this.permisos = response.data;
                    })
                    .catch(err => {
                        console.log(err);
                    })
            },
            openModalCreatePermiso: function () {
                $('#modalCreateRoles').modal('show');
            },
            openModalPermiso: function (item) {
                $('#modalRowRoles').modal('show');
            },
            savePermiso() {
                let url = "http://172.16.52.162:8083/savepermiso";
                axios.post(url, this.newPermiso)
                    .then(response => {
                        this.newPermiso.name = '';
                        this.newPermiso.display_name = '';
                        this.newPermiso.description = '';
                        this.getPermisos();
                    })
                    .catch(err => {
                        console.log(err);
                    })
            }
        },
        created() {
            this.getPermisos();
        }
    }
</script>

<style scoped>
    .table-responsive .table tbody tr:hover {
        cursor: grab;
    }
</style>
