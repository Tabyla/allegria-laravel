<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'property_id'
    ];

    public static function productSizes(int $id): Collection
    {
        $query = PropertyValue::query()
            ->join('product_property_values', 'product_property_values.property_value_id', '=', 'property_values.id')
            ->where('product_property_values.product_id', '=', $id)
            ->where('property_id', '=', 1)
            ->select('name')
            ->get();

        return $query;
    }

    public static function productColors(int $id): Collection
    {
        $query = PropertyValue::query()
            ->join('product_property_values', 'product_property_values.property_value_id', '=', 'property_values.id')
            ->where('product_property_values.product_id', '=', $id)
            ->where('property_id', '=', 2)
            ->select('name')
            ->get();

        return $query;
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
