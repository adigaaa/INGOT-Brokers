<?php


namespace App\Services\Users;

use App\Http\DataTransferObjects\RegistrationUserData;
use App\Repositories\Users\Contracts\UsersRepositoryContract;
use App\Services\Users\Contracts\UserServiceContract;
use Illuminate\Support\Facades\Auth;

class UsersService implements UserServiceContract
{
    /**
     * @var UsersRepositoryContract
     */
    private UsersRepositoryContract $usersRepository;

    /**
     * UsersService constructor.
     * @param UsersRepositoryContract $usersRepository
     */
    public function __construct(UsersRepositoryContract $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    /**
     * @param RegistrationUserData $data
     */
    public function createUser(RegistrationUserData $data)
    {
        $user = $this->usersRepository->store($data);
        $data->image->storeAs('', $user->image, 'public');
        Auth::login($user);
    }
}
