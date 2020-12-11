<?php


namespace App\Enums;


class TransactionTypeEnum
{
    public const INCOME = '1';
    public const EXPENSE = '2';


    public static function getTransactionsTypes()
    {
        return [
            self::EXPENSE => 'Expense',
            self::INCOME => 'Income'
        ];
    }

    public static function getValues()
    {
        return [
            self::INCOME,
            self::EXPENSE
        ];
    }

    public static function getTransactionsByType(int $type)
    {
        $result = self::getTransactionsTypes();
        return $result[$type];
    }
}
