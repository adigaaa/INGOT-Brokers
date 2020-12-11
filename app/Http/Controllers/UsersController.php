<?php

namespace App\Http\Controllers;

use App\Http\DataTransferObjects\RegistrationUserData;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Services\Users\Contracts\UserServiceContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class UsersController
 * @package App\Http\Controllers
 */
class UsersController extends Controller
{
    /**
     * @var UserServiceContract
     */
    private UserServiceContract $userService;

    /**
     * UsersController constructor.
     * @param UserServiceContract $userService
     */
    public function __construct(UserServiceContract $userService)
    {
        $this->userService = $userService;
    }

    public function regisrationPage()
    {
        return view('Users.regisration-page');
    }
    /**
     * @param RegistrationRequest $request
     */
    public function register(RegistrationRequest $request)
    {
        $data = RegistrationUserData::fromRequest($request);

        $this->userService->createUser($data);

        return redirect()->route('home');
    }

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('user.home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');

    }
}
