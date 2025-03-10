<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class UsersController extends Controller
{
    public function __construct(Type $var = null) {
        $this->var = $var;
        $this->consulta = 'http://localhost:3000/api/task/';
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function crear(){
        return view('Users.crearUsuario');
    }

    public function ver(){

        $Usuarios = User::all();
        // dd($Usuarios);
        return view('Users.verUsuario', compact('Usuarios'));
    }

    public function actualizar(Request $request, $id){

        $actualizar = User::findOrFail($id);
        return view('Users.actualizarUsuario', compact('actualizar'));
    }

    public function eliminar(Request $request, $id){

        $eliminar = User::findOrFail($id);

        return view('Users.eliminarUsuario', compact('eliminar'));
    }


    public function crearNuevoUsuario(Request $request)
    {
        // Validación con nombres correctos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Encripta la contraseña

        $user->save();

        return redirect()->back()->with("success", "Usuario creado con éxito!");
    }

    public function guardarActualizacion(Request $request, $id)
    {

        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|min:6'
        ]);

        // Buscar usuario por ID
        $usuario = User::findOrFail($id);

        // Actualizar datos
        $usuario->name = $request->name;
        $usuario->email = $request->email;

        // Si se ingresó una nueva contraseña, actualizarla
        if ($request->filled('password')) {
            $usuario->password = bcrypt($request->password);
        }

        // Guardar cambios en la base de datos
        $usuario->save();

        // Redireccionar con mensaje de éxito
        return redirect()->route('Users.verUsuario')->with('success', 'Usuario actualizado correctamente.');
    }

    public function eliminarUsuarioSQL($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('Users.verUsuario')->with('success', 'Usuario eliminado correctamente.');
    }

    public function validarUsuario(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:6'
        ]);

        // Buscar el usuario por email
        $usuario = User::where('email', $request->email)->first();

        // Si el usuario no existe, mostrar mensaje específico
        if (!$usuario) {
            return back()->withErrors(['email' => 'No existe una cuenta con este correo.'])->withInput();
        }

        // Verificar la contraseña
        if (!Hash::check($request->password, $usuario->password)) {
            return back()->withErrors(['password' => 'La contraseña ingresada es incorrecta.'])->withInput();
        }

        // Iniciar sesión manualmente
        Auth::login($usuario);

        // Redirigir al usuario a su dashboard o página principal
        return redirect()->route('dashboard')->with('success', 'Inicio de sesión exitoso');
    }
}
