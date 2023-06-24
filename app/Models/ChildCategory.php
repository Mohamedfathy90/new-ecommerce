<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{
    protected $guarded =[];
    protected $table = 'childcategories';
    use HasFactory;

    public function subcategory(){

        return $this->belongsTo(Subcategory::class);
    }
}
