<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * @return array[]
     */
    protected static function get_defaults(): array
    {
        return [
            [
                'name' => 'Sales'
            ],
            [
                'name' => 'Customer Service'
            ],
            [
                'name' => 'Management'
            ]
        ];
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->get_defaults() as $default) {
            Department::create([
                'name' => $default['name']
            ]);
        }
    }
}
