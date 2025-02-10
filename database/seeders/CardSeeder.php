<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Card;
use App\Models\User;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('cards')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('cards')->insert([
            'tier' => "Acheteur",
        ]);
        DB::table('cards')->insert([
            'tier' => "Découverte",
        ]);

        date_default_timezone_set('UTC');
        foreach(User::all() as $user) {
            $card = Card::inRandomOrder()->take(1)->pluck('id');
            $user->cards()->attach($card, ['start'=>date('Y-m-d'), 'end'=>date("Y-m-d", mktime(0, 0, 0, date("m")+1, date("d"),   date("Y")))]);
        }
    }
}
