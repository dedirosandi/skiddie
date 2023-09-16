<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordManager extends Model
{
    use HasFactory;
    protected $table = "password_managers";
    protected $fillable = [
        'title',
        'url',
        'username_email',
        'password',
    ];
}
