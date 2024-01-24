@extends('layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Nuevo Pedido
                </div>
                <div class="float-end">
                    <a href="{{ route('pedidos.index') }}" class="btn btn-primary btn-sm">&larr; Volver</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('pedidos.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="producto" class="col-md-4 col-form-label text-md-end text-start">Producto</label>
                        <div class="col-md-6">
                        <select class="form-control js-example-basic-multiple" name="producto">
                            @foreach ($productos as $producto)
                            <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-end text-start">Cantidad</label>
                        <div class="col-md-6">
                        <input type="number" step="1" class="form-control @error('cantidad') is-invalid @enderror" id="cantidad" name="cantidad" value="{{ old('cantidad') }}">
                            @if ($errors->has('cantidad'))
                                <span class="text-danger">{{ $errors->first('cantidad') }}</span>
                            @endif
                        </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Agregar al pedido">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection