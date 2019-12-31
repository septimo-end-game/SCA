<?php

namespace App\Http\Controllers;
use \App\Http\Middleware\AdminMiddleware as Middleware;
use Illuminate\Http\Request;
use App\User;

class AdminControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }
    //Funcion para mostrar la vista donde esta la lista de los datos
    public function index(){
        //Filtar los datos para que solo se obtengan los usuarios administradores
        $admins = User::Administradores()->get();
        //Mostrar la vista con los datos cargados y filtrados 
        return view('admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        //return view('admins.index_c');
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
    //Funcion para mostrar el formulario de edicion y cargarle los datos de acuerto al id 
    public function edit($id)
    {//Obtener los datos como un objeto por medio  del id del usuario para mostrarlos en el formulario de edicion
        $admin = User::Administradores()->findOrFail($id);
    //cargarle los datos del usuario a la vista con el formulario 
        return view('admins.edit', compact('admin'));
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
        $user = User::Administradores()->findOrFail($id);
        //almacenar en la variable data el objeto request en forma de arreglo, que a su vez esta tomando atravez de la funcion only, solo los datos del inputs del formulario.

        $data = $request->only('name','a_paterno','a_materno','email','matricula','rol');

        //almacenando en la variable password solo el valor del input de la contraseña (ya que es un valor opcional).
        $password = $request->input('password');
        //$a_paterno = $request->input('a_paterno');
        //$a_materno = $request->input('a_materno');
        //si se ingreso un nueva contraseña para actualizarla
        if ($password) {
        //se va a anexar a al arreglo el dato de la contraseña y se va a encriptar 
            $data['password'] = bcrypt($password);
        }
        //$data['a_paterno'] = $a_paterno;
        //$data['a_materno'] = $a_materno;

        //cargar el arreglo a la consulta de actialización
        $user->fill($data);
        
        $user->save();  // Ejecutar consulta de Actualizacion

        return redirect('/admins'); //Regresar a la vista anterior
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Funcion para eliminar a el usuario
    public function destroy($id)
    {
        $admin = User::Administradores()->findOrFail($id);
        $admin->delete();
        return redirect('/admins'); //Regresar a la vista anterior
    }
}
