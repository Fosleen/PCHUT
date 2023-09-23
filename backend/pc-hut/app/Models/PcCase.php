<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class PcCase extends Model
{
    use HasFactory;

    protected $table = 'pc_case';

    protected $fillable = ['case_size_id'];


    public function component(): MorphOne
    {
        return $this->morphOne(Component::class, 'productable');
    }

    public function caseSize(): BelongsTo
    {
        return $this->belongsTo(CaseSize::class, 'case_size_id');
    }
}
