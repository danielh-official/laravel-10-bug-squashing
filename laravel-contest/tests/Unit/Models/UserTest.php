<?php

namespace Tests\Unit\Models;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_table_exists()
    {
        $schema = Schema::hasTable('users');

        $this->assertTrue($schema);
    }

    public function test_table_has_fields()
    {
        $schema = Schema::hasColumns('users', [
            'id',
            'name',
            'email',
            'email_verified_at',
            'password',
            'remember_token',
            'created_at',
            'updated_at'
        ]);

        $this->assertTrue($schema);
    }

    public function test_factory_hits_all_fields()
    {
        /**
         * @var User $model
         */
        $model = User::factory()->count(1)->create()->first();

        $this->assertNotNull($model->name);
        $this->assertNotNull($model->email);
        $this->assertNotNull($model->email_verified_at);
        $this->assertNotNull($model->password);
        $this->assertNotNull($model->created_at);
        $this->assertNotNull($model->updated_at);
    }

    public function test_factory_with_unverified_state()
    {
        /**
         * @var User $model
         */
        $model = User::factory()->count(1)->unverified()->create()->first();

        $this->assertNull($model->email_verified_at);
    }
}
