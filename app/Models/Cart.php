<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function visitor(){
        return $this->belongsTo(Visitor::class,'visitor_id');
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
