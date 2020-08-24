<?php

namespace App\Http\Controllers\Barrio;

use App\Barrio;
use App\Http\Controllers\ApiController;
use App\Http\Requests\Barrio\StoreBarrioRequest;
use App\Http\Requests\Barrio\UpdateBarrioRequest;
//use Illuminate\Http\Request;

class BarrioController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barrios = Barrio::all();
        return $this->showAll($barrios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBarrioRequest $request)
    {
        $data = $request->all();
        $barrio = Barrio::create($data);
        return $this->showOne($barrio);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barrio  $barrio
     * @return \Illuminate\Http\Response
     */
    public function show(Barrio $barrio)
    {
        return $this->showOne($barrio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barrio  $barrio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBarrioRequest $request, Barrio $barrio)
    {
        $barrio->fill($request->all());
        if(!$barrio->isDirty()){
            return $this->errorResponse('Debe ingresar un valor diferente para poder actualizar', 400);

        }
        $barrio->save();
        return $this->showOne($barrio);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barrio  $barrio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barrio $barrio)
    {
        $barrio->delete();
        return $this->showOne($barrio);
    }
}
