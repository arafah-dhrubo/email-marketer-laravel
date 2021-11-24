<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'collection_id',
        'email_id',
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
    public function collection()
    {
        return $this->hasMany(Collection::class, 'collection_id');
    }
    public function email()
    {
        return $this->hasOne(Email::class, 'email_id');
    }
}
