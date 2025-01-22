<?php

namespace App\Contracts\Services;

use App\Models\Product;

interface ProductRemoverServiceContract
{
    public function delete(int $id);
}
