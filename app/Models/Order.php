<?php

declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    public const string STATUS_NEW = 'new';
    public const string STATUS_AWAITING_CONFIRMATION = 'awaiting_confirmation';
    public const string STATUS_PAID = 'paid';
    public const string STATUS_CANCELLED = 'cancelled';
    public const string STATUS_COMPLETED = 'completed';

    protected $fillable = [
        'user_id',
        'total_price',
        'address',
        'status',
        'payment_id',
        'payment_status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getTranslatedStatusAttribute(): string
    {
        return __('order.' . $this->status);
    }
}
