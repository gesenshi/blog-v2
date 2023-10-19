<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'target_user_id'];

    // Это связь с пользователем, на которого подписываются
    public function targetUser()
    {
        return $this->belongsTo(User::class, 'target_user_id');
    }

    // Это связь с пользователем, который подписывается
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}