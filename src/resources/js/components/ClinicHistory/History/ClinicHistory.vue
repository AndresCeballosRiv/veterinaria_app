<template>
    <div>
        <div class="container">
            <h1 class="page-header mt-4 mb-4">Listado Historias Clínicas</h1>

            <div class="mb-4">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#create-history">
                    Crear Nueva Historia Clínica
                </a>
            </div>
        </div>

        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Dueño</th>
                    <th>Apellido</th>
                    <th>Tipo Documento</th>
                    <th>Identificación</th>
                    <th>Estado</th>
                    <th>Genero</th>
                    <th>Nombre Mascota</th>
                    <th>Raza</th>
                    <th>Sexo</th>
                    <th>Fecha Creación</th>
                    <th colspan="2">&nbsp;</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="history in histories">
                    <td width="10px">{{ history.id }}</td>
                    <td>{{ history.nombre_dueno }}</td>
                    <td>{{ history.apellido }}</td>
                    <td>{{ history.tipo_documento }}</td>
                    <td>{{ history.documento_identificacion }}</td>
                    <td>{{ history.estado }}</td>
                    <td>{{ history.genero }}</td>
                    <td>{{ history.nombre_mascota }}</td>
                    <td>{{ history.raza }}</td>
                    <td>{{ history.sexo }}</td>
                    <td>{{ history.fecha_creacion }}</td>
                    <td width="10px">
                        <a href="#" class="btn btn-primary btn-md" v-on:click.prevent="createHistoryDetail(history)">
                            Crear&nbsp;Det.
                        </a>
                    </td>
                    <td width="10px">
                        <a href="#" class="btn btn-warning btn-md" v-on:click.prevent="editHistory(history)">Editar</a>
                    </td>
                    <td width="10px">
                        <a href="#" class="btn btn-danger btn-md"
                            v-on:click.prevent="deleteHistory(history)">Eliminar</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <createclinichistory />
        <editclinichistory :fill-history="fillHistory"></editclinichistory>
        <createclinichistorydetail :fill-history="fillHistory" />

    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                histories: [],
                fillHistory: {
                    'id': '',
                    'nombre_dueno': '',
                    'apellido': '',
                    'tipo_documento': '',
                    'documento_identificacion': '',
                    'estado': '',
                    'genero': '',
                    'nombre_mascota': '',
                    'raza': '',
                    'sexo': '',
                    'fecha_creacion': '',
                },
            }
        },
        created: function () {
            this.getHistories();
            this.$root.$refs.A = this;

            for (var variableKey in this.fillHistory) {
                if (this.fillHistory.hasOwnProperty(variableKey)) {
                    this.fillHistory[variableKey] = '';
                }
            }

            /*             this.fillHistory = {
                            'id': '',
                            'id_dueno': '',
                            'nombre_dueno': '',
                            'apellido': '',
                            'tipo_documento': '',
                            'documento_identificacion': '',
                            'estado': '',
                            'genero': '',
                            'id_mascota': '',
                            'nombre_mascota': '',
                            'raza': '',
                            'sexo': '',
                            'fecha_creacion': '',
                        }; */
        },
        methods: {
            getHistories: function () {
                var urlHistories = 'api/clinic-history';
                axios.get(urlHistories).then(response => {
                    this.histories = response.data;
                });
            },
            createHistoryDetail: function (history) {
                this.fillHistory.id = history.id;
                $('#create-detail-history').modal('show');
            },
            editHistory: function (history) {
                this.fillHistory.id = history.id;
                this.fillHistory.id_dueno = history.id_dueno;
                this.fillHistory.nombre_dueno = history.nombre_dueno,
                    this.fillHistory.apellido = history.apellido,
                    this.fillHistory.tipo_documento = history.tipo_documento,
                    this.fillHistory.documento_identificacion = history.documento_identificacion,
                    this.fillHistory.estado = history.estado,
                    this.fillHistory.genero = history.genero,
                    this.fillHistory.id_mascota = history.id_mascota;
                this.fillHistory.nombre_mascota = history.nombre_mascota,
                    this.fillHistory.raza = history.raza,
                    this.fillHistory.sexo = history.sexo,
                    this.fillHistory.fecha_creacion = history.fecha_creacion

                $('#edit-history').modal('show');
            },
            deleteHistory: function (history) {
                /*HISTORY DELETE*/
                var urlHistory = 'clinic-history/' + history.id;
                axios.delete(urlHistory).then(response => {
                    console.log('Historia Eliminada');

                    /*PET DELETE*/
                    var urlPet = 'pet/' + history.id_mascota
                    axios.delete(urlPet).then(response => {
                        console.log('Mascota Eliminada');

                        /*USER DELETE*/
                        var urlUser = 'user/' + history.id_dueno
                        axios.delete(urlUser).then(response => {
                            console.log('Usuario Eliminado');

                            this.getHistories();
                            /*toastr.success('Eliminado correctamente'); */
                        }); /*USER CIERRE DELETE*/
                    }); /*PET CIERRE DELETE*/
                }); /*HISTORY CIERRE DELETE*/
            }
        }
    }

</script>
