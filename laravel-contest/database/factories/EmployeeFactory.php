<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use Faker\Generator;
use Faker\Provider\en_US\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * @var \Faker\Factory|Generator|Person
     */
    protected $faker;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'social_security_number' => $this->faker->ssn(),
            'drivers_license_number' => $this->faker->randomNumber(8),
            'street' => $this->faker->streetAddress,
            'street_two' => $this->faker->randomNumber(1),
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'zip' => $this->faker->postcode,
            'alias_first_name' => $this->faker->firstName,
            'alias_last_name' => $this->faker->lastName,
            'work_email' => $this->faker->email,
            'work_phone' => $this->faker->phoneNumber,
            'first_started_at' => $this->faker->date,
            'is_terminated' => $this->faker->boolean,
            'notes' => $this->faker->paragraph
        ];

        if (User::exists()) {
            $data['user_id'] = User::inRandomOrder()->first()->id;
        }

        if (Department::exists()) {
            $data['department_id'] = Department::inRandomOrder()->first()->id;
        }

        if (Role::exists()) {
            $data['role_id'] = Role::inRandomOrder()->first()->id;
        }

        return $data;
    }
}
