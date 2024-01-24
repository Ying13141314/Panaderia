@extends('layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header d-flex justify-content-between">Listado de productos del pedido #{{$pedido->id}} <a class="btn btn-warning btn-sm" href="{{route('pedidos.index')}}">Ver listado de pedido</a></div>
            <div class="card-body">
                <a href="{{ route('pedidoProducto.create', $pedido->id) }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Agregar Producto</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Identificador</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($productos as $producto)
                        <tr>
                            <th scope="row">{{ $producto->id }}</th>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->pivot->cantidad }}</td>
                            <td>{{ $producto->precio }}€</td>
                            <td>
                                <form action="{{ route('pedidoProducto.destroy', $producto->pivot->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Seguro lo quieres eliminar?');"><i class="bi bi-trash"></i> Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No hay producto!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $productos->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection
