<?php

namespace Database\Seeders;

use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //User create
        User::create([
            'name' => 'Hellomama',
            'email' => 'Hellomama@gmail.com',
            'password' => Hash::make('Hellomama93'),
            'created_at' => new DateTime()
        ]);

        User::factory()->times(20)->create();
    
        $this->call(
            [
                CarSeeder::class
            ]
        );
    }
}
