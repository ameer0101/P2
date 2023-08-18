<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu_item extends Model
{
    use HasFactory;
    public $timestamps = false;
<<<<<<< HEAD
    protected $fillable=['name','category_id','description','image'];
=======
    protected $fillable=['name','category_id','description','image','hidden'];
>>>>>>> project1/main
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function discounts(){
        return $this->hasMany(Discount_item::class);
    }
    public function favourites(){
        return $this->hasMany(Favourite::class);
    }
    public function rates(){
        return $this->hasMany(Rate::class);
    }
    public function sizes(){
        return $this->hasMany(Item_size::class);
    }

}
