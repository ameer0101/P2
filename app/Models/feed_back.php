<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feed_back extends Model
{
    public $timestamps=false;
    use HasFactory;
        protected $fillable = [
            //'date',
            'comment',
            'user_id',
        ];

     public function user()
        {
            return $this->belongsToMany('App\Models\User','feadback_id');
        }

}
