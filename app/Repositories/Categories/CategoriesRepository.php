<?php


namespace App\Repositories\Categories;


use App\Http\DataTransferObjects\CategoryData;
use App\Models\Category;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class CategoriesRepository extends BaseRepository
{
    /**
     * @return Model
     */
    public function getModel(): Model
    {
        return new Category();
    }

    public function store(CategoryData $categoryData)
    {
        $this->getModel()->create($categoryData->all());
    }



}
