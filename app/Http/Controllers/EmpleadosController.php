<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class EmpleadosController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        //$this->middleware('admin');
    }

    public function index(Request $request)
    {   //Query Scopes para filtar lor registros por rol que se encunetrar declarados en User.php
        //$matricula = $request->get('matricula');
        $empleados = User::matricula($request->get('matricula'))->orderBy('id','DESC')
            ->Empleados()->get();
        return view('empleados.index', compact('empleados'));
    }

    public function store(Request $request)
    {
        //
    }


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
        $empleado = User::empleados()->findOrFail($id);
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //funcion para Editar usuarios
    public function update(Request $request, $id)
    {
        //Obtener los datos como un objeto por medio  del id del usuario
        $user = User::empleados()->findOrFail($id);
        //almacenar en la variable data el objeto request en forma de arreglo, que a su vez esta tomando atravez de la funcion only, solo los datos del inputs del formulario.                       
        $data = $request->only('name','a_paterno','a_materno','email','matricula','rol');
        //almacenando en la variable password solo el valor del input de la contraseña (ya que es un valor opcional).
        $password = $request->input('password');
        //si se ingreso un nueva contraseña para actualizarla
        if ($password) {
        //se va a anexar a al arreglo el dato de la contraseña y se va a encriptar 
            $data['password'] = bcrypt($password);
        }
        //cargar el arreglo a la consulta de actialización
        $user->fill($data);
        $user->save();  // Ejecutar consulta de Actualizacion
        return redirect('/empleados'); //Regresar a la vista anterior
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = User::empleados()->findOrFail($id);
        $empleado->delete();
        return redirect('/empleados'); //Regresar a la vista anterior
    }
}