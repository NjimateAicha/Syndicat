<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'titre',
        'fichier',
        'commentaire',
        'residence_id'
    ];

    public function residence()
    {
        return $this->belongsTo(Residence::class);
    }
}
