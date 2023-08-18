<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\FavouriteFactory;

class Favourite extends Model
{
    use HasFactory;
<<<<<<< HEAD
    public function user(){
=======
    protected $guarded=[];
    public function user(){
        
>>>>>>> project1/main
        return $this->belongsTo(User::class,'user_id');
    }
    public function item(){
        return $this->belongsTo(Menu_item::class,'menu_item_id');
    }
    protected static function newFactory()
    {
        return FavouriteFactory::new();
    }
<<<<<<< HEAD
    //
    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }

    protected $fillable = [
        'user_id', 'menu_item_id'
    ];

=======
>>>>>>> project1/main

}
