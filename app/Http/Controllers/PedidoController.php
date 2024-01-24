<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use App\Models\PedidoProducto;
use App\Models\Producto;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resultados =  Pedido::with('productos')->paginate(10);

        return view('pedidos.index', compact('resultados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = Producto::all();
        return view('pedidos.create', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePedidoRequest $request)
    {
        $pedido = Pedido::create();
        $pedido->productos()->attach($request->input('producto'), ['cantidad' => $request->input('cantidad')]);

        return  redirect()->route('pedidos.index')->with('success', 'Pedido creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        $productos = $pedido->productos()->paginate(10);

        return view('pedidos.edit', compact('productos', 'pedido'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Pedido $pedido)
    {
        // Sin uso
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidos.index')
            ->withSuccess('El pedido se ha borrado correctamente');
    }
}
