<?php

namespace Database\Seeders;

use App\Models\Seat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($trip_id = 1; $trip_id <= 3; $trip_id++) {

            for ($seat_no = 1; $seat_no <= 12; $seat_no++) {
                Seat::create([
                    'seat_no' => $seat_no,
                    'trip_id' => $trip_id,

                ]);
            }
        }
    }
}
