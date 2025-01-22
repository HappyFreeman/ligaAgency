<?php

namespace App\DTO;

class CatalogFilterDTO
{
    private ?string $model = null;

    public function getName(): ?string
    {
        return $this->model;
    }

    public function setName(?string $model): CatalogFilterDTO
    {
        $this->model = $model;
        return $this;
    }
}
