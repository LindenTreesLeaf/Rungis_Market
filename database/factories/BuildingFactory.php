<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sector;
use App\Models\Type;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Building>
 */
class BuildingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $letters = ['A', 'B', 'C', 'D', 'E', 'F'];
        $name = (string)(fake()->randomElement($letters)).(string)(fake()->numberBetween(1,20));
        $sector = Sector::inRandomOrder()->first();
        $type = Type::inRandomOrder()->first();
        return [
            "name"=>$name,
            "sector_id"=>$sector->id,
            "type_id"=>$type->id,
        ];
    }
}
