<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePedidoProductoRequest;
use App\Models\Pedido;
use App\Models\PedidoProducto;
use App\Models\Producto;
use Illuminate\Http\Request;

class PedidoProductoController extends Controller
{
    public function create(Pedido $pedido)
    {
        $productos = Producto::all();
        return view('pedidoProducto.create', compact('productos', 'pedido'));
    }

    public function store(StorePedidoProductoRequest $storePedidoProductoRequest)
    {

        $pedidoProducto = PedidoProducto::where('pedido_id', $storePedidoProductoRequest->pedido_id)->where('producto_id', $storePedidoProductoRequest->producto_id)->first();

        if ($pedidoProducto) {
            $pedidoProducto->cantidad += $storePedidoProductoRequest->cantidad;
            $pedidoProducto->save();
        } else {
            $pedidoProducto = PedidoProducto::create($storePedidoProductoRequest->all());
        }
        return redirect()->route('pedidos.edit', $pedidoProducto->pedido_id)
            ->withSuccess('El producto se ha agregado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PedidoProducto $pedidoProducto)
    {
        $pedidoId = $pedidoProducto->pedido_id;

        $pedidoProducto->delete();

        $pedido = Pedido::find($pedidoId);

        if (!$pedido->productos()->count()) {
            $pedido->delete();
            return redirect()->route('pedidos.index', $pedidoId)
                ->withSuccess('El pedido se ha borrado correctamente');
        } else {
            return redirect()->route('pedidos.edit', $pedidoId)
                ->withSuccess('El producto se ha borrado correctamente');
        }
    }
}
