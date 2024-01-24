<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoProducto extends Model
{
    use HasFactory;

    protected $fillable = [
        'producto_id',
        'pedido_id',
        'cantidad'
    ];

    protected $table = "pedido_producto";

    public $timestamps = false;
}
