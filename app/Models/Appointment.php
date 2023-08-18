<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======
    protected $fillable=['user_id','table_id','date','start_time','end_time','accepted','admin_responsed','ended'];
>>>>>>> project1/main
    public $timestamps = false;
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function table(){
        return $this->belongsTo(Table::class,'table_id');
    }
}
