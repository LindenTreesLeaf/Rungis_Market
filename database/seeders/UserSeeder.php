<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        //admin
        User::factory()->create([
            'name' => 'Doja Cat',
            'email' => 'doja@cat.us',
        ]);
        $doja = User::where('name', '=', 'Doja Cat')->first();
        $doja->assignRole('admin');

        //supervisor
        User::factory()->create([
            'name' => 'Ariana Grande',
            'email' => 'ariana@grande.us',
        ]);
        $ariana = User::where('name', '=', 'Ariana Grande')->first();
        $ariana->assignRole('supervisor');

        //seller
        User::factory()->create([
            'name' => 'Cardi B',
            'email' => 'cardi@b.us',
        ]);
        $cardi = User::where('name', '=', 'Cardi B')->first();
        $cardi->assignRole('seller');

        //client
        User::factory()->create([
            'name' => 'Flo Milli',
            'email' => 'flo@milli.us',
        ]);
        $flo = User::where('name', '=', 'Flo Milli')->first();
        $flo->assignRole('client');

        User::factory()->count(10)->create();
    }
}
