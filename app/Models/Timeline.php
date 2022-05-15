<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;
    protected $table='Timelines';
    protected $fillable=['id','userId','date','time','duration'];

    public function hasuser(){
        return $this->belongsTo(User::class,'userId');
    }
}
