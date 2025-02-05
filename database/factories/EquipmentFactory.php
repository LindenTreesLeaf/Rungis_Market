<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Building;
use App\Models\Condition;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipment>
 */
class EquipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $building = Building::inRandomOrder()->first();
        $condition = Condition::inRandomOrder()->first();
        return [
            "name"=>fake()->word(),
            "last_revision"=>fake()->date(),
            "next_revision"=>fake()->date(),
            "building_id"=>$building->id,
            "condition_id"=>$condition->id,
        ];
    }
}
