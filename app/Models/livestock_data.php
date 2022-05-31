<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class livestock_data extends Model
{
    protected $table='aims_data.livestock_data';
    public $timestamps = false;
    use HasFactory;
}
