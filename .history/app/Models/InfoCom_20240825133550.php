<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoCom extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'description', 'date_info', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function residences()
    {
        return $this->belongsToMany(Residence::class, 'info_com_residence');
    }
}

