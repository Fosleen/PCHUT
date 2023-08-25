<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Mouse extends Model
{
    use HasFactory;

    protected $table = 'mouse';

    protected $fillable = ['dpi', 'rgb', 'wired'];

    public function component(): MorphOne
    {
        return $this->morphOne(Component::class, 'productable');
    }
}
