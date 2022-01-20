<?php

namespace App\Http\Controllers;

use App\Interfaces\CarRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class CarController extends Controller
{
    private CarRepositoryInterface $carRepository;

    public function __construct(CarRepositoryInterface $carRepository) 
    {
        $this->carRepository = $carRepository;
    }

    public function index(): JsonResponse 
    {
        return response()->json([
            'data' => $this->carRepository->getAll()
        ]);
    }

}
