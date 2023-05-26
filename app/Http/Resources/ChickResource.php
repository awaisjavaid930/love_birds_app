<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChickResource extends JsonResource
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
            'parent_id' => $this->parent_id,
            'title' => $this->title,
            'breed_no' => $this->breed_no,
            'cage_no' => $this->cage_no,
            'ring_no' => $this->ring_no,
            'gender' => $this->gender,
            'is_sold' => $this->is_sold,
            'parent' => $this->parent,

        ];
    }
}
