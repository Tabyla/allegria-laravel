<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public static function brandList(): Collection
    {
        $query = DB::table('brands')->select('name')->get();

        return $query;
    }

    public function products(): Relation
    {
        return $this->hasMany(Product::class);
    }
}
