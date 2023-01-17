<?php

namespace Tests\Unit\Models;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    public function test_table_exists()
    {
        $schema = Schema::hasTable('customers');

        $this->assertTrue($schema);
    }

    public function test_table_has_fields()
    {
        $schema = Schema::hasColumns('customers', [
            'id',
            'first_name',
            'last_name',
            'phone',
            'email',
            'street',
            'street_two',
            'city',
            'state',
            'zip',
            'created_at',
            'updated_at'
        ]);

        $this->assertTrue($schema);
    }

    private function call_customer_factory(): Customer
    {
        /**
         * @var Customer $model
         */
        return Customer::factory()->count(1)->create()->first();
    }

    public function test_factory_works()
    {
        $this->call_customer_factory();

        $this->assertDatabaseCount('customers', 1);
    }

    public function test_factory_seeds_street_two_with_integer()
    {
        $model = $this->call_customer_factory();

        $this->assertTrue(is_int($model->street_two));
    }

    public function test_factory_hits_all_fields()
    {
        /**
         * @var Customer $model
         */
        $model = Customer::factory()->count(1)->create()->first();

        $this->assertNotNull($model->first_name);
        $this->assertNotNull($model->last_name);
        $this->assertNotNull($model->phone);
        $this->assertNotNull($model->first_name);
        $this->assertNotNull($model->email);
        $this->assertNotNull($model->street);
        $this->assertNotNull($model->street_two);
        $this->assertNotNull($model->first_name);
        $this->assertNotNull($model->city);
        $this->assertNotNull($model->state);
        $this->assertNotNull($model->zip);
        $this->assertNotNull($model->notes);
        $this->assertNotNull($model->created_at);
        $this->assertNotNull($model->updated_at);
    }

    public function test_seeding_works()
    {
        \Artisan::call('db:seed --class=CustomerSeeder');

        $this->assertDatabaseCount('customers', 50);
    }
}
