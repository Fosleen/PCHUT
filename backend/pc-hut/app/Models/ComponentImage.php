<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentImage extends Model
{
    use HasFactory;

    protected $table = 'component_images';

    protected $fillable = ['url', 'component_id'];
}
