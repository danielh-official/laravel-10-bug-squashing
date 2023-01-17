<?php

namespace Tests\Unit\Models;

use Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommunicationOptionTest extends TestCase
{
    use RefreshDatabase;

    public function test_seeding_works()
    {
        Artisan::call('db:seed --class=CommunicationOptionSeeder');

        $this->assertDatabaseCount('communication_options', 2);
    }
}
