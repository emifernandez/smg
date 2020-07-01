<?php

namespace App\Http\Controllers\Rol;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Rol\CreateRolRequest;
use App\Http\Requests\Rol\UpdateRolRequest;
use App\Rol;
use Illuminate\Http\Request;

class RolController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Rol::all();
        return $this->showAll($roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRolRequest $request)
    {
        $data = $request->all();
        $rol = Rol::create($data);
        return $this->showOne($rol, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $role)
    {
        return $this->showOne($role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolRequest $request, Rol $role)
    {
        $data = $request->all();
        $role->update($data);
        return $this->showOne($role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rol $role)
    {
        $role->delete();
        $this->showOne($role);
    }
}
