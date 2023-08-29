<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RamType extends Model
{
    use HasFactory;

    protected $table = 'ram_type';

    protected $fillable = ['name'];
}
