<?php

namespace App\Contracts\Events;

use App\Models\Product;

interface ProductActionEventContract
{
    public function product(): Product;
}