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
        //roles
        $admin = Role::create(['name' => 'admin']);
        $seller = Role::create(['name' => 'seller']);
        $supervisor = Role::create(['name' => 'supervisor']);
        $client = Role::create(['name' => 'client']);

        //permissions
        // $seeBuilding = Permission::create(['name' => 'see building']);
        $createBuilding = Permission::create(['name' => 'create building']);
        $editBuilding = Permission::create(['name' => 'edit building']);
        $deleteBuilding = Permission::create(['name' => 'delete building']);

        // $seeBundle = Permission::create(['name' => 'see bundle']);
        $createBundle = Permission::create(['name' => 'create bundle']);
        $editBundle = Permission::create(['name' => 'edit bundle']);
        $deleteBundle = Permission::create(['name' => 'delete bundle']);

        // $seeCard = Permission::create(['name' => 'see card']);
        $createCard = Permission::create(['name' => 'create card']);
        $editCard = Permission::create(['name' => 'edit card']);
        $deleteCard = Permission::create(['name' => 'delete card']);

        $seeCondition = Permission::create(['name' => 'see condition']);
        $createCondition = Permission::create(['name' => 'create condition']);
        $editCondition = Permission::create(['name' => 'edit condition']);
        $deleteCondition = Permission::create(['name' => 'delete condition']);

        $seeEquipment = Permission::create(['name' => 'see equipment']);
        $createEquipment = Permission::create(['name' => 'create equipment']);
        $editEquipment = Permission::create(['name' => 'edit equipment']);
        $deleteEquipment = Permission::create(['name' => 'delete equipment']);

        $seeOrder = Permission::create(['name' => 'see order']);
        $createOrder = Permission::create(['name' => 'create order']);
        $editOrder = Permission::create(['name' => 'edit order']);
        $deleteOrder = Permission::create(['name' => 'delete order']);

        $seePlace = Permission::create(['name' => 'see place']);
        $createPlace = Permission::create(['name' => 'create place']);
        $editPlace = Permission::create(['name' => 'edit place']);
        $deletePlace = Permission::create(['name' => 'delete place']);

        // $seeSector = Permission::create(['name' => 'see sector']);
        // $createSector = Permission::create(['name' => 'create sector']);
        $editSector = Permission::create(['name' => 'edit sector']);
        // $deleteSector = Permission::create(['name' => 'delete sector']);

        // $seeState = Permission::create(['name' => 'see state']);
        // $createState = Permission::create(['name' => 'create state']);
        // $editState = Permission::create(['name' => 'edit state']);
        // $deleteSate = Permission::create(['name' => 'delete state']);

        // $seeType = Permission::create(['name' => 'see type']);
        $createType = Permission::create(['name' => 'create type']);
        $editType = Permission::create(['name' => 'edit type']);
        $deleteType = Permission::create(['name' => 'delete type']);

        // $seeUnit = Permission::create(['name' => 'see unit']);
        // $createUnit = Permission::create(['name' => 'create unit']);
        // $editUnit = Permission::create(['name' => 'edit unit']);
        // $deleteUnit = Permission::create(['name' => 'delete unit']);

        //admin
        // $admin->givePermissionTo($createUnit);
        // $admin->givePermissionTo($editUnit);
        // $admin->givePermissionTo($deleteUnit);
        $admin->givePermissionTo($createBuilding);
        $admin->givePermissionTo($deleteBuilding);
        // $admin->givePermissionTo($createSector);
        // $admin->givePermissionTo($deleteSector);
        $admin->givePermissionTo($createType);
        $admin->givePermissionTo($deleteType);
        // $admin->givePermissionTo($createState);
        // $admin->givePermissionTo($editState);
        // $admin->givePermissionTo($deleteSate);
        $admin->givePermissionTo($createCondition);
        $admin->givePermissionTo($deleteCondition);

        //supervisor
        $supervisor->givePermissionTo($editSector);
        $supervisor->givePermissionTo($editType);
        $supervisor->givePermissionTo($editBuilding);
        $supervisor->givePermissionTo($seeEquipment);
        $supervisor->givePermissionTo($createEquipment);
        $supervisor->givePermissionTo($editEquipment);
        $supervisor->givePermissionTo($deleteEquipment);
        $supervisor->givePermissionTo($seeCondition);
        $supervisor->givePermissionTo($editCondition);
        $supervisor->givePermissionTo($seePlace);
        $supervisor->givePermissionTo($createPlace);
        $supervisor->givePermissionTo($editPlace);
        $supervisor->givePermissionTo($deletePlace);
        $supervisor->givePermissionTo($createCard);
        $supervisor->givePermissionTo($editCard);
        $supervisor->givePermissionTo($deleteCard);

        //seller
        $seller->givePermissionTo($seePlace);
        $seller->givePermissionTo($createBundle);
        $seller->givePermissionTo($editBundle);
        $seller->givePermissionTo($deleteBundle);

        //client
        $client->givePermissionTo($seeOrder);
        $client->givePermissionTo($createOrder);
        $client->givePermissionTo($editOrder);
        $client->givePermissionTo($deleteOrder);
    }
}
