<?php

namespace App\Interfaces;

interface CarRepositoryInterface 
{
    public function getAll();
    public function getById($id);
    public function delete($id);
    public function create(array $carDetails);
    public function update($id, array $carDetails);
}