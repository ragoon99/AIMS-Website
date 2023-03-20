<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seed_data extends Model
{
    protected $table = 'aims_data.seed_data';
    public $timestamps = false;
    use HasFactory;
}
