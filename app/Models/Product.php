<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded =[]; 

    public function productimage(){
        return $this->hasMany(Productimage::class);
    }

    public function flashsale_item(){
        return $this->hasOne(Flashsale_item::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function productvariant(){
        return $this->hasMany(Productvariant::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }
}
