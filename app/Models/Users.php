<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'password',
        'phone'
    ];

    protected $table = 'users';
    protected $primaryKey = 'id_user';
    public $incrementing = true;
    public $timestamps = false;
}
