<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Car;
use App\Models\User;

class CarTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_fetching_all_car_default_return_value()
    {
        //Login to get token 
        $user = User::first();
        $responseUserLogin = $this->postJson('/api/auth/login', ['email' => $user['email'], 'password' => 'Hellomama93']);

        $responseGetAllCar = $this->withHeaders([
            'Authorization' => 'Bearer ' . $responseUserLogin['access_token'],
        ])->getJson('/api/car/getAll');


        $responseGetAllCar->assertStatus(200);
    }

    public function test_fetching_all_car_default_limit_10()
    {
        //Login to get token 
        $user = User::first();
        $responseUserLogin = $this->postJson('/api/auth/login', ['email' => $user['email'], 'password' => 'Hellomama93']);

        $responseGetAllCar = $this->withHeaders([
            'Authorization' => 'Bearer ' . $responseUserLogin['access_token'],
        ])->getJson('/api/car/getAll?page=1&limit=15');

        $this->assertCount(10, $responseGetAllCar['data']['data']);
        $responseGetAllCar->assertStatus(200);
    }
}
