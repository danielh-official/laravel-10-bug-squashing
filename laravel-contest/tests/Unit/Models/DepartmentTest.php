<?php

namespace Tests\Unit\Models;

use App\Models\Employee;
use Database\Factories\EmployeeFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class DepartmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_table_exists()
    {
        $schema = Schema::hasTable('departments');

        $this->assertTrue($schema);
    }

    public function test_table_has_fields()
    {
        $schema = Schema::hasColumns('departments', [
            'id',
            'name',
            'notes',
            'created_at',
            'updated_at'
        ]);

        $this->assertTrue($schema);
    }
    public function test_defaults_seeded()
    {
        Artisan::call('db:seed');

        $this->assertDatabaseHas('departments', [
            'name' => 'Sales'
        ]);

        $this->assertDatabaseHas('departments', [
            'name' => 'Customer Service'
        ]);

        $this->assertDatabaseHas('departments', [
            'name' => 'Management'
        ]);
    }
}
