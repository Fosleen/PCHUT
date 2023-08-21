<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mouse extends Model
{
    use HasFactory;

    protected $table = 'mouse';

    protected $fillable = ['model', 'dpi','description', 'rgb', 'manufacturer_id'];
}
