<?php

namespace Tests\Unit;

use App\Models\User;
use Artisan;
use Database\Seeders\DepartmentSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestSeederTest extends \Tests\TestCase
{
    use RefreshDatabase;

    public function test()
    {
        Artisan::call('db:seed --class=TestSeeder');

        $this->assertDatabaseCount('users', 10);

        $this->assertDatabaseCount('departments', 3);

        $this->assertDatabaseCount('roles', 2);

        $this->assertDatabaseCount('employees', 25);

        $this->assertDatabaseCount('customers', 50);
    }
}
