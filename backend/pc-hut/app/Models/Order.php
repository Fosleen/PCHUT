<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = ['user_id', 'payment', 'delivery_status', 'order_name', 'order_address'];

    public function component(): BelongsToMany
    {
        return $this->belongsToMany(Component::class)->withPivot('quantity'); // components that belong to the order
    }
}
