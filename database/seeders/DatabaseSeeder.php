<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            StateSeeder::class,
            SectorSeeder::class,
            CardSeeder::class,
            TypeSeeder::class,
            UnitSeeder::class,
            ConditionSeeder::class,
            BundleSeeder::class,
            OrderSeeder::class,
            BuildingSeeder::class,
            EquipmentSeeder::class,
            PlaceSeeder::class,
        ]);
    }
}
