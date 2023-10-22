<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{

    protected $table = "genders";
    protected $primaryKey = 'id';

    use HasFactory;

    public function articles(){

        // hasManyThrough(related,through)

        // return $this->hasManyThrough(Article::class,User::class);

        // = hasManyThrough(related,table,firstkey,secondkey)
        return $this->hasManyThrough(Article::class,User::class,'gender_id','user_id');
    }

}
// 27MT
