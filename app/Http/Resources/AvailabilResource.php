<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AvailabilResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'Id'=>$this->id,
            'Seat_Number'=>$this->seat->seat_no,
            'Seat_id'=>$this->seat_id,
            'route'=>($this->trip_id ? $this->trip->trip_name:''),
            'route_id'=>$this->trip_id,
            'Start'=>($this->from_station_id ? $this->startstation->station_name:''),
            'from_station_id'=>$this->from_station_id,
            'end'=>($this->to_station_id ? $this->endstation->Station_name:''),
            'to_station_id'=>$this->to_station_id,



        ];
    }
}
