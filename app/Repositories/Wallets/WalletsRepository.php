<?php


namespace App\Repositories\Wallets;


use App\Http\DataTransferObjects\MyWalletData;
use App\Models\Wallet;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class WalletsRepository extends BaseRepository
{
    /**
     * @return Model
     */
    public function getModel(): Model
    {
        return new Wallet();
    }

    /**
     * @param int $user_id
     */
    public function getByUserId(int $user_id): Collection
    {
        return $this->getModel()->with('category')->where('user_id', $user_id)->get();
    }

    public function store(MyWalletData $data)
    {
        $this->getModel()->create([
            'user_id' => Auth::user()->id,
            'category_id' => $data->category_id,
            'amount' => $data->amount,
        ]);
    }
}
