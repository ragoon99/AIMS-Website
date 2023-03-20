<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class normal_users extends Model
{
    public $table = 'aims_user.normal_user';
    public $incrementing = false;
    public $timestamps = false;
    use HasFactory;
}
