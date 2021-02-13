<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pet;
use App\Models\ClinicHistory;

class ClinicHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinic_histories = DB::table('clinic_histories')
            ->join('pets', 'clinic_histories.mascota_id', '=', 'pets.id')
            ->join('users', 'pets.usuario_id', '=', 'users.id')
            ->select(
                'clinic_histories.*',
                'users.id as id_dueno',
                'users.nombre as nombre_dueno',
                'users.apellido',
                'users.tipo_documento',
                'users.documento_identificacion',
                'users.estado',
                'users.sexo as genero',
                'pets.id as id_mascota',
                'pets.nombre as nombre_mascota',
                'pets.raza',
                'pets.sexo'
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
        $last_pet = Pet::orderBy('id', 'DESC')->first();

        $clinic_history = new ClinicHistory();
        $clinic_history->mascota_id = $last_pet->id;
        $clinic_history->fecha_creacion = now();
        $clinic_history->save();

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clinic_history = ClinicHistory::findOrFail($id);

        $clinic_history->delete();
    }
}
