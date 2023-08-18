<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function table(){
        return $this->belongsTo(Table::class,'table_id');
    }
    public function carts(){
        return $this->hasMany(Cart::class);
    }
}
