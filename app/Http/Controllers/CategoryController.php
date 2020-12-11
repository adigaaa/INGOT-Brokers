<?php

namespace App\Http\Controllers;

use App\Enums\TransactionTypeEnum;
use App\Http\DataTransferObjects\CategoryData;
use App\Http\Requests\CreateCategoryRequest;
use App\Services\Categories\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @var CategoryService
     */
    private CategoryService $categoryService;

    /**
     * CategoryController constructor.
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function addCategoryPage()
    {
        $transactionsTypes = TransactionTypeEnum::getTransactionsTypes();
        return view('category', compact('transactionsTypes'));
    }


    public function createCategory(CreateCategoryRequest $request)
    {
        $categoryData = CategoryData::fromRequest($request);

        $this->categoryService->createCategory($categoryData);
        return redirect()->route('user.home');
    }
}
