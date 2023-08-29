<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class PSU extends Model
{
    use HasFactory;

    protected $table = 'psu';

    protected $fillable = ['power'];


    public function component(): MorphOne
    {
        return $this->morphOne(Component::class, 'productable');
    }
}
