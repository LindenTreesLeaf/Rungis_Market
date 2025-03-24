<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Image;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('images')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('images')->insert([
            'description' => "Aubergines",
            'url' => "images/products/Aubergines-120.png"
        ]);
        DB::table('images')->insert([
            'description' => "Aubergines",
            'url' => "images/products/Aubergines-150.png"
        ]);

        DB::table('images')->insert([
            'description' => "Brocolis",
            'url' => "images/products/Brocolis-120.png"
        ]);
        DB::table('images')->insert([
            'description' => "Brocolis",
            'url' => "images/products/Brocolis-150.png"
        ]);

        DB::table('images')->insert([
            'description' => "Concombres",
            'url' => "images/products/Concombres-120.png"
        ]);
        DB::table('images')->insert([
            'description' => "Concombres",
            'url' => "images/products/Concombres-150.png"
        ]);

        DB::table('images')->insert([
            'description' => "Orchidées séchées",
            'url' => "images/products/orchidees-sechees-120.png"
        ]);
        DB::table('images')->insert([
            'description' => "Orchidées séchées",
            'url' => "images/products/orchidees-sechees-150.png"
        ]);
    }
}
