<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Monitor extends Model
{
    use HasFactory;

    protected $table = 'monitor';

    protected $fillable = ['size', 'refresh_rate', 'curved'];

    public function component(): MorphOne
    {
        return $this->morphOne(Component::class, 'productable');
    }
}
