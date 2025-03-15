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

        $products = [
            "Pommes" => 1, "Harricots verts" => 1, "Cerises" => 1, "Brocolis" => 1,
            "Poulet" => 2, "Cuisse de bœuf" => 2, "Steak de bœuf" => 2, "Merguez" => 2, "Saucisse aux herbes" => 2,
            "Saumon" => 3, "Truite" => 3, "Colin" => 3, "Crevettes" => 3, "Poulpe cru" => 3, "Haddock fumé" => 3,
            "Lait de vache" => 4, "Lait de brebis" => 4, "Tomme de Savoie" => 4, "Brie à la truffe" => 4, "Saint Marcellin" => 4, "Spaghetti" => 4, "Cannelloni" => 4,
            "Roses" => 5, "Boîte à Pizza 29*29*4" => 5, "Jonquilles" => 5, "Sel Pastilles Pour Adoucisseur D'Eau" => 5, "Eau de javel 2,6%" => 5,
        ];
        $product = fake()->randomElement(array_keys($products));
        $sector = $products[$product];
        
        return [
            "product"=>$product,
            "quantity"=>fake()->numberBetween(5,100),
            "price"=>fake()->randomFloat(2),
            "validated"=>fake()->boolean(),
            "user_id"=>$user->id,
            "order_id"=>null,
            "unit_id"=>$unit->id,
            "sector_id"=>$sector,
        ];
    }
}
