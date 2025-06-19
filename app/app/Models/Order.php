<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property string $full_name
 * @property string $comment
 * @property string $product_id
 * @property OrderStatus $status
 * @property float $total_price
 * @property float $amount
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property string $product_name
 * @property string $product_category
 * @property string $product_price
 */
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'full_name',
        'comment',
        'status',
        'amount',
        'total_price',
    ];

    protected $casts = [
        'status' => OrderStatus::class,
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
