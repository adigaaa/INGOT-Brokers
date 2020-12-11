<?php


namespace App\Http\DataTransferObjects;

use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Spatie\DataTransferObject\DataTransferObject;

class RegistrationUserData extends DataTransferObject
{
    public string $name;

    public int $country_code;

    public int $phone_code;

    public string $password;

    public string $email;

    public ?Carbon $date_of_birth;

    public UploadedFile $image;

    public static function fromRequest(Request $request): self
    {
        return new self([
            'name' => $request->input('name'),
            'country_code' => (int)$request->input('country_code'),
            'phone_code' => (int)$request->input('phone_code'),
            'password' => $request->input('password'),
            'email' => $request->input('email'),
            'date_of_birth' =>  $request->input('date_of_birth') ? Carbon::createFromDate($request->input('date_of_birth')): null,
            'image' => $request->file('image'),
        ]);
    }


}
