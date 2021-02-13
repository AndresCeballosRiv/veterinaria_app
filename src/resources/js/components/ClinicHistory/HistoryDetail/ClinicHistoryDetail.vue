<template>
    <div>
        <div class="container">
            <h1 class="page-header mt-4 mb-4">Listado Detalles Historias Clínicas</h1>
        </div>

        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Dueño</th>
                    <th>Identificación</th>
                    <th>Nombre Mascota</th>
                    <th>Nombre Colaborador</th>
                    <th>Apellidos</th>
                    <th>Identificación</th>
                    <th>Temperatura</th>
                    <th>Peso</th>
                    <th>Frecuencía Cardíaca</th>
                    <th>Frecuencía Respiratoria</th>
                    <th>Alimentación</th>
                    <th>Habitad</th>
                    <th>Observación</th>
                    <th>Fecha Creación</th>
                    <th colspan="2">&nbsp;</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="historyDetail in historyDetails">
                    <td width="10px">{{ historyDetail.id }}</td>
                    <td>{{ historyDetail.nombre_dueno  }} {{ historyDetail.apellido_dueno  }} </td>
                    <td>{{ historyDetail.identificacion_dueno }}</td>
                    <td>{{ historyDetail.nombre_mascota }}</td>
                    <td>{{ historyDetail.nombre_colaborador }}</td>
                    <td>{{ historyDetail.apellido_colaborador }}</td>
                    <td>{{ historyDetail.identificacion_colaborador }}</td>

                    <td>{{ historyDetail.temperatura }}</td>
                    <td>{{ historyDetail.peso }}</td>
                    <td>{{ historyDetail.frecuencia_cardiaca }}</td>
                    <td>{{ historyDetail.frecuencia_respiratoria }}</td>
                    <td>{{ historyDetail.alimentacion }}</td>
                    <td>{{ historyDetail.habitad }}</td>
                    <td>{{ historyDetail.observacion }}</td>

                    <td>{{ historyDetail.fecha_hora }}</td>
                    <td width="10px">
                        <a href="#" class="btn btn-warning btn-md"
                            v-on:click.prevent="editHistoryDetail(historyDetail)">Editar</a>
                    </td>
                    <td width="10px">
                        <a href="#" class="btn btn-danger btn-md"
                            v-on:click.prevent="deleteHistoryDetail(historyDetail)">Eliminar</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <editclinichistorydetail :fill-history-detail="fillHistoryDetail"></editclinichistorydetail>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                historyDetails: [],
                fillHistoryDetail: {
                    'id': 0,
                    'temperatura': '',
                    'peso': 0,
                    'frecuencia_cardiaca': 0,
                    'frecuencia_respiratoria': 0,
                    'alimentacion': '',
                    'habitad': '',
                    'observacion': '',

                    'colaborador_id': 0,
                    'nombre_colaborador': '',
                    'apellido': '',
                    'cargo': '',
                    'especialidad': '',
                    'tipo_documento': '',
                    'documento_identificacion': 0,
                }
            }
        },
        created: function () {
            this.getHistoryDetails();
            this.$root.$refs.B = this;

            for (var variableKey in this.fillHistoryDetail) {
                if (this.fillHistoryDetail.hasOwnProperty(variableKey)) {
                    this.fillHistoryDetail[variableKey] = '';
                }
            }

            /*         this.fillHistoryDetail = {
                        'id': 0,
                        'temperatura': '',
                        'peso': 0,
                        'frecuencia_cardiaca': 0,
                        'frecuencia_respiratoria': 0,
                        'alimentacion': '',
                        'habitad': '',
                        'observacion': '',

                        'colaborador_id': 0,
                        'nombre_colaborador': '',
                        'apellido': '',
                        'cargo': '',
                        'especialidad': '',
                        'tipo_documento': '',
                        'documento_identificacion': 0,

                        'nombre_mascota': ''
                    } */
        },

        methods: {
            getHistoryDetails: function () {
                var urlHistoryDetails = 'api/clinic-history-detail';
                axios.get(urlHistoryDetails).then(response => {
                    this.historyDetails = response.data;
                });
            },
            editHistoryDetail: function (historyDetail) {
                this.fillHistoryDetail.id = historyDetail.id;
                this.fillHistoryDetail.temperatura = historyDetail.temperatura;
                this.fillHistoryDetail.peso = historyDetail.peso;
                this.fillHistoryDetail.frecuencia_cardiaca = historyDetail.frecuencia_cardiaca;
                this.fillHistoryDetail.frecuencia_respiratoria = historyDetail.frecuencia_respiratoria;
                this.fillHistoryDetail.alimentacion = historyDetail.alimentacion;
                this.fillHistoryDetail.habitad = historyDetail.habitad;
                this.fillHistoryDetail.observacion = historyDetail.observacion;
                this.fillHistoryDetail.colaborador_id = historyDetail.colaborador_id;
                this.fillHistoryDetail.nombre_colaborador = historyDetail.nombre_colaborador;
                this.fillHistoryDetail.apellido = historyDetail.apellido_colaborador;
                this.fillHistoryDetail.cargo = historyDetail.cargo;
                this.fillHistoryDetail.especialidad = historyDetail.especialidad;
                this.fillHistoryDetail.tipo_documento = historyDetail.tipo_documento_colaborador;
                this.fillHistoryDetail.documento_identificacion = historyDetail.identificacion_colaborador;
                this.fillHistoryDetail.nombre_mascota = historyDetail.nombre_mascota;

                $('#edit-history-detail').modal('show');
            },
            deleteHistoryDetail: function (historyDetail) {
                /*HISTORY-DETAIL DELETE*/
                var urlHistoryDetails = 'clinic-history-detail/' + historyDetail.id;
                axios.delete(urlHistoryDetails).then(response => {
                    console.log('Detalle Historia Eliminado');

                    /*COLLABORATOR DELETE*/
                    var urlCollaborator = 'collaborator/' + historyDetail.colaborador_id
                    axios.delete(urlCollaborator).then(response => {
                        console.log('Colaborador Eliminado');

                        this.getHistoryDetails();
                        /*toastr.success('Eliminado correctamente'); */
                    }); /*COLLABORATOR CLOSE DELETE*/
                }); /*HISTORY-DETAIL CLOSE DELETE*/
            }
        }
    }

</script>
