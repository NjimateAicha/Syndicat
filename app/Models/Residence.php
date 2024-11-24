<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Residence extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomResidence',
        'titre_regelement',
        'description',
        'active'
    ];

    public function users(): hasMany
    {
        return $this->hasMany(User::class);
    }

    public function reclamations(): HasMany
    {
        return $this->hasMany(Reclamation::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function inventaires(): HasMany
    {
        return $this->hasMany(Inventaire::class);

    }
    // public function infoComs()
    // {
    //     return $this->belongsToMany(InfoCom::class, 'info_com_residence');
    // }

}
