<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicHistoryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinic_history_details', function (Blueprint $table) {
            $table->id('id');
            $table->string('temperatura');
            $table->decimal('peso', 19, 2);
            $table->decimal('frecuencia_cardiaca', 19, 2);
            $table->decimal('frecuencia_respiratoria', 19, 2);
            $table->timestamp('fecha_hora');
            $table->string('alimentacion');
            $table->string('habitad');
            $table->string('observacion');
            $table->foreignId('colaborador_id')->references('id')->on('collaborators');
            $table->foreignId('historia_clinica_id')->references('id')->on('clinic_histories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinic_history_details');
    }
}
