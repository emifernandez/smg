<?php

namespace App\Http\Controllers\Modalidad;

use App\Modalidad;
use App\Http\Controllers\ApiController;
use App\Http\Requests\Modalidad\StoreModalidadRequest;
use App\Http\Requests\Modalidad\UpdateModalidadRequest;
use Illuminate\Http\Request;

class ModalidadController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modalidades = Modalidad::all();
        return $this->showAll($modalidades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModalidadRequest $request)
    {

        // $request->validate([
        //     'descripcion' => ['string', new Uppercase],
        // ]);

        $data = $request->all();
        $modalidad = Modalidad::create($data);
        return $this->showOne($modalidad, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modalidad  $modalidad
     * @return \Illuminate\Http\Response
     */
    public function show(Modalidad $modalidade)
    {
        return $this->showOne($modalidade);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modalidad  $modalidad
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModalidadRequest $request, Modalidad $modalidade)
    {
        $modalidade->fill($request->all());
        if(!$modalidade->isDirty()){
            return $this->errorResponse('Debe ingresar un valor diferente para actualizar', 422);
        }

        $modalidade->save();
        return $this->showOne($modalidade);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modalidad  $modalidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modalidad $modalidade)
    {
        $modalidade->delete();
        return $this->showOne($modalidade);
    }
}
