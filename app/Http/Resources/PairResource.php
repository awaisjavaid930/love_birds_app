<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PairResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'cage_no' => $this->cage_no,
            'male_ring' => $this->male_ring,
            'female_ring' => $this->female_ring,
            'is_sold' => $this->is_sold,
            'chicks' => ChickResource::collection($this->chicks),
        ];
    }
}
