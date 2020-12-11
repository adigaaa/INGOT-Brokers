<?php


namespace App\Http\DataTransferObjects;


use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class CategoryData extends DataTransferObject
{
    public int $type;

    public string $name;


    public static function fromRequest(Request $request): self
    {
        return new self([
            'name' => $request->input('name'),
            'type' => (int)$request->input('type'),
        ]);
    }
}
