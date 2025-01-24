<?php

namespace App\Events;


use App\Contracts\Events\ProductActionEventContract;
use App\Models\Product;

abstract class AbstractProductActionEvent implements ProductActionEventContract
{
    /**
     * Create a new event instance.
     */
    public function __construct(public readonly Product $product)
    {
    }

    public function product(): Product
    {
        return $this->product;
    }
}
