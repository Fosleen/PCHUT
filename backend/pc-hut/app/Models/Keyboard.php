<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyboard extends Model
{
    use HasFactory;

    protected $table = 'keyboard';

    protected $fillable = ['name', 'model', 'rgb', 'price', 'manufacturer_id', 'switch_type_id', 'type', 'connector', 'description'];
}
