<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount_item extends Model
{
    use HasFactory;
    protected $fillable=['discount_id','duration','menu_item_id','valid'];
    public function item(){
        return $this->belongsTo(Menu_item::class,'menu_item_id');
    }
    public function discount(){
        return $this->belongsTo(Discount::class,'discount_id');
    }

}
