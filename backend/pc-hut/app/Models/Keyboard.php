<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Keyboard extends Model
{
    use HasFactory;

    protected $table = 'keyboard';

    protected $fillable = ['rgb',  'switch_type_id', 'type', 'connector', 'wired'];

    public function component(): MorphOne
    {
        return $this->morphOne(Component::class, 'productable');
    }
}
