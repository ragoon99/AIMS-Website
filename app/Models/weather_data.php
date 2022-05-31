<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class weather_data extends Model
{
    public $table = 'aims_data.weather_data';
    public $timestamps = false;
    use HasFactory;
}
