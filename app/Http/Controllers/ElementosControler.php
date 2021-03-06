<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ElementosControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //middleware para comprobar que un usuario tenga session iniciada
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function index()
    {
        $users = User::elementos()->get();
        return view('elementos.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('createuser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        
        $elemento = User::elementos()->findOrFail($id);
        return view('elementos.edit', compact('elemento'));
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
        $user = User::elementos()->findOrFail($id);
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
        return redirect('/elementos'); //Regresar a la vista anterior
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $elemento = User::elementos()->findOrFail($id);
        $elemento->delete();
        return redirect('/elementos'); //Regresar a la vista anterior
    }
}
