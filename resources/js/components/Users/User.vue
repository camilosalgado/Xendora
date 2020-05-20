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
                                            @click="openModalCreateUser()">
                                        <i class="feather icon-user-plus"></i>
                                        <span>Nuevo Usuario</span>
                                    </button>

                                    <!-- Modal actions rol -->
                                    <div class="modal fade text-left" tabindex="-1" role="dialog" id="modalCreateUser"
                                         aria-labelledby="myModalLabel12" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel12">Crear Nuevo Usuario</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form enctype="multipart/form-data">
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="text" v-model="newUser.nombre"
                                                                   class="form-control form-control-sm mb-1"
                                                                   id="iconLeft1" placeholder="Nombre">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-user danger font-small-4"></i>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="text" v-model="newUser.apellido"
                                                                   class="form-control form-control-sm mb-1"
                                                                   id="iconLeft2" placeholder="Apellido">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-user danger font-small-4"></i>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <select id="iconLeft3"
                                                                    class="form-control form-control-sm mb-1"
                                                                    v-model="newUser.tipodocs" >
                                                                <option value="" selected disabled>Seleccione el tipo de Documento ------</option>
                                                                <option v-for="tp in tipodocs" :key="tp.id" :value="tp.id">
                                                                    {{ tp.descripcion }}
                                                                </option>
                                                            </select>
                                                            <div class="form-control-position">
                                                                <i class="feather icon-chevron-down danger font-small-4"></i>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="text" v-model="newUser.documento"
                                                                   class="form-control form-control-sm mb-1"
                                                                   id="iconLeft4" placeholder="Número de Documento">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-hash danger font-small-4"></i>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="text" v-model="newUser.email"
                                                                   class="form-control form-control-sm mb-1"
                                                                   id="iconLeft5" placeholder="Email">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-mail danger font-small-4"></i>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="password" v-model="newUser.pcontrasenia"
                                                                           class="form-control form-control-sm mb-1"
                                                                           id="iconLeft6" placeholder="Primera Contraseña" autocomplete="off">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-lock danger font-small-4"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="password" v-model="newUser.scontrasenia"
                                                                           class="form-control form-control-sm mb-1"
                                                                           id="iconLeft7" placeholder="Segunda Contraseña" autocomplete="off">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-lock danger font-small-4"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cerrar
                                                    </button>
                                                    <button type="button" class="btn btn-primary" @click="saveUser()">
                                                        Guardar Usuario
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
                                    <tr v-for="user in users" :key="user.id" @click="openModalUser(user)">
                                        <td>{{ user.nombre }} {{ user.apellido }}</td>
                                        <td v-text="user.usuario"></td>
                                        <td v-text="user.documento"></td>
                                        <td v-text="user.email"></td>
                                    </tr>
                                    </tbody>
                                </table>

                                <!-- Modal actions rol -->
                                <div class="modal fade text-left" tabindex="-1" role="dialog" id="modalRowUser"
                                     aria-labelledby="myModalLabel11" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-info white">
                                                <h4 class="modal-title" id="myModalLabel11">Asignar Rol</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <fieldset class="form-group position-relative">
                                                    <input type="text" v-model="checkedUser.iduser"
                                                           class="form-control form-control-sm" id="Small"
                                                           style="display: none">
                                                </fieldset>
                                                <fieldset class="right-checkbox" v-for="rol in roles"
                                                          :key="rol.id">
                                                    <div class="custom-control custom-checkbox pl-0">
                                                        <input type="checkbox" v-model="checkedUser.checkedRol"
                                                               :value="rol.id" class="custom-control-input"
                                                               name="customCheckRight"
                                                               :id="'customCheckRight' + rol.id">
                                                        <label class="custom-control-label w-100"
                                                               :for="'customCheckRight' + rol.id">{{
                                                            rol.display_name }}</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn grey btn-outline-secondary"
                                                        data-dismiss="modal">Close
                                                </button>
                                                <button type="button" class="btn btn-outline-info"
                                                        @click="saveUserRol()">Guardar Permisos
                                                </button>
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
        name: "User",
        data() {
            return {
                tipodocs: [],
                users: [],
                newUser: {},
                roles: [],
                checkedUser: {
                    iduser: 0,
                    checkedRol: []
                }
            }
        },
        methods: {
            getTipoDocs: function () {
                let url = "http://172.16.52.162:8083/gettipodocs";
                axios.get(url)
                    .then(response => {
                        this.tipodocs = response.data;

                    })
                    .catch(err => {
                        console.log(err);
                    })
            },
            getUsers: function () {
                let url = "http://172.16.52.162:8083/getusers";
                axios.get(url)
                    .then(response => {
                        this.users = response.data;

                    })
                    .catch(err => {
                        console.log(err);
                    })
            },
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
            openModalCreateUser: function () {
                $('#modalCreateUser').modal('show');
            },
            openModalUser: function (item) {
                $('#modalRowUser').modal('show');
                this.checkedUser.iduser = item.id;
            },
            saveUser() {
                let url = "http://172.16.52.162:8083/saveuser";

                axios.post(url, this.newUser)
                    .then(response => {
                        if (response.data == 'warning') {
                            this.$toast.error(response.data.warning);
                        } else {
                            this.$toast.success(response.data.success);
                            this.clearFieldsCreateUser();
                            this.getUsers();
                        }
                        //console.log(response.data);
                    })
                    .catch(err => {
                        console.log(err);
                    })
            },
            saveUserRol() {
                let url = "http://172.16.52.162:8083/asignarrolauser";
                axios.post(url, this.checkedUser)
                    .then(response => {
                        if (response.data == 'warning') {
                            this.$toast.error(response.data.warning);
                        } else {
                            this.$toast.success(response.data.success);
                        }
                        this.checkedUser.checkedRol = [];
                        //console.log(response.data);
                    })
                    .catch(err => {
                        console.log(err);
                    })
            },
            clearFieldsCreateUser() {
                this.newUser.nombre = '';
                this.newUser.apellido = '';
                this.newUser.tipodocs = '';
                this.newUser.documento = '';
                this.newUser.email = '';
                this.newUser.pcontrasenia = '';
                this.newUser.scontrasenia = '';
            }
        },
        created() {
            this.getTipoDocs();
            this.getUsers();
            this.getRoles();
        }
    }
</script>

<style scoped>
    .table-responsive .table tbody tr:hover {
        cursor: grab;
    }
</style>
