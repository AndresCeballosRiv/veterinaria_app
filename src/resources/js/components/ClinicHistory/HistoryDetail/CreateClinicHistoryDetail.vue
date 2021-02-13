<template>
    <form method="POST" v-on:submit.prevent="createClinicHistoryDetail">
        <div class="modal fade" id="create-detail-history">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Crear Detalle Historia Clinica {{ fillHistory.id }}</h4>
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
                                <input type="text" id="temperature" class="form-control mt-1" v-model="newTemperature">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="weight">Peso</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" id="weight" class="form-control mt-1" step="0.25"
                                    v-model="newWeight">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="heart_rate">Frecuencia Cardíaca</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" id="heart_rate" class="form-control mt-1" step="0.25"
                                    v-model="newHearRate">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="breath_rate">Frecuencia Respiratoria</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" id="breath_rate" class="form-control mt-1" step="0.25"
                                    v-model="newBreathRate">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="feed">Alimentación</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="feed" class="form-control mt-1" v-model="newFeed">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="inhabit">Habitad</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="inhabit" class="form-control mt-1" v-model="newInhabit">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="observation">Observación</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="observation" class="form-control mt-1" v-model="newObservation">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="border-bottom mt-3 mb-3"></div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="name">Nombre Colaborador</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="name" class="form-control mt-1" v-model="newName">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="lastname">Apellidos</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="lastname" class="form-control mt-1" v-model="newLastName">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="position">Cargo</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="position" class="form-control mt-1" v-model="newPosition">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="specialty">Especialidad</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="specialty" class="form-control mt-1" v-model="newSpecialty">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-sm-4 mt-1">
                                <label for="select_document">Tipo Documento</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="custom-select mt-1" id="select_document" name="document_type"
                                    v-model="newDocumentType">
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
                                    v-model="newIdentification">
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Guardar">
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
                detailHistories: [],
                newTemperature: '',
                newWeight: '',
                newHearRate: '',
                newBreathRate: '',
                newFeed: '',
                newInhabit: '',
                newObservation: '',
                newName: '',
                newLastName: '',
                newPosition: '',
                newSpecialty: '',
                newDocumentType: '',
                newIdentification: 0,
                newHistoryId: 0,

                errors: [],
            }
        },
        props: ['fillHistory'],
        methods: {
            createClinicHistoryDetail: function () {
                /*COLLABORATOR POST*/
                var url = 'collaborator';
                axios.post(url, {
                    nombre: this.newName,
                    apellido: this.newLastName,
                    cargo: this.newPosition,
                    especialidad: this.newSpecialty,
                    tipo_documento: this.newDocumentType,
                    documento_identificacion: this.newIdentification,
                }).then(response => {
                    console.log('Colaborador Creado');

                    /*HISTORY-DETAIL POST*/
                    var url = 'clinic-history-detail';
                    axios.post(url, {
                        temperatura: this.newTemperature,
                        peso: this.newWeight,
                        frecuencia_cardiaca: this.newHearRate,
                        frecuencia_respiratoria: this.newBreathRate,
                        alimentacion: this.newFeed,
                        habitad: this.newInhabit,
                        observacion: this.newObservation,
                        historia_id: this.fillHistory.id,
                    }).then(response => {
                        console.log('Detalle Historia Creada');

                        this.newTemperature = '',
                            this.newWeight = '',
                            this.newHearRate = '',
                            this.newBreathRate = '',
                            this.newFeed = '',
                            this.newInhabit = '',
                            this.newObservation = '',

                            this.newName = '',
                            this.newLastName = '',
                            this.newPosition = '',
                            this.newSpecialty = '',
                            this.newDocumentType = '',
                            this.newIdentification = 0,
                            this.newHistoryId = 0,

                            this.errors = [];
                        $('#create-detail-history').modal('hide');
                    }).catch(error => {
                        this.errors = error.response.data
                    }); /*HISTORY-DETAIL CLOSE POST*/

                }).catch(error => {
                    this.errors = error.response.data
                }); /*COLLABORATOR CLOSE POST*/


            },
        }
    }

</script>
