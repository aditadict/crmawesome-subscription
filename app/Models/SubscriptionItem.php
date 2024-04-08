<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscription_type_id',
        'name',
        'description',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'name' => 'json',
    ];

    public function subscriptionType()
    {
        return $this->belongsTo(SubscriptionType::class);
    }
}