<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $seller = Role::firstOrCreate(['name' => 'seller']);
        $supervisor = Role::firstOrCreate(['name' => 'supervisor']);
        $client = Role::firstOrCreate(['name' => 'client']);

        // Permissions
        $seeBuilding = Permission::firstOrCreate(['name' => 'see building']);
        $createBuilding = Permission::firstOrCreate(['name' => 'create building']);
        $editBuilding = Permission::firstOrCreate(['name' => 'edit building']);
        $deleteBuilding = Permission::firstOrCreate(['name' => 'delete building']);

        $createBundle = Permission::firstOrCreate(['name' => 'create bundle']);
        $editBundle = Permission::firstOrCreate(['name' => 'edit bundle']);
        $deleteBundle = Permission::firstOrCreate(['name' => 'delete bundle']);

        $createCard = Permission::firstOrCreate(['name' => 'create card']);
        $editCard = Permission::firstOrCreate(['name' => 'edit card']);
        $deleteCard = Permission::firstOrCreate(['name' => 'delete card']);

        $editCondition = Permission::firstOrCreate(['name' => 'edit condition']);

        $seeEquipment = Permission::firstOrCreate(['name' => 'see equipment']);
        $createEquipment = Permission::firstOrCreate(['name' => 'create equipment']);
        $editEquipment = Permission::firstOrCreate(['name' => 'edit equipment']);
        $deleteEquipment = Permission::firstOrCreate(['name' => 'delete equipment']);

        $seeImage = Permission::firstOrCreate(['name' => 'see image']);
        $createImage = Permission::firstOrCreate(['name' => 'create image']);
        $editImage = Permission::firstOrCreate(['name' => 'edit image']);
        $deleteImage = Permission::firstOrCreate(['name' => 'delete image']);

        $seeOrder = Permission::firstOrCreate(['name' => 'see order']);
        $createOrder = Permission::firstOrCreate(['name' => 'create order']);
        $editOrder = Permission::firstOrCreate(['name' => 'edit order']);
        $deleteOrder = Permission::firstOrCreate(['name' => 'delete order']);

        $seePlace = Permission::firstOrCreate(['name' => 'see place']);
        $createPlace = Permission::firstOrCreate(['name' => 'create place']);
        $editPlace = Permission::firstOrCreate(['name' => 'edit place']);
        $deletePlace = Permission::firstOrCreate(['name' => 'delete place']);

        $editSector = Permission::firstOrCreate(['name' => 'edit sector']);

        $editType = Permission::firstOrCreate(['name' => 'edit type']);

        // Rôles et permissions
        // admin
        $admin->givePermissionTo($createBuilding);
        $admin->givePermissionTo($deleteBuilding);

        // supervisor
        $supervisor->givePermissionTo($editSector);
        $supervisor->givePermissionTo($editType);
        $supervisor->givePermissionTo($seeBuilding);
        $supervisor->givePermissionTo($editBuilding);
        $supervisor->givePermissionTo($seeEquipment);
        $supervisor->givePermissionTo($createEquipment);
        $supervisor->givePermissionTo($editEquipment);
        $supervisor->givePermissionTo($deleteEquipment);
        $supervisor->givePermissionTo($editCondition);
        $supervisor->givePermissionTo($createPlace);
        $supervisor->givePermissionTo($editPlace);
        $supervisor->givePermissionTo($deletePlace);
        $supervisor->givePermissionTo($createCard);
        $supervisor->givePermissionTo($editCard);
        $supervisor->givePermissionTo($deleteCard);
        $supervisor->givePermissionTo($seeImage);
        $supervisor->givePermissionTo($createImage);
        $supervisor->givePermissionTo($editImage);
        $supervisor->givePermissionTo($deleteImage);

        // seller
        $seller->givePermissionTo($seeBuilding);
        $seller->givePermissionTo($seePlace);
        $seller->givePermissionTo($createBundle);
        $seller->givePermissionTo($editBundle);
        $seller->givePermissionTo($deleteBundle);

        // client
        $client->givePermissionTo($seeOrder);
        $client->givePermissionTo($createOrder);
        $client->givePermissionTo($editOrder);
        $client->givePermissionTo($deleteOrder);
    }
}
