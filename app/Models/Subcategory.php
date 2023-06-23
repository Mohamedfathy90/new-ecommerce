<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $guarded =[];
    use HasFactory;

    public function category(){
       return $this->belongsTo(Category::class); 
    }

    public function childcategory(){
        return $this->hasMany(ChildCategory::class);
    }
}
