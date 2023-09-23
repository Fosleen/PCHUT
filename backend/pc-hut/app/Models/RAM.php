<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class RAM extends Model
{
    use HasFactory;

    protected $table = 'ram';

    protected $fillable = ['speed', 'ram_type_id',];


    public function component(): MorphOne
    {
        return $this->morphOne(Component::class, 'productable');
    }

    public function ramType(): BelongsTo
    {
        return $this->belongsTo(RamType::class, 'ram_type_id');
    }
}
