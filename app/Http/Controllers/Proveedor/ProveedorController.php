<?php

namespace App\Http\Controllers\Proveedor;

use App\Http\Controllers\ApiController;
use App\Proveedor;
use Illuminate\Http\Request;
use App\Http\Requests\Proveedor\StoreProveedorRequest;
use App\Http\Requests\Proveedor\UpdateProveedorRequest;


class ProveedorController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return $this->showAll($proveedores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProveedorRequest $request)
    {
        $data = $request->all();
        $proveedor = Proveedor::create($data);

        return $this->showOne($proveedor, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedore)
    {
        return $this->showOne($proveedore);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProveedorRequest $request, Proveedor $proveedore)
    {
        $proveedore->fill($request->all());
        if(!$proveedore->isDirty()) {
            return $this->errorResponse('Debe introducir un valor diferente para actualizar', 422);
        }

        $proveedore->save();
        return $this->showOne($proveedore);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedore)
    {
        $proveedore->delete();
        $this->showOne($proveedore);
    }
}
