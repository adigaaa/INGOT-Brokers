<?php

namespace App\Http\Controllers;

use App\Http\DataTransferObjects\MyWalletData;
use App\Http\Requests\AddToMyWalletRequest;
use App\Services\Wallets\WalletsService;

class WalletController extends Controller
{
    /**
     * @var WalletsService
     */
    private WalletsService $walletsService;

    /**
     * WalletController constructor.
     * @param WalletsService $walletsService
     */
    public function __construct(WalletsService $walletsService)
    {
        $this->walletsService = $walletsService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function myWallet()
    {
        $data = $this->walletsService->getWalletInfo();

        return view('wallet', compact('data'));
    }

    public function addToMyWallet(AddToMyWalletRequest $request)
    {
        $data = MyWalletData::fromRequest($request);
        $this->walletsService->addToMyWallet($data);

        return redirect()->back();
    }
}
