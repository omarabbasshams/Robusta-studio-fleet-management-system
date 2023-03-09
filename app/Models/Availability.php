<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    use HasFactory;

    public function trip(){
        return $this->BelongsTo(Trip::class,'trip_id','id');
    }
    public function startstation(){
        return $this->hasOne(Station::class,'id','from_station_id');
    }
    public function endstation(){
        return $this->hasOne(Station::class,'id','to_station_id');
    }
    public function seat(){
        return $this->hasOne(seat::class,'id','seat_id');
    }
}
