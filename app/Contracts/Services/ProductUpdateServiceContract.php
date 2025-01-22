<?php

namespace App\Contracts\Services;

use App\Models\Product;

interface ProductUpdateServiceContract
{
    public function update(int $id, array $fields): Product;
}
