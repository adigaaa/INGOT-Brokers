<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table = 'wallets';

    protected $fillable = [
        'user_id',
        'category_id',
        'amount',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id' ,'id');
    }
}
