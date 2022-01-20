<?php

namespace App\Http\Controllers;

use App\Interfaces\CarRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class CarController extends Controller
{
    private CarRepositoryInterface $carRepository;

    //Todo Verifying token in header
    public function __construct(CarRepositoryInterface $carRepository) 
    {
        $this->carRepository = $carRepository;
    }
    
    public function index(): JsonResponse 
    {
        $pagination = [
            'limit' => $_GET['limit'] ?? 10,
            'page' => $_GET['page'] ?? 1
        ];

        return response()->json([
            'data' => $this->carRepository->getAllPagination($pagination)
        ]);
    }

}
