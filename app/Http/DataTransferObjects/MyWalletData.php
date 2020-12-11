<?php


namespace App\Http\DataTransferObjects;


use App\Models\Category;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class MyWalletData extends DataTransferObject
{
    public int $amount;

    public int $category_id;


    public static function fromRequest(Request $request): self
    {
        return new self([
            'category_id' => (int)$request->input('category'),
            'amount' => (int)$request->input('amount'),
        ]);
    }

}
