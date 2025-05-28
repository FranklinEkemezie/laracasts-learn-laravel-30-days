<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Job>
 */
class JobFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            //
            'title'         => fake()->jobTitle(),
            'salary'        => '$50,000',
            'employer_id'   => fake()->randomElement(Employer::pluck('id')->toArray())
        ];
    }
}
