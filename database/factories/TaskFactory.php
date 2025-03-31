<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\TaskStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'status_id' => fn() => TaskStatus::factory()->create()->id,
            'assigned_to_id' => fn() => User::factory()->create()->id,
            'created_by_id' => fn() => User::factory()->create()->id,
        ];
    }
}
