<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'sub_categories';


    ##  Mutators and Accessors
    public function getImageAttribute()
    {
        return getFile($this->attributes['image']);
    }

}
