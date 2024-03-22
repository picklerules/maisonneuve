<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Http\Resources\FileResource;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'file_path', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value)
        );
    }

    static public function titles() {

        $titles = ArticleResource::collection(self::select()->get());
        $data = json_encode($titles);
        return json_decode($data, true);
    }

}
