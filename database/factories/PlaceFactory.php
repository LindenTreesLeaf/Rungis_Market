<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Building;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $building = Building::inRandomOrder()->first();
        $name = (string)($building->name).(string)(fake()->numberBetween(1,50));
        return [
            "name"=>$name,
            "building_id"=>$building->id,
        ];
    }
}
