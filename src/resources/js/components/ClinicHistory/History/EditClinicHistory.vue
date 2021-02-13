<template>
    <form method="POST" v-on:submit.prevent="updatedClinicHistory(fillHistory.id_dueno)">
        <div class="modal fade" id="edit-history">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Editar Historia Clinica de {{ fillHistory.nombre_mascota }}</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="name">Nombre Dueño</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="name" class="form-control mt-1"
                                    v-model="fillHistory.nombre_dueno">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="lastname">Apellidos</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="lastname" class="form-control mt-1"
                                    v-model="fillHistory.apellido">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="select_document">Tipo Documento</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="custom-select mt-1" id="select_document" name="document_type"
                                    v-model="fillHistory.tipo_documento">
                                    <option selected value="CC">CC</option>
                                    <option value="PE">PE</option>
                                    <option value="PA">PA</option>
                                </select>
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="identification">Identificación</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" min="0" name="identification" class="form-control mt-1"
                                    v-model="fillHistory.documento_identificacion">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="select_status">Estado</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="custom-select mt-1" id="select_status" name="status"
                                    v-model="fillHistory.estado">
                                    <option selected value="ACTIVO">ACTIVO</option>
                                    <option value="INACTIVO">INACTIVO</option>
                                </select>
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="select_gender">Género</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="custom-select mt-1" id="select_gender" name="gender"
                                    v-model="fillHistory.genero">
                                    <option selected value="Hombre">Hombre</option>
                                    <option value="Mujer">Mujer</option>
                                </select>
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="border-bottom mt-3 mb-3"></div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="pet_name">Nombre Mascota</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="pet_name" class="form-control mt-1"
                                    v-model="fillHistory.nombre_mascota">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="race">Raza</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="race" class="form-control mt-1" v-model="fillHistory.raza">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="select_gender_pet">Sexo</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="custom-select mt-1" id="select_gender_pet" name="gender_pet"
                                    v-model="fillHistory.sexo">
                                    <option selected value="Macho">Macho</option>
                                    <option value="Hembra">Hembra</option>
                                </select>
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Actualizar">
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                errors: [],
            }
        },
        props: ['fillHistory'],
        methods: {
            updatedClinicHistory: function (id) {
                /*USER PUT*/
                var urlUser = 'user/' + id;
                axios.put(urlUser, this.fillHistory).then(response => {
                    console.log('Usuario Actualizada');
                    /*PET PUT*/
                    var urlPet = 'pet/' + this.fillHistory.id_mascota;
                    axios.put(urlPet, this.fillHistory).then(response => {
                        console.log('Mascota Actualizada');
                        this.errors = [];
                        this.$root.$refs.A.getHistories();
                        $('#edit-history').modal('hide');

                    }).catch(error => {
                        this.errors = error.response.data
                    }); /*PET CIERRE PUT*/

                }).catch(error => {
                    this.errors = error.response.data
                }); /*USER CIERRE PUT*/
            },
        }
    }

</script>
