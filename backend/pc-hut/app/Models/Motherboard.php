<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Motherboard extends Model
{
    use HasFactory;

    protected $table = 'motherboard';

    protected $fillable = ['socket_id'];

    public function component(): MorphOne
    {
        return $this->morphOne(Component::class, 'productable');
    }

    public function socket(): BelongsTo
    {
        return $this->belongsTo(Socket::class, 'socket_id');
    }
}
