<?php


namespace App\Repositories\Users;

use App\Http\DataTransferObjects\RegistrationUserData;
use App\Repositories\Users\Contracts\UsersRepositoryContract;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UsersRepository extends BaseRepository implements UsersRepositoryContract
{
    /**
     * @return Model
     */
    public function getModel(): Model
    {
        return new User();
    }

    public function store(RegistrationUserData $data)
    {
        return $this->getModel()->create([
           'image' => time().'_'.$data->image->getClientOriginalName(),
           'date_of_birth' => $data->date_of_birth,
           'name' => $data->name,
           'password' => $data->password,
           'email' => $data->email,
            'country_code' => $data->country_code,
            'phone_code' => $data->phone_code,
        ]);
    }

    public function getUsersDetails()
    {
        return $this->getModel()->with('wallets', 'wallets.category')->get();
    }
}
