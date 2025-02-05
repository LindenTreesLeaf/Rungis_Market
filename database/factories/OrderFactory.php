<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\State;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        $state = State::inRandomOrder()->first();
        return [
            "date_passed"=>fake()->date(),
            "date_retrieve"=>fake()->date(),
            "user_id"=>$user->id,
            "state_id"=>$state->id,
        ];
    }
}
