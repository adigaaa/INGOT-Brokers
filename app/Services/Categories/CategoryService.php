<?php


namespace App\Services\Categories;


use App\Http\DataTransferObjects\CategoryData;
use App\Repositories\Categories\CategoriesRepository;

class CategoryService
{
    /**
     * @var CategoriesRepository
     */
    private CategoriesRepository $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function createCategory(CategoryData $categoryData)
    {
        $this->categoriesRepository->store($categoryData);
    }
}
