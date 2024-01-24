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
            <div class="card-header d-flex justify-content-between">Lista de pedido <a class="btn btn-warning btn-sm" href="{{route('productos.index')}}">Ver listado de producto</a></div>
            <div class="card-body">
                <a href="{{ route('pedidos.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Nuevo Pedido</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Identificador</th>
                        <th scope="col">Fecha del pedido</th>
                        <th scope="col">Productos</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($resultados as $resultado)
                        <tr>
                            <th scope="row">{{ $resultado->id }}</th>
                            <td>{{ $resultado->created_at }}</td>
                            <td>
                                @foreach($resultado->productos as $producto)
                                    <span>{{ $producto->nombre }}:</span>
                                    <span>{{ $producto->pivot->cantidad }}</span><br>
                                @endforeach
                            </td>
                            <td>
                                <form action="{{ route('pedidos.destroy', $resultado->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('pedidos.edit', $resultado->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>   

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Seguro lo quieres eliminar?');"><i class="bi bi-trash"></i> Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No hay pedido!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>


            </div>
        </div>
    </div>    
</div>
    
@endsection
