<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Bundle;
use App\Models\User;

class BundleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('bundles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Bundle::factory()->count(50)->create();



        Bundle::factory()->create([
            "product"=>"Choucroute",
            "quantity"=>10,
            "price"=>50,
            "validated"=>0,
            "user_id"=>3,
            "unit_id"=>1,
            "sector_id"=>1,
        ]);

        Bundle::factory()->create([
            "product"=>"Saucisse de Strasbourg",
            "quantity"=>30,
            "price"=>300,
            "validated"=>0,
            "user_id"=>3,
            "unit_id"=>1,
            "sector_id"=>1,
        ]);

        Bundle::factory()->create([
            "product"=>"Escargot",
            "quantity"=>20,
            "price"=>10,
            "validated"=>0,
            "user_id"=>3,
            "unit_id"=>1,
            "sector_id"=>1,
        ]);


    }
}
