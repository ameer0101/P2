<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\RateFactory;

class Rate extends Model
{
<<<<<<< HEAD
    
    use HasFactory;
    protected $fillable = [
        'user_id', 'menu_item_id','stars'
    ];
=======
    protected $guarded=[];
    use HasFactory;
    
>>>>>>> project1/main
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function item(){
        return $this->belongsTo(Menu_item::class,'menu_item_id');
    }
    protected static function newFactory()
    {
        return RateFactory::new();
    }
}
