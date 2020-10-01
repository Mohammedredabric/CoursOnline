<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table='courses';
    protected $fillable = ['title','description'];

    public static function booted(){
            static::creating(function($course){
                    $course -> user_id = auth()->id();
            });
    }

    public function User(){
        return $this -> belongsTo(User::class);
    }

    public function Episodes(){
        return $this -> hasMany(Episode::class);
    }


}

