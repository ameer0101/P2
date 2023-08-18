<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_size extends Model
{
    protected $fillable = ['menu_item_id','size_id','price'];
    use HasFactory;
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function size(){
        return $this->belongsTo(Size::class,'size_id');
    }
    public function item(){
        return $this->belongsTo(Menu_item::class,'menu_item_id');
    }
}
