<?php


namespace App\Services\Admin;


use App\Repositories\Users\UsersRepository;
use App\Repositories\Wallets\WalletsRepository;

class AdminService
{
    /**
     * @var UsersRepository
     */
    private UsersRepository $usersRepository;

    /**
     * AdminService constructor.
     * @param UsersRepository $usersRepository
     */
    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function getUsersDetails()
    {
        return $this->usersRepository->getUsersDetails();
    }
}
