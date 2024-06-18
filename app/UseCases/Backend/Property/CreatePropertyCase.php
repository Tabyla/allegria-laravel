<?php

declare(strict_types=1);

namespace App\UseCases\Backend\Property;

use App\Models\Property;

class CreatePropertyCase
{
    public function __construct(
        private readonly Property $property,
    ) {
    }

    public function handle(array $data): void
    {
        $this->property->name = $data['property-name'];
        $this->property->save();
    }
}
