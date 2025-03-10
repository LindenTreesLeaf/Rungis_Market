<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Unit;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bundle>
 */
class BundleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first(); //récupérer les vendeurs plutôt que n'importe quel utilisateur
        $unit = Unit::inRandomOrder()->first();
        return [
            "product"=>fake()->sentence(3),
            "quantity"=>fake()->numberBetween(5,100),
            "price"=>fake()->randomFloat(2),
            "validated"=>fake()->boolean(),
            "user_id"=>$user->id,
            "order_id"=>null,
            "unit_id"=>$unit->id,
        ];
    }
}
