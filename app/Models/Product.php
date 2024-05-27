<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'description', 'alias', 'brand_id', 'category_id', 'main_image_id'
    ];

    public static function productCount(): int
    {
        $query = DB::table('products')->count();

        return $query;
    }

    public static function cartsInfo(): Collection
    {
        $query = DB::table('products')
            ->join('product_images', 'products.main_image_id', '=', 'product_images.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.id', 'products.name as product_name', 'brands.name as brand_name',
                'products.price', 'product_images.image_path as image_path')->orderBy('products.updated_at')
            ->get();

        return $query;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function images(): Relation
    {
        return $this->hasMany(ProductImage::class);
    }

    public function mainImage(): BelongsTo
    {
        return $this->belongsTo(ProductImage::class, 'main_image_id');
    }
}
