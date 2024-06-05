<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = ['image_path', 'product_id'];

    public static function productImages(int $id): Collection
    {
        $query = ProductImage::query()
            ->where('product_images.product_id', '=', $id)
            ->select('image_path')
            ->get();

        return $query;
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
