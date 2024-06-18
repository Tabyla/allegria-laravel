<?php

declare(strict_types=1);

namespace App\UseCases\Backend\Brand;

use App\Models\Brand;

class CreateBrandCase
{
    public function __construct(
        private readonly Brand $brand,
    ) {
    }

    public function handle(array $data): void
    {
        $this->brand->name = $data['brand-name'];
        $this->brand->save();
    }
}
