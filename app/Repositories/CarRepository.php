<?php

namespace App\Repositories;

use App\Interfaces\CarRepositoryInterface;
use App\Models\Car;

class CarRepository implements CarRepositoryInterface
{
    public function getAll()
    {
        return Car::all();
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
