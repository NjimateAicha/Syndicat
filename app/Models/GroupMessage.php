<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'sender_id',
        'message',
    ];

    // Relationship to the group
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    // Relationship to the sender
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
