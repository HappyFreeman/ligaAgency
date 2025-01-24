<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['article', 'name', 'status', 'data']; // название полей которые можно массово заполнять
    protected $casts = ['data' => 'json']; // преобразование типов полей при получения из бд (иногда перед сохранением)

    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }
}
