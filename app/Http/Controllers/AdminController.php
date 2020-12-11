<?php

namespace App\Http\Controllers;

use App\Services\Admin\AdminService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * @var AdminService
     */
    private AdminService $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index()
    {
        $users =  $this->adminService->getUsersDetails();
        return view('admin', compact('users'));
    }
}
