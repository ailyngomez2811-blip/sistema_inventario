<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::with('role')->get();
        return view('admin.usuarios.listausuarios', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.usuarios.formusuario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = new User();

        $usuario->role_id = $request->post('role_id');
        $usuario->name = $request->post('name');
        $usuario->email = $request->post('email');
        $usuario->password = Hash::make($request->post('password'));
        $usuario->telefono = $request->post('telefono');
        $usuario->direccion = $request->post('direccion');
        $usuario->estado = 'activo';

        // Si el administrador autenticado es quien crea el usuario
        $usuario->created_by = Auth::id();

        $usuario->save();

        return redirect()
            ->route('usuarios.create')
            ->with('success', '¡Registro exitoso!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = User::findOrFail($id);
        return response()->json($usuario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuario = User::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:users,email,' . $id,
            'role_id'  => 'required|integer',
            'telefono' => 'nullable|string|max:20',
            'direccion'=> 'nullable|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->role_id = $request->role_id;
        $usuario->telefono = $request->telefono;
        $usuario->direccion = $request->direccion;

        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }

        $usuario->save();

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = User::findOrFail($id);
        
        // Evitar que el usuario logueado se elimine a sí mismo
        if ($usuario->id === Auth::id()) {
            return redirect()->route('usuarios.index')
                ->with('error', 'No puedes eliminar tu propia cuenta.');
        }

        $usuario->delete();

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario eliminado correctamente.');
    }

    /**
     * Toggle the estado (activo/inactivo) of a user.
     */
    public function toggleEstado(string $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->estado = $usuario->estado === 'activo' ? 'inactivo' : 'activo';
        $usuario->save();

        return redirect()->route('usuarios.index')
            ->with('success', 'Estado del usuario actualizado.');
    }
}
