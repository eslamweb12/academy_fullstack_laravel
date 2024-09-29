<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class materailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'course_id'=>$this->course_id,
            'title'=>$this->title,
            'link'=>$this->link,
            'type'=>$this->type,
            'created_at'=>$this->created_at->format('d-m-Y'),
        ];
    }
}
