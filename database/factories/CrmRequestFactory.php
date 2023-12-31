<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CrmRequest;
use App\Models\ClientUser;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class CrmRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'created_by' => rand(41, 43), // Assuming you have user IDs 1-5 in the users table
            'assigned_to' => rand(41, 43), // Assuming you have user IDs 1-5 in the users table
            'member_id' => rand(37, 47), // Assuming you have member IDs 1-10 in the members table
            'task_type' => $this->faker->randomElement(['contact', 'visit', 'free pass']),
            'due_date' => $this->faker->dateTimeBetween('now', '+30 days')->format('Y-m-d'),
            'priority' => $this->faker->randomElement(['low', 'medium', 'high']),
            'stage' => $this->faker->randomElement(['New Lead', 'New Prospect','Contact Mode','New Member','Not Subscribed']),
            'interested_in' => $this->faker->randomElement(['membership', 'pt']),
            'contact_date' => $this->faker->dateTimeBetween('-30 days', 'now')->format('Y-m-d'),
            'visit_date' => $this->faker->dateTimeBetween('-30 days', 'now')->format('Y-m-d'),
            'subscription_date' => $this->faker->dateTimeBetween('-30 days', 'now')->format('Y-m-d'),
            'cancel_date' => $this->faker->dateTimeBetween('-30 days', 'now')->format('Y-m-d'),
        ];
    }
}
