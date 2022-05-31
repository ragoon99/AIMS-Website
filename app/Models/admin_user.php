<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_user extends Model
{
    public $table = 'aims_user.admin_users';
    protected $primaryKey = 'eid';
    public $incrementing = false;
    public $timestamps = false;

    use HasFactory;
}
