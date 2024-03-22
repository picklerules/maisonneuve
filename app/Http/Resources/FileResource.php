<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $locale = app()->getLocale();

        $title = $this->title[$locale] ?? $this->title['en'];

        return [
            'id' => $this->id,
            'title' => $title,
            'user_id' => $this->user_id,
        ];
    }
}