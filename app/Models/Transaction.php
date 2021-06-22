<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'puntuacion',
        'product_id',
        'comprador_id'
    ];

    public function comprador()
    {
        return $this->belongsTo('App\Models\User','comprador_id');
    }

    public function producto()
    {
        return $this->belongsTo('App\Models\Product','producto_id');
    }
}
