<?php


namespace App\Services\Users\Contracts;


use App\Http\DataTransferObjects\RegistrationUserData;

interface UserServiceContract
{
    public function createUser(RegistrationUserData $data);
}
