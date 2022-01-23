<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_user_login_succesfully()
    {
        $user = User::first();
        $response = $this->postJson('/api/auth/login', ['email' => $user['email'], 'password' => 'Hellomama93']);
        $response->assertStatus(200);
    }

    public function test_user_login_failed()
    {
        $user = User::first();
        $response = $this->postJson('/api/auth/login', ['email' => $user['email'], 'password' => 'test']);
        $response->assertStatus(422);
    }

    public function test_user_login_missing_values()
    {
        $user = User::first();
        $response = $this->postJson('/api/auth/login', ['email' => $user['email']]);
        $response->assertStatus(422);
    }
}
