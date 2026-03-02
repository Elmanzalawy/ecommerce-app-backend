<?php

namespace App\Dto;

use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript(name: 'Product')]
class ProductDto extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public ?string $description,
        public int $price,
        public ?int $discount_price,
        public string $currency,
        public bool $is_active,
        public int $stock,
        /** @var array<string>|null */
        public ?array $images,
    ) {
    }
}