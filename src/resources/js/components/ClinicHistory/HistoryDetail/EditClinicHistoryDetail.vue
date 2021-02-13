<template>
    <form method="POST" v-on:submit.prevent="updatedClinicHistoryDetail(fillHistoryDetail.colaborador_id)">
        <div class="modal fade" id="edit-history-detail">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Editar Detalle Historia Clinica {{ fillHistoryDetail.nombre_mascota }}</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="temperature">Temperatura</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="temperature" class="form-control mt-1"
                                    v-model="fillHistoryDetail.temperatura">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="weight">Peso</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" id="weight" class="form-control mt-1" step="0.25"
                                    v-model="fillHistoryDetail.peso">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="heart_rate">Frecuencia Cardíaca</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" id="heart_rate" class="form-control mt-1" step="0.25"
                                    v-model="fillHistoryDetail.frecuencia_cardiaca">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="breath_rate">Frecuencia Respiratoria</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" id="breath_rate" class="form-control mt-1" step="0.25"
                                    v-model="fillHistoryDetail.frecuencia_respiratoria">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="feed">Alimentación</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="feed" class="form-control mt-1"
                                    v-model="fillHistoryDetail.alimentacion">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="inhabit">Habitad</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="inhabit" class="form-control mt-1"
                                    v-model="fillHistoryDetail.habitad">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="observation">Observación</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="observation" class="form-control mt-1"
                                    v-model="fillHistoryDetail.observacion">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="border-bottom mt-3 mb-3"></div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="name">Nombre Colaborador</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="name" class="form-control mt-1"
                                    v-model="fillHistoryDetail.nombre_colaborador">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="lastname">Apellidos</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="lastname" class="form-control mt-1"
                                    v-model="fillHistoryDetail.apellido">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="position">Cargo</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="position" class="form-control mt-1"
                                    v-model="fillHistoryDetail.cargo">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="specialty">Especialidad</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="specialty" class="form-control mt-1"
                                    v-model="fillHistoryDetail.especialidad">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="select_document">Tipo Documento</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="custom-select mt-1" id="select_document" name="document_type"
                                    v-model="fillHistoryDetail.tipo_documento">
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
                                <input type="number" min="0" id="identification" class="form-control mt-1"
                                    v-model="fillHistoryDetail.documento_identificacion">
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
        props: ['fillHistoryDetail'],
        methods: {
            updatedClinicHistoryDetail: function (id) {
                 /*COLLABORATOR PUT*/
                var urlCollaborator = 'collaborator/' + id;
                axios.put(urlCollaborator, this.fillHistoryDetail).then(response => {
                    console.log('Colaborador Actualizado');

                     /*HISTORY-DETAIL PUT*/
                    var urlHistoryDetail = 'clinic-history-detail/' + this.fillHistoryDetail.id;
                    axios.put(urlHistoryDetail, this.fillHistoryDetail).then(response => {
                        console.log('Detalle Historia Actualizada');
                        this.errors = [];
                        this.$root.$refs.B.getHistoryDetails();
                        $('#edit-history-detail').modal('hide');

                    }).catch(error => {
                        this.errors = error.response.data
                    }); /*HISTORY-DETAIL CLOSE PUT*/

                }).catch(error => {
                    this.errors = error.response.data
                }); /*COLLABORATOR CLOSE PUT*/
            }
        }
    }

</script>
