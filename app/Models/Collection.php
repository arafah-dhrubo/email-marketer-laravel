<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'email',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
