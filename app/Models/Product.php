<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    private const string DESC = 'desc';

    protected $fillable = [
        'name',
        'price',
        'description',
        'alias',
        'brand_id',
        'category_id',
        'main_image_id'
    ];

    public static function productList(
        string $sort = null,
        int $size = null,
        int $color = null,
        string $brand = null,
        int $id = null,
    ): LengthAwarePaginator {
        $query = DB::table('products')
            ->join('product_images', 'products.main_image_id', '=', 'product_images.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select(
                'products.id',
                'products.alias',
                'products.name as product_name',
                'brands.name as brand_name',
                'products.price',
                'product_images.image_path as image_path'
            );

        if ($id) {
            $query->where('products.category_id', $id);
        }

        if ($size) {
            $query->join('product_property_values as ppv_size', 'products.id', '=', 'ppv_size.product_id')
                ->where('ppv_size.property_value_id', '=', $size);
        }

        if ($color) {
            $query->join('product_property_values as ppv_color', 'products.id', '=', 'ppv_color.product_id')
                ->where('ppv_color.property_value_id', '=', $color);
        }

        if ($brand) {
            $query->where('brands.name', '=', $brand);
        }

        if ($sort) {
            $sortOrder = match ($sort) {
                'price_asc' => ['products.price', 'asc'],
                'price_desc' => ['products.price', self::DESC],
                default => ['products.updated_at', self::DESC],
            };
        } else {
            $sortOrder = ['products.updated_at', self::DESC];
        }
        $query->orderBy($sortOrder[0], $sortOrder[1]);

        return $query->paginate(10);
    }

    public static function productInfo(int $id): LengthAwarePaginator
    {
        $query = DB::table('products')
            ->join('product_images', 'products.main_image_id', '=', 'product_images.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select(
                'products.id',
                'products.name as product_name',
                'categories.name as category_name',
                'brands.name as brand_name',
                'products.price',
                'product_images.image_path as image_path',
                'products.description',
            )->where('products.id', '=', $id);

        return $query->paginate(10);
    }

    public static function favoriteProducts(int $id): LengthAwarePaginator
    {
        $query = DB::table('products')
            ->join('product_images', 'products.main_image_id', '=', 'product_images.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('favorites', 'products.id', '=', 'favorites.product_id')
            ->select(
                'products.id',
                'products.name as product_name',
                'categories.name as category_name',
                'products.price',
                'product_images.image_path as image_path',
            )->where('favorites.user_id', '=', $id);

        return $query->paginate(10);
    }

    public static function orderProducts(int $id): LengthAwarePaginator
    {
        $query = DB::table('products')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('order_products', 'products.id', '=', 'order_products.product_id')
            ->select(
                'products.id',
                'products.name as product_name',
                'brands.name as brand_name',
                'products.price',
                'order_products.quantity',
            )->where('order_products.order_id', '=', $id);

        return $query->paginate(10);
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

    public function favorites(): Relation
    {
        return $this->hasOne(Favorite::class, 'product_id');
    }

    public function mainImage(): BelongsTo
    {
        return $this->belongsTo(ProductImage::class, 'main_image_id');
    }
}
