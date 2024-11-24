<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commentaire extends Model
{
    use HasFactory;
    protected $fillable = [
        "text",
        "reclamation_id",
        "user_id"
    ] ;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reclamation()
    {
        return $this->belongsTo(Reclamation::class);
    }
}
