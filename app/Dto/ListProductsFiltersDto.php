<?php

namespace App\Dto;

class ListProductsFiltersDto
{
    public function __construct(
        public ?string $search = null,
        public ?float $min_price = null,
        public ?float $max_price = null,
        public ?bool $is_active = null,
    ) {}
}
