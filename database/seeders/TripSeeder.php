<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trips=['Cairo_Alex','Cairo_Damitta','Cairo_Asyout'];
        foreach($trips as $trip){
        Trip::create(['trip_name'=>$trip]);
        }
    }
}
