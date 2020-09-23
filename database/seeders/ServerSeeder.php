<?php

namespace Database\Seeders;

use App\Models\Server;
use Illuminate\Database\Seeder;

class ServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Server::create([
            'ip' => '143.110.188.81',
            'port' => '22',
            'username' => 'root',
            'password' => 'FS*C-qc8LJqCu5A',
        ]);
    }
}
