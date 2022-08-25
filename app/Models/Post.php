<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];


    ######## Relations ##########
    public function company(){
        return $this->belongsTo(Company::class,'company_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function agent(){
        return $this->belongsTo(Agent::class,'agent_id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function sub_category(){
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }


    public function services(){
        return $this->belongsToMany(Service::class,'services_of_posts','post_id','service_id');
    }


    public function projects(){
        return $this->belongsToMany(Project::class,'services_of_posts','post_id','project_id');
    }




}
