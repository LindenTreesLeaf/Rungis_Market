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
        $users = User::role('seller')->get();
        $unit = Unit::inRandomOrder()->first();
        $products = [
            "Pommes" => 1, "Harricots verts" => 1, "Cerises" => 1, "Brocolis" => 1, "Truffes entières" => 1, "Igname" => 1, "Courgettes" => 1, "Courgettes rondes" => 1, "Aubergines" => 1, "Concombres" => 1, "Pousse de Soja" => 1,
            "Sauté d'Agneau" => 2, "Souris d'Agneau" => 2, "Terrine Foie Gras mi-cuit" => 2, "Manchon de Canard" => 2, "Jambon Cuit à la Truffe" => 2, "Saucisson Sec Court d'Auvergne" => 2,
            "Chute de Saumon Fumée" => 3, "Truite fumée tranché" => 3, "Bar Élevage" => 3, "Crevettes Rose Cuite" => 3, "Tentacules de Poulpe cuits" => 3, "Salade de Calamar à la niçoise" => 3, "Corail d'Oursin Pur" => 3,
            "Lait de vache" => 4, "Lait de brebis" => 4, "Tomme de Savoie" => 4, "Brie à la truffe" => 4, "Saint Marcellin" => 4, "Spaghetti" => 4, "Cannelloni" => 4, "Huile d'Olive Extra Vierge" => 4, "Pain burger premium sésame" => 4, "Tapenade Piment d'Espelette" => 4,
            "Roses rouges coupées" => 5, "Jonquilles en pot" => 5, "Lys en bouquet" => 5, "Orchidées séchées" => 5, "Pensées en pot" => 5,
        ];
        $product = fake()->randomElement(array_keys($products));
        $sector = $products[$product];
        
        return [
            "product"=>$product,
            "quantity"=>fake()->numberBetween(5,100),
            "price"=>fake()->randomFloat(2),
            "validated"=>fake()->boolean(),
            "user_id"=>fake()->randomElement($users)->id,
            "unit_id"=>$unit->id,
            "sector_id"=>$sector,
        ];
    }
}
