<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'created_by',
    ];

    // Relationship to get the users in the group
    public function users()
    {
        return $this->belongsToMany(User::class, 'group_users');
    }

    // Relationship to get messages in the group
    public function messages()
    {
        return $this->hasMany(GroupMessage::class);
    }
}
