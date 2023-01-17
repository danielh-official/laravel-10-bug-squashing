<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();

        $this->call([
            DepartmentSeeder::class,
            RoleSeeder::class,
            EmployeeSeeder::class,
            CustomerSeeder::class
        ]);
    }
}
