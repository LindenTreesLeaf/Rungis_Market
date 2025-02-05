<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('states')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('states')->insert([
            'name' => "En cours",
        ]);
        DB::table('states')->insert([
            'name' => "A récupérer",
        ]);
        DB::table('states')->insert([
            'name' => "Récupéré",
        ]);
        DB::table('states')->insert([
            'name' => "Annulé",
        ]);
    }
}
