<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'type' => rand(1,3),
            'status' => rand(1,6),
            'start_date' => $this->faker->date(),
            'due_date' => $this->faker->date(),
            'assignee' => rand(1,50),
            'estimate' => $this->faker->randomFloat(1,1,10),
            'actual' => $this->faker->randomFloat(1,1,10),
        ];
    }
}
