<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
    	'nombre',
    	'descripcion',
    	'precio',
    	'user_id',
    	'category_id',
        'consignado'
    ];

    public function usuario()
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function categoria()
    {
    	return $this->belongsTo('App\Models\Category');
    }

}
