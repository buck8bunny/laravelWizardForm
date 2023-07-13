<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'fullname',
        'report',
        'date_of_birth',
        'country',
        'phone',
        'email',
        'сompany',
        'position',
        'about',
        'file_name',
        'uploaded_on',
    ];
}
