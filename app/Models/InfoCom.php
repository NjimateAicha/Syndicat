<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class InfoCom extends Model
{
    use HasFactory;
    protected $table = 'info_com';
    protected $fillable = ['titre', 'description', 'date_info','residence_id','from_id','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

