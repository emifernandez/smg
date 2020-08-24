<?php

namespace App\Http\Controllers\ListaPrecioModalidad;


use App\Http\Requests\ListaPrecioModalidad\StoreListaPrecioModalidadRequest;
use App\Http\Requests\ListaPrecioModalidad\UpdateListaPrecioModalidadRequest;

use App\Http\Controllers\ApiController;
use App\ListaPrecioModalidad;
use App\Modalidad;

class ListaPrecioModalidadController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaPreciosModalidades = ListaPrecioModalidad::all();
        $listaPreciosModalidades->each(function($listaPrecioModalidad){
            $listaPrecioModalidad->modalidad_id = Modalidad::find($listaPrecioModalidad->modalidad_id);
        });
        return $this->showAll($listaPreciosModalidades);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreListaPrecioModalidadRequest $request)
    {
        $data = $request->all();
        $ListaPrecioModalidad = ListaPrecioModalidad::create($data);
        return $this->showOne($ListaPrecioModalidad, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ListaPrecioModalidade  $listaPrecioModalidade
     * @return \Illuminate\Http\Response
     */
    public function show($modalidad_id, $tiempo_id)
    {
        $listaPrecioModalidad = ListaPrecioModalidad::where('tiempo_id', $tiempo_id)
                            ->where('modalidad_id', $modalidad_id)
                            ->firstOrFail();
        $listaPrecioModalidad->modalidad_id = Modalidad::select('descripcion')->where('tiempo_id', $listaPrecioModalidad->modalidad_id)->get();
        
        return $this->showOne($listaPrecioModalidad);
        //return $this->showOne($listaPreciosModalidad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ListaPrecioModalidade  $listaPrecioModalidade
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateListaPrecioModalidadRequest $request, $modalidad_id, $tiempo_id)
    {
        //return $input = $request->only('precio');
        $listaPrecioModalidad = ListaPrecioModalidad::where('tiempo_id', $tiempo_id)
                            ->where('modalidad_id', $modalidad_id)
                            ->firstOrFail();

        $listaPrecioModalidad->fill($request->all());
        if(!$listaPrecioModalidad->isDirty()){
            return $this->errorResponse('Debe ingresar valores distintos para actualizar', 400);
        }

        ListaPrecioModalidad::where('tiempo_id', $tiempo_id)
                ->where('modalidad_id', $modalidad_id)
                ->update(['precio' => $request->precio]);

        return $this->showOne($listaPrecioModalidad);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ListaPrecioModalidade  $listaPrecioModalidade
     * @return \Illuminate\Http\Response
     */
    public function destroy($modalidad_id, $tiempo_id)
    {
        $listaPrecioModalidad = ListaPrecioModalidad::where('tiempo_id', $tiempo_id)
                            ->where('modalidad_id', $modalidad_id)
                            ->firstOrFail();
                            
        ListaPrecioModalidad::where('tiempo_id', $tiempo_id)->where('modalidad_id', $modalidad_id)->delete();
        return $this->showOne($listaPrecioModalidad);
    }
}
