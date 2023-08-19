<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CPU extends Model
{
    use HasFactory;

    protected $table = 'CPU';

    protected $fillable = ['model',  'manufacturer_id', 'socket_id', 'cores', 'speed', 'price'];
}
