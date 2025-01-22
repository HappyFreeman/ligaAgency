<?php

namespace App\Contracts\Services;

use App\Models\Product;

interface ProductCreationServiceContract
{
    public function create(array $fields): Product;
}
