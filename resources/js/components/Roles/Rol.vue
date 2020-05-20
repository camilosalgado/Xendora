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
                                            @click="openModalCreateRol()">
                                        <i class="feather icon-plus"></i>
                                        <span>Nuevo rol</span>
                                    </button>

                                    <!-- Modal actions rol -->
                                    <div class="modal fade text-left" tabindex="-1" role="dialog" id="modalCreateRoles"
                                         aria-labelledby="myModalLabel12" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel12">Crear Nuevo Rol</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form enctype="multipart/form-data">
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="text" v-model="newRol.name"
                                                                   class="form-control form-control-sm mb-1"
                                                                   id="iconLeft1" placeholder="Nombre del Rol">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-search danger font-small-4"></i>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="text" v-model="newRol.display_name"
                                                                   class="form-control form-control-sm mb-1"
                                                                   id="iconLeft2" placeholder="Nombre de Display">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-search danger font-small-4"></i>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="form-group">
                                                            <textarea class="form-control"
                                                                      v-model="newRol.description" id="descTextarea"
                                                                      rows="3"
                                                                      placeholder="Descripcion del rol"></textarea>
                                                        </fieldset>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cerrar
                                                    </button>
                                                    <button type="button" class="btn btn-primary" @click="saveRol()">
                                                        Guardar Rol
                                                    </button>
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
                                    <tr v-for="rol in roles" :key="rol.id" @click="openModalRol(rol)">
                                        <td>{{ rol.name }}</td>
                                        <td v-text="rol.display_name"></td>
                                        <td v-text="rol.description"></td>
                                        <td v-text="rol.created_at"></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!-- Modal actions rol -->
                                <div class="modal fade text-left" tabindex="-1" role="dialog" id="modalRowRoles"
                                     aria-labelledby="myModalLabel11" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-info white">
                                                <h4 class="modal-title" id="myModalLabel11">Asignar Permisos</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <fieldset class="form-group position-relative">
                                                    <input type="text" v-model="checkedPermisos.idrol" class="form-control form-control-sm" id="Small" style="display: none">
                                                </fieldset>
                                                <fieldset class="right-checkbox" v-for="permiso in permisos" :key="permiso.id">
                                                    <div class="custom-control custom-checkbox pl-0">
                                                        <input type="checkbox" v-model="checkedPermisos.permisos"
                                                               :value="permiso.id" class="custom-control-input"
                                                               name="customCheckRight" :id="'customCheckRight' + permiso.id">
                                                        <label class="custom-control-label w-100" :for="'customCheckRight' + permiso.id">{{
                                                            permiso.display_name }}</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn grey btn-outline-secondary"
                                                        data-dismiss="modal">Close
                                                </button>
                                                <button type="button" class="btn btn-outline-info" @click="saveRolePermissions()">Guardar Permisos</button>
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
        name: "Rol",
        data() {
            return {
                roles: [],
                newRol: {},
                permisos: [],
                checkedPermisos: {
                    idrol: 0,
                    permisos: []
                }
            }
        },
        methods: {
            getRoles: function () {
                let url = "http://172.16.52.162:8083/getroles";
                axios.get(url)
                    .then(response => {
                        this.roles = response.data;

                    })
                    .catch(err => {
                        console.log(err);
                    })
            },
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
            openModalCreateRol: function () {
                $('#modalCreateRoles').modal('show');
            },
            openModalRol: function (item) {
                $('#modalRowRoles').modal('show');
                this.checkedPermisos.idrol = item.id;
            },
            saveRol() {
                let url = "http://172.16.52.162:8083/saverol";
                axios.post(url, this.newRol)
                    .then(response => {
                        this.newRol.name = '';
                        this.newRol.display_name = '';
                        this.newRol.description = '';
                        this.getRoles();
                    })
                    .catch(err => {
                        console.log(err);
                    })
            },
            saveRolePermissions() {
                let url = "http://172.16.52.162:8083/asignarpermisosarol";
                axios.post(url, this.checkedPermisos)
                    .then(response => {
                        console.log(response.data);
                    })
                    .catch(err => {
                        console.log(err);
                    })
            }
        },
        created() {
            this.getRoles();
            this.getPermisos();
        }
    }
</script>

<style scoped>
    .table-responsive .table tbody tr:hover {
        cursor: grab;
    }
</style>
