<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseSize extends Model
{
    use HasFactory;

    protected $table = 'case_size';

    protected $fillable = ['name'];
}
