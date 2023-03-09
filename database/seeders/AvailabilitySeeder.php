<?php

namespace Database\Seeders;

use App\Models\Availability;
use App\Models\Seat;
use App\Models\Station;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AvailabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($trip_id = 1; $trip_id <= 3; $trip_id++) {
            $stations = Station::where('trip_id', $trip_id)->pluck('id')->toArray();
            for ($seat_no = 1; $seat_no <= 12; $seat_no++) {
                for ($z = min($stations); $z < max($stations); $z++) {

                    $data = Seat::where('trip_id', $trip_id)->where('seat_no', $seat_no)->first();
                    Availability::create([
                        'seat_id' => $data->id,
                        'trip_id' => $trip_id,
                        'from_station_id' => $z,
                        'to_station_id' => $z + 1,
                    ]);
                }
            }
        }
    }
}
