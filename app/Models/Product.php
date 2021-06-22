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
        'consignado',
        'motivo'
    ];

    public function usuario()
    {
    	return $this->belongsTo('App\Models\User','user_id');
    }

    public function categoria()
    {
    	return $this->belongsTo('App\Models\Category','category_id');
    }

    public function images(){
        return $this->hasMany('App\Models\Image');
    }
    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

}
