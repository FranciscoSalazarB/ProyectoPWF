<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table='questions';

    protected $fillable = [
        'contenido',
        'respuesta',
        'product_id',
        'user_id'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}