<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
<<<<<<< HEAD
    public function appointments(){
        return $this->hasMany(Appointment::class,);
=======
    protected $fillable=['num_of_chairs','available','position'];
    public function appointments(){
        return $this->hasMany(Appointment::class);
>>>>>>> project1/main
    }
    public function visited(){
        return $this->hasMany(Visitor::class);
    }
}
