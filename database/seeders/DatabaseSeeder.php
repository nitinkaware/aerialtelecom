<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'Nitin Kaware',
            'password' => bcrypt('password'),
            'email' => 'aerialtelecom@admin.com'
        ]);

        $this->call(RouterSeeder::class);
        $this->call(ServerSeeder::class);
    }
}
