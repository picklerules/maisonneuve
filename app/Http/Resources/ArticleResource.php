<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $locale = app()->getLocale();

        $titre = $this->titre[$locale] ?? $this->titre['en'];
        $contenu = $this->contenu[$locale] ?? $this->contenu['en'];

        return [
            'id' => $this->id,
            'titre' => $titre,
            'contenu' => $contenu,
            'user_id' => $this->user_id,
        ];
    }
}
