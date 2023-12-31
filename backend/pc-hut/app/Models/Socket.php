<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socket extends Model
{
    use HasFactory;

    protected $table = 'socket';

    protected $fillable = ['name'];
}
