<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Sector;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('sectors')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('sectors')->insert([
            'name' => "Fruits et légumes",
        ]);
        DB::table('sectors')->insert([
            'name' => "Produits carnés",
        ]);
        DB::table('sectors')->insert([
            'name' => "Marée",
        ]);
        DB::table('sectors')->insert([
            'name' => "Produits laitiers et de la gastronomie",
        ]);
        DB::table('sectors')->insert([
            'name' => "Horticulture et décoration",
        ]);
        DB::table('sectors')->insert([
            'name' => "pôle logistique et tertaire",
        ]);
    }
}
