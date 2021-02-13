<?php

namespace App\Http\Controllers;

use App\Models\ClinicHistoryDetail;
use App\Models\Collaborator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClinicHistoryDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinic_histories = DB::table('clinic_history_details')->orderBy('id', 'DESC')
            ->join('collaborators', 'clinic_history_details.colaborador_id', '=', 'collaborators.id')
            ->join('clinic_histories', 'clinic_history_details.historia_clinica_id', '=', 'clinic_histories.id')
            ->join('pets', 'clinic_histories.mascota_id', '=', 'pets.id')
            ->join('users', 'pets.usuario_id', '=', 'users.id')
            ->select(
                'clinic_history_details.*',
                'collaborators.nombre as nombre_colaborador',
                'collaborators.apellido as apellido_colaborador',
                'collaborators.cargo',
                'collaborators.especialidad',
                'collaborators.tipo_documento as tipo_documento_colaborador',
                'collaborators.documento_identificacion as identificacion_colaborador',

                'users.nombre as nombre_dueno',
                'users.apellido as apellido_dueno',
                'users.documento_identificacion as identificacion_dueno',
                'pets.nombre as nombre_mascota',
            )
            ->get();

        return $clinic_histories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $last_collaborator = Collaborator::orderBy('id', 'DESC')->first();

        $detail_history = new ClinicHistoryDetail();
        $detail_history->temperatura = $request->temperatura;
        $detail_history->peso = $request->peso;
        $detail_history->frecuencia_cardiaca = $request->frecuencia_cardiaca;
        $detail_history->frecuencia_respiratoria = $request->frecuencia_respiratoria;
        $detail_history->fecha_hora = now();
        $detail_history->alimentacion = $request->alimentacion;
        $detail_history->habitad = $request->habitad;
        $detail_history->observacion = $request->observacion;
        $detail_history->colaborador_id = $last_collaborator->id;
        $detail_history->historia_clinica_id = $request->historia_id;
        $detail_history->save();
        
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clinic_history_detail = ClinicHistoryDetail::findOrFail($id);
        $clinic_history_detail->temperatura = $request->temperatura;
        $clinic_history_detail->peso = $request->peso;
        $clinic_history_detail->frecuencia_cardiaca = $request->frecuencia_cardiaca;
        $clinic_history_detail->frecuencia_respiratoria = $request->frecuencia_respiratoria;
        $clinic_history_detail->alimentacion = $request->alimentacion;
        $clinic_history_detail->habitad = $request->habitad;
        $clinic_history_detail->observacion = $request->observacion;
        $clinic_history_detail->update();

        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clinic_history_detail = ClinicHistoryDetail::findOrFail($id);

        $clinic_history_detail->delete();
    }
}
