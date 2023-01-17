<?php

namespace Tests\Unit\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class RoleTest extends \Tests\TestCase
{
    use RefreshDatabase;

    public function test_table_exists()
    {
        $schema = Schema::hasTable('roles');

        $this->assertTrue($schema);
    }

    public function test_table_has_fields()
    {
        $schema = Schema::hasColumns('roles', [
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

        $this->assertDatabaseHas('roles', [
            'name' => 'Supervisor'
        ]);

        $this->assertDatabaseHas('roles', [
            'name' => 'Worker'
        ]);
    }
}
