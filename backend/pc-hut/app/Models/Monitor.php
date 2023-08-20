<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    use HasFactory;

    protected $table = 'monitor';

    protected $fillable = ['model', 'size','description', 'refresh_rate', 'curved', 'price', 'manufacturer_id'];
}
