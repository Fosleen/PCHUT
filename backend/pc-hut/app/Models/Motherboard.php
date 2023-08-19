<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motherboard extends Model
{
    use HasFactory;

    protected $table = 'motherboard';

    protected $fillable = ['model', 'price',  'manufacturer_id', 'socket_id'];
}
