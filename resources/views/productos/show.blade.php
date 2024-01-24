@extends('layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Información del producto {{ $producto->id }}
                </div>
                <div class="float-end">
                    <a href="{{ route('productos.index') }}" class="btn btn-primary btn-sm">&larr; Volver</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-end text-start"><strong>Nombre:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $producto->nombre }}
                        </div>
                    </div>
                   
                    <div class="row">
                        <label for="descripcion" class="col-md-4 col-form-label text-md-end text-start"><strong>Descripcion:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $producto->descripcion }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="precio" class="col-md-4 col-form-label text-md-end text-start"><strong>Precio:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $producto->precio }}
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
    
@endsection