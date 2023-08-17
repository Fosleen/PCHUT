<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooling_type extends Model
{
    use HasFactory;

    protected $table = 'cooling_type';

    protected $fillable = ['name'];
}
