<?php


namespace App\Services\Wallets;


use App\Enums\TransactionTypeEnum;
use App\Http\DataTransferObjects\MyWalletData;
use App\Http\DataTransferObjects\WalletResultData;
use App\Repositories\Categories\CategoriesRepository;
use App\Repositories\Wallets\WalletsRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class WalletsService
{
    /**
     * @var CategoriesRepository
     */
    private CategoriesRepository $categoriesRepository;
    /**
     * @var WalletsRepository
     */
    private WalletsRepository $walletsRepository;

    public function __construct(CategoriesRepository $categoriesRepository, WalletsRepository $walletsRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
        $this->walletsRepository = $walletsRepository;
    }

    /**
     * @return WalletResultData
     */
    public function getWalletInfo(): WalletResultData
    {
        $categories = $this->categoriesRepository->getAll();

        $user_id = optional(Auth::user())->id;

        $myWallet = $this->walletsRepository->getByUserId($user_id);
        $result = $myWallet->groupBy('category.type')->map(fn($grouped) => $grouped->sum('amount'));

        $income = $result->get(TransactionTypeEnum::INCOME);

        $expense = $result->get(TransactionTypeEnum::EXPENSE);

        $total = $income - $expense;

        return new WalletResultData([
            'total' => $total ?? 0,
            'totalIncome' => $income ?? 0,
            'totalExpense' => $expense ?? 0,
            'categories' => $categories,
            'transactionsTypes' => TransactionTypeEnum::getTransactionsTypes(),
            'myWallet' => $myWallet
        ]);

    }

    public function addToMyWallet(MyWalletData $data)
    {
        $category = $this->categoriesRepository->getById($data->category_id);

        if ($category->type == TransactionTypeEnum::EXPENSE) {
            $user_id = optional(Auth::user())->id;

            $myWallet = $this->walletsRepository->getByUserId($user_id);

            $result = $myWallet->groupBy('category.type')->map(fn($grouped) => $grouped->sum('amount'));

            $income = $result->get(TransactionTypeEnum::INCOME);

            $expense = $result->get(TransactionTypeEnum::EXPENSE);

            $available = $income - $expense;

            if ($available - $data->amount < 0){
                $error = ValidationException::withMessages(['amount' => ['you cant expense this amount']]);
                throw $error;
            }
        }


        $this->walletsRepository->store($data);

    }
}
