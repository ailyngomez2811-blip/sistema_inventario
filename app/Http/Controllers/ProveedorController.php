<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('admin.proveedores.listaproveedores', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.proveedores.formproveedor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'       => 'required|string|max:255',
            'nit_documento'=> 'nullable|string|max:50|unique:proveedores',
            'telefono'     => 'nullable|string|max:20',
            'email'        => 'nullable|email|max:255',
            'direccion'    => 'nullable|string|max:255',
            'contacto'     => 'nullable|string|max:255',
        ]);

        Proveedor::create([
            'nombre'        => $request->nombre,
            'nit_documento' => $request->nit_documento,
            'telefono'      => $request->telefono,
            'email'         => $request->email,
            'direccion'     => $request->direccion,
            'contacto'      => $request->contacto,
            'estado'        => 'activo',
        ]);

        return redirect()
            ->route('proveedores.index')
            ->with('success', '¡Proveedor registrado exitosamente!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return response()->json($proveedor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $proveedor = Proveedor::findOrFail($id);

        $request->validate([
            'nombre'       => 'required|string|max:255',
            'nit_documento'=> 'nullable|string|max:50|unique:proveedores,nit_documento,' . $id,
            'telefono'     => 'nullable|string|max:20',
            'email'        => 'nullable|email|max:255',
            'direccion'    => 'nullable|string|max:255',
            'contacto'     => 'nullable|string|max:255',
        ]);

        $proveedor->update([
            'nombre'        => $request->nombre,
            'nit_documento' => $request->nit_documento,
            'telefono'      => $request->telefono,
            'email'         => $request->email,
            'direccion'     => $request->direccion,
            'contacto'      => $request->contacto,
        ]);

        return redirect()
            ->route('proveedores.index')
            ->with('success', '¡Proveedor actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        return redirect()
            ->route('proveedores.index')
            ->with('success', 'Proveedor eliminado correctamente.');
    }

    /**
     * Toggle the estado (activo/inactivo) of a proveedor.
     */
    public function toggleEstado(string $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->estado = $proveedor->estado === 'activo' ? 'inactivo' : 'activo';
        $proveedor->save();

        return redirect()
            ->route('proveedores.index')
            ->with('success', 'Estado del proveedor actualizado.');
    }
}
