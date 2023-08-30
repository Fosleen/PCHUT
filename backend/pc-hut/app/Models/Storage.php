<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Storage extends Model
{
    use HasFactory;

    protected $table = 'storage';

    protected $fillable = ['storage_type_id', 'size',];


    public function component(): MorphOne
    {
        return $this->morphOne(Component::class, 'productable');
    }
}
