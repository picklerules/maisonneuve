<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Http\Resources\ArticleResource;


class Article extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'contenu', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    protected function titre(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value)
        );
    }

    static public function titres() {

        $titres = ArticleResource::collection(self::select()->orderBy('titre')->get());
        $data = json_encode($titres);
        return json_decode($data, true);
    }


    protected function contenu(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value)
        );
    }

    static public function contenus() {

        $contenus = CategoryResource::collection(self::select()->get());
        $data = json_encode($contenus);
        return json_decode($data, true);
    }

}

