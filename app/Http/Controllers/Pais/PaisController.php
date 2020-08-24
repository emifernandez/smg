<?php

namespace App\Http\Controllers\Pais;

use App\Pais;
use App\Http\Controllers\ApiController;
use App\Request\Pais\StorePaisRequest;
use App\Request\Pais\UpdatePaisRequest;
use Illuminate\Http\Request;

class PaisController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paises = Pais::all();
        return $this->showAll($paises);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $pais = Pais::create($data);
        return $this->showOne($pais, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function show(Pais $pais)
    {
        return $this->showOne($pais);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pais $pais)
    {
        $pais->fill($request->all());
        if(!$pais->isDirty()){
            return $this->errorResponse('Debe ingresar un valor diferente para actualizar', 422);
        }

        $pais->save();
        return $this->showOne($pais);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pais $pais)
    {
        $pais->delete();
        return $this->showOne($pais);
        
    }
}
