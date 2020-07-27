<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $updatedAt = $this->updated_at->isToday()
            ? $this->updated_at->toTimeString()
            : $this->updated_at->toDateString();

        return [
            'id' => $this->id,
            'text' => $this->text,
            'updatedAt' => $updatedAt
        ];
    }
}
