<?php

namespace App\Models;

use App\Enums\TransactionTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /** @var string  */
    protected $table = 'users';

    /** @var string  */
    protected $connection = 'mysql';

    /** @var string[]  */
    protected $appends = [
        'password'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'date_of_birth',
        'country_code',
        'phone_code',
        'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date_of_birth' => 'date',
    ];

    /**
     * @param string $password
     */
    public function setPasswordAttribute(string $password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function wallets()
    {
        return $this->hasMany(Wallet::class, 'user_id', 'id');
    }


    public function getTotalIncome()
    {
        return  $this->wallets->groupBy('category.type')
            ->map(fn($type) => $type->sum('amount'))->get(TransactionTypeEnum::INCOME);
    }

    public function getTotalExpense()
    {
        return  $this->wallets->groupBy('category.type')
            ->map(fn($type) => $type->sum('amount'))->get(TransactionTypeEnum::EXPENSE);
    }
}
