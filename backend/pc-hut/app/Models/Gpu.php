<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gpu extends Model
{
    use HasFactory;

    protected $table = 'gpu';

    protected $fillable = ['model', 'memory', 'price', 'manufacturer_id', 'pc_id'];
}
