<?php

namespace App\Http\Controllers\Region;

use App\Http\Controllers\ApiController;
use App\Pais;
use App\Region;
use Illuminate\Http\Request;

class RegionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regiones = Region::all();
        $regiones->each(function($region)
        {
            $region->pais_id = Pais::find($region->pais_id);
        });
        return $this->showAll($regiones);
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
        $region = Region::create($data);
        return $this->showOne($region, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        $region->pais_id = Pais::find($region->pais_id);

        return $this->showOne($region);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $region)
    {
        $region->fill($request->all());
        if(!$region->isDirty()){
            return $this->errorResponse('Debe ingresar un valor diferente para actualizar', 400);
        }

        $region->save();
        return $this->showOne($region);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        $region->delete();
        $this->showOne($region);
    }
}
