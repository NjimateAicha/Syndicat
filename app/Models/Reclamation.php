<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reclamation extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        "titre",
        "description",
        "image",
        'lieu',
        'user_id',
        'residence_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with the Residence model
    public function residence()
    {
        return $this->belongsTo(Residence::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

}
