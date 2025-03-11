<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Condition;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('conditions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('conditions')->insert([
            'name' => "Fonctionnel",
        ]);

        DB::table('conditions')->insert([
            'name' => "Maintenance nécessaire",
        ]);

        DB::table('conditions')->insert([
            'name' => "En maintenance",
        ]);

        DB::table('conditions')->insert([
            'name' => "A remplacer",
        ]);
    }
}
