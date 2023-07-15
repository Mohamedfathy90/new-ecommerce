<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productvariant extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function variantitem(){
        return $this->hasMany(Variantitem::class);
    }
}
