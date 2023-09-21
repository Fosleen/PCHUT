<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Cooling extends Model
{
    use HasFactory;

    protected $table = 'cooling';

    protected $fillable = ['cooling_type_id'];


    public function component(): MorphOne
    {
        return $this->morphOne(Component::class, 'productable');
    }

    public function coolingType(): BelongsTo
    {
        return $this->belongsTo(CoolingType::class, 'cooling_type_id');
    }
}
