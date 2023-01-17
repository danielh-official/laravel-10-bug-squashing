<?php

namespace Tests\Unit\Models;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    public function test_table_exists()
    {
        $schema = Schema::hasTable('employees');

        $this->assertTrue($schema);
    }

    public function test_table_has_fields()
    {
        $schema = Schema::hasColumns('employees', [
            'id',
            'first_name',
            'last_name',
            'phone',
            'email',
            'social_security_number',
            'drivers_license_number',
            'street',
            'street_two',
            'city',
            'state',
            'zip',
            'alias_first_name',
            'alias_last_name',
            'work_email',
            'work_phone',
            'user_id',
            'department_id',
            'role_id',
            'first_started_at',
            'is_terminated',
            'notes',
            'created_at',
            'updated_at'
        ]);

        $this->assertTrue($schema);
    }

    public function test_factory_works()
    {
        Employee::factory()->count(1)->create()->first();

        $this->assertDatabaseCount('employees', 1);
    }

    public function test_factory_user_id_is_null()
    {
        Employee::factory()->count(1)->create()->first();

        $this->assertDatabaseHas('employees', [
            'user_id' => null
        ]);
    }

    public function test_factory_department_id_is_null()
    {
        Employee::factory()->count(1)->create()->first();

        $this->assertDatabaseHas('employees', [
            'department_id' => null
        ]);
    }

    public function test_factory_role_id_is_null()
    {
        Employee::factory()->count(1)->create()->first();

        $this->assertDatabaseHas('employees', [
            'role_id' => null
        ]);
    }

    public function test_ssn_is_encrypted()
    {
        /**
         * @var Employee $model
         */
        $model = Employee::factory()->count(1)->create([
            'social_security_number' => '12345678'
        ])->first();

        $this->assertNotEquals($model->social_security_number, $model->getRawOriginal('social_security_number'));
    }

    public function test_drivers_license_number_is_encrypted()
    {
        /**
         * @var Employee $model
         */
        $model = Employee::factory()->count(1)->create([
            'drivers_license_number' => '1234-5445-3433-2334'
        ])->first();

        $this->assertNotEquals($model->drivers_license_number, $model->getRawOriginal('drivers_license_number'));
    }

    public function test_factory_hits_all_fields()
    {
        /**
         * @var Employee $model
         */
        $model = Employee::factory()->count(1)->create()->first();

        $this->assertNotNull($model->first_name);
        $this->assertNotNull($model->last_name);
        $this->assertNotNull($model->phone);
        $this->assertNotNull($model->first_name);
        $this->assertNotNull($model->email);
        $this->assertNotNull($model->social_security_number);
        $this->assertNotNull($model->drivers_license_number);
        $this->assertNotNull($model->street);
        $this->assertNotNull($model->street_two);
        $this->assertNotNull($model->first_name);
        $this->assertNotNull($model->city);
        $this->assertNotNull($model->state);
        $this->assertNotNull($model->zip);
        $this->assertNotNull($model->alias_first_name);
        $this->assertNotNull($model->alias_last_name);
        $this->assertNotNull($model->work_email);
        $this->assertNotNull($model->work_phone);
        $this->assertNotNull($model->first_started_at);
        $this->assertNotNull($model->is_terminated);
        $this->assertNotNull($model->notes);
        $this->assertNotNull($model->created_at);
        $this->assertNotNull($model->updated_at);
    }

    public function test_seeding_works()
    {
        \Artisan::call('db:seed --class=EmployeeSeeder');

        $this->assertDatabaseCount('employees', 25);
    }

    public function test_factory_with_existing_users()
    {
        User::factory()->count(10)->create();

        /**
         * @var Employee $model
         */
        $model = Employee::factory()->count(1)->create()->first();

        $this->assertNotNull($model->user_id);
    }

    public function test_factory_with_existing_departments()
    {
        Artisan::call('db:seed --class=DepartmentSeeder');

        /**
         * @var Employee $model
         */
        $model = Employee::factory()->count(1)->create()->first();

        $this->assertNotNull($model->department_id);
    }

    public function test_factory_with_existing_roles()
    {
        Artisan::call('db:seed --class=RoleSeeder');

        /**
         * @var Employee $model
         */
        $model = Employee::factory()->count(1)->create()->first();

        $this->assertNotNull($model->role_id);
    }
}
