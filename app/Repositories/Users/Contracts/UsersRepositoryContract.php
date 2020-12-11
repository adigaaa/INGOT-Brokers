<?php


namespace App\Repositories\Users\Contracts;


use App\Http\DataTransferObjects\RegistrationUserData;

interface UsersRepositoryContract
{
    public function store(RegistrationUserData $data);
}
