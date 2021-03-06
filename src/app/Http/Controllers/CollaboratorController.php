<?php

namespace App\Http\Controllers;

use App\Models\Collaborator;
use Illuminate\Http\Request;

class CollaboratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $collaborator = new Collaborator();
        $collaborator->nombre = $request->nombre;
        $collaborator->apellido = $request->apellido;
        $collaborator->cargo = $request->cargo;
        $collaborator->especialidad = $request->especialidad;
        $collaborator->tipo_documento = $request->tipo_documento;
        $collaborator->documento_identificacion = $request->documento_identificacion;
        $collaborator->save();

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
        $collaborator = Collaborator::findOrFail($id);
        $collaborator->nombre = $request->nombre_colaborador;
        $collaborator->apellido = $request->apellido;
        $collaborator->cargo = $request->cargo;
        $collaborator->especialidad = $request->especialidad;
        $collaborator->tipo_documento = $request->tipo_documento;
        $collaborator->documento_identificacion = $request->documento_identificacion;
        $collaborator->update();

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
        $collaborator = Collaborator::findOrFail($id);

        $collaborator->delete();
    }
}
