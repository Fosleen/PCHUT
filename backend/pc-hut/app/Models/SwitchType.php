<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SwitchType extends Model
{
    use HasFactory;

    protected $table = 'switch_type';

    protected $fillable = ['name'];
}
