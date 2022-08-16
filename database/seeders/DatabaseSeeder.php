<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Item;
use App\Models\Supplier;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Seed an example user
        $user = User::factory()->create([
            'name' => 'William',
            'email' => 'williamhazzard67@gmail.com',
            
        ]);

        //Seed an example supplier 
            $supplier = Supplier::factory()->create([
            'supplier_name' => 'Makro',
            'supplier_address' => '123 Warehouse Road',
            'supplier_city' => 'Belfast',
        ]);

        //Seed 6 items that are owned by this example user and this example supplier
        Item::factory(6)->create([
            'user_id' => $user->id,
            'supplier_id' => $supplier->id
        ]);

        //Seed 3 suppliers
        Supplier::factory(3)->create();

        //Seed roles and permissions table
        $this->call([
            RoleAndPermissionSeeder::class,
        ]);
        
    }
}
