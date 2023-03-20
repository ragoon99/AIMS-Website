<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class farmers extends Model
{
    public $table = 'aims_user.farmers';
    public $incrementing = false;
    public $timestamps = false;
    use HasFactory;
}
