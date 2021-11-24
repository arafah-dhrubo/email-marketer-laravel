<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'title',
        'body'
    ];
    public function user(){
        return $this->hasOne(User::class, 'user_id');
    }
}
