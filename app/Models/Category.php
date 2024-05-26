<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'alias', 'parent_id'];

    public function products(): Relation
    {
        return $this->hasMany(Product::class);
    }
}
