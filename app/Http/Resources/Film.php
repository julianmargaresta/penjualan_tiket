<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Film extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->nama,
            'deskripsi' => $this->deskripsi,
            'genre' => [
                'id' => $this->genres->id,
                'name' => $this->genres->name
            ],
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'studio' => [
                'id' => $this->studios->id,
                'name' => $this->studios->name,
                'quota' => $this->studios->quota,
                'price' => $this->studios->price
            ],
            'foto' => $this->foto,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
