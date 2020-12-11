<?php


namespace App\Http\DataTransferObjects;


use Illuminate\Database\Eloquent\Collection;
use Spatie\DataTransferObject\DataTransferObject;

class WalletResultData extends DataTransferObject
{
    public Collection $categories;

    public Collection $myWallet;

    public int $totalIncome;

    public int $totalExpense;

    public int $total;

    public array $transactionsTypes;
}
