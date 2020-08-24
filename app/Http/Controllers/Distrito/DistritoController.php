<?php

namespace App\Http\Controllers\Distrito;

use App\Distrito;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Region;

class DistritoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distritos = Distrito::all();
        $distritos->each(function($distrito){
            $distrito->region_id = Region::find($distrito->region_id);
        });
        return $this->showAll($distritos);
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
        $distrito = Distrito::create($data);
        return $this->showOne($distrito, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Distrito  $distrito
     * @return \Illuminate\Http\Response
     */
    public function show( $id, $region_id)
    {
        $distrito = Distrito::where('id', $id)
                            ->where('region_id', $region_id)
                            ->firstOrFail();
        $distrito->region_id = Region::select('nombre','pais_id')->where('id', $distrito->region_id)->get();
        //$distrito->region_id = Region::where('id', $distrito->region_id)->get(['nombre','pais_id']);
        //$distrito->region_id->pais_id = Pais::select('nombre')->where('id', $distrito->region_id->pais_id)->get();

        // $distrito->region_id = Region::find($distrito->region_id);
        return $this->showOne($distrito);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Distrito  $distrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $region_id)
    {
        $distrito = Distrito::where('id', $id)
                            ->where('region_id', $region_id)
                            ->firstOrFail();

        $distrito->fill($request->all());
        if(!$distrito->isDirty()){
            return $this->errorResponse('Debe ingresar valores distintos para actualizar', 400);
        }

        //$distrito->save();
        Distrito::where('id', $id)
                ->where('region_id', $region_id)
                ->update(['superficie_km2' => $request->superficie_km2]);

        return $this->showOne($distrito);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Distrito  $distrito
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $region_id)
    {
        $distrito = Distrito::where('id', $id)
                            ->where('region_id', $region_id)
                            ->firstOrFail();
                            
        Distrito::where('id', $id)->where('region_id', $region_id)->delete();
        //$distrito->delete();
        return $this->showOne($distrito);
    }
}
