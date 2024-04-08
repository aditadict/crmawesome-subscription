<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscription_type_id',
        'price',
        'description',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function subscriptionType()
    {
        return $this->belongsTo(SubscriptionType::class);
    }
}