<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    
    public $incrementing = false;

    protected $fillable = [
        'adresse',
        'telephone',
        'date_naissance',
        'ville_id',
        'id'];

        public function ville() {
            return $this->belongsTo(Ville::class);
        }

        public function user() {
            return $this->hasOne(User::class, 'id'); 
        }
        
}
