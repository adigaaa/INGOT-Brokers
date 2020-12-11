<?php

namespace App\Models;

use App\Enums\TransactionTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'type',
        'name'
    ];

    public function getTypeNameAttribute()
    {
        return TransactionTypeEnum::getTransactionsByType($this->attributes['type']);
    }
}
