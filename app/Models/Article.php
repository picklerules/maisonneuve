<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'contenu', 'user_id'];

    protected $casts = [
        'titre' => 'array',
        'contenu' => 'array',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    protected function titre(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true)[app()->getLocale()] ?? '',
            set: fn ($value) => json_encode($value)
        );
    }

    protected function contenu(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true)[app()->getLocale()] ?? '',
            set: fn ($value) => json_encode($value)
        );
    }
}

