<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trip;
class Station extends Model
{
    use HasFactory;

    public function trip(){
        return $this->belongsTo(Trip::class,'trip_id','id');
    }
}
