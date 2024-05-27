<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Collection;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public static function propertyList(): Collection
    {
        $query = Property::with('propertyValue')->get();

        return $query;
    }

    public function propertyValue(): Relation
    {
        return $this->hasMany(PropertyValue::class);
    }
}
