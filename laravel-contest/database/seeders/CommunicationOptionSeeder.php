<?php

namespace Database\Seeders;

use App\Models\CommunicationOption;
use Illuminate\Database\Seeder;

class CommunicationOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $options = [
            'phone',
            'email'
        ];

        foreach ($options as $option) {
            CommunicationOption::create([
                'name' => $option
            ]);
        }
    }
}
