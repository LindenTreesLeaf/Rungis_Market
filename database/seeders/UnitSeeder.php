<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('units')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('units')->insert([
            'name_u' => "kg",
        ]);

        DB::table('units')->insert([
            'name_u' => "g",
        ]);

        DB::table('units')->insert([
            'name_u' => "L",
        ]);
    }
}
