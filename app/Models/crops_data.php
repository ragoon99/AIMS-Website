<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crops_data extends Model
{
    protected $table='aims_data.crops_data';
    public $timestamps = false;
    use HasFactory;
}
