<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $guarded = [];


    ##  Mutators and Accessors
    public function getImageAttribute()
    {
        return getFile($this->attributes['image']);
    }


    public function subAreas(){
        return $this->hasMany(Area::class,'area_id');
    }
}
