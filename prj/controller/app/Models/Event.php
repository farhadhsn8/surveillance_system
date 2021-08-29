<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function event_action(){
        return $this->belongsTo(event_action::class,'type' ,'event');
    }
}
