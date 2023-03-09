<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stations=[
            [
                'station_name'=>'Cairo',
                'trip_id'=>'1',


            ],
            [
                'station_name'=>'Tanta',
                'trip_id'=>'1',


            ],  [
                'station_name'=>'Alex',
                'trip_id'=>'1',


            ],  [
                'station_name'=>'Cairo',
                'trip_id'=>'2',


            ],  [
                'station_name'=>'Ismalya',
                'trip_id'=>'2',


            ],  [
                'station_name'=>'Rashed',
                'trip_id'=>'2',


            ],  [
                'station_name'=>'Portsaid',
                'trip_id'=>'2',


            ],  [
                'station_name'=>'Damitta',
                'trip_id'=>'2',


            ],  [
                'station_name'=>'Cairo',
                'trip_id'=>'3',


            ],  [
                'station_name'=>'bunyswif',
                'trip_id'=>'3',


            ],  [
                'station_name'=>'Elminia',
                'trip_id'=>'3',


            ],  [
                'station_name'=>'Asyit',
                'trip_id'=>'3',


            ]
            ];
            foreach($stations as $station){

                Station::create($station);
            }

    }
}
