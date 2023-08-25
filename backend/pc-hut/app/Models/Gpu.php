<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class GPU extends Model
{
    use HasFactory;

    protected $table = 'gpu';

    protected $fillable = ['memory'];


    public function component(): MorphOne
    {
        return $this->morphOne(Component::class, 'productable');
    }
}
