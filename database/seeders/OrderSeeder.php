<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Bundle;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('orders')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Order::factory()->count(10)->create();

        foreach(Bundle::all() as $bundle) {
            if(fake()->boolean(40)){
                $order = Order::inRandomOrder()->first();
                $bundle->orders()->attach($order->id);
            }
        }


        $ord1 = Order::factory()->create([
            'user_id' => 4,
            "state_id"=>1,
        ]);

        $ord2 = Order::factory()->create([
            'user_id' => 4,
            "state_id"=>1,
        ]);

        $ord3 = Order::factory()->create([
            'user_id' => 4,
            "state_id"=>1,
        ]);


        for($i = 0 ; $i < 5 ; $i = $i + 1){

            DB::table('bundle_order')->insertOrIgnore(
                [
                    'bundle_id' => Order::inRandomOrder()->first()->id,
                    'order_id' => $ord1->id,
                ]
            );

        }

        for($i = 0 ; $i < 5 ; $i = $i + 1){

            DB::table('bundle_order')->insertOrIgnore(
                [
                    'bundle_id' => Order::inRandomOrder()->first()->id,
                    'order_id' => $ord2->id,
                ]
            );

        }

        for($i = 0 ; $i < 5 ; $i = $i + 1){

            DB::table('bundle_order')->insertOrIgnore(
                [
                    'bundle_id' => Order::inRandomOrder()->first()->id,
                    'order_id' => $ord3->id,
                ]
            );

        }
    
       
        



    }
}
