<?php

namespace App\Repositories;

use App\Interfaces\CarRepositoryInterface;
use App\Models\Car;

class CarRepository implements CarRepositoryInterface
{
    public function getAll()
    {
        return Car::simplePaginate(10);
    }

    public function getAllPagination($pagination)
    {
        return Car::orderBy('id', 'DESC')->paginate($pagination['limit'], ['*'], 'page', $pagination['page']);
    }

    public function getById($id)
    {
        return Car::findOrFail($id);
    }

    public function delete($id)
    {
        return Car::destroy($id);
    }

    public function create(array $carDetails) {
        return Car::create($carDetails);
    }

    public function update($id, array $carDetails) {
        return Car::whereId($id)->update($carDetails);
    }
}   
