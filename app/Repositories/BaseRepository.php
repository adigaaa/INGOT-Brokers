<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    /**
     * @return Model
     */
    abstract public function getModel(): Model;

    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->getModel()->where('id' , $id)->first();
    }

    public function getAll()
    {
        return $this->getModel()->all();
    }

}
