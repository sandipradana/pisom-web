<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = [1,2];

        return [
            'name' => $this->faker->name,
            'password' => Hash::make('password'),
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'date_of_birth' => $this->faker->dateTimeThisCentury->format('Y-m-d'),
            'hospital_id' => "1",
            'staff_id' => "1",
            'gender' => $gender[array_rand($gender, 1)],
        ];
    }
}
