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
        'description'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'residence_user');
    }
    public function reclamations(): HasMany
    {
        return $this->hasMany(Reclamation::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }
    // public function infoComs()
    // {
    //     return $this->belongsToMany(InfoCom::class, 'info_com_residence');
    // }

}
