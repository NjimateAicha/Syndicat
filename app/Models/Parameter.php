<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'app_name',
        'copyright',
        'facebook_link',
        'twitter_link',
        'linkedin_link',
        'instagram_link',
    ];
}
