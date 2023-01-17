<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * @return array[]
     */
    protected static function get_defaults(): array
    {
        return [
            [
                'name' => 'Supervisor'
            ],
            [
                'name' => 'Worker'
            ],
        ];
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->get_defaults() as $default) {
            Role::create([
                'name' => $default['name']
            ]);
        }
    }
}
