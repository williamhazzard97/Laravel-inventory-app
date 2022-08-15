<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Item;

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

        //Seed 6 items that are owned by this user
        Item::factory(6)->create([
            'user_id' => $user->id
        ]);

        //Seed roles and permissions table
        $this->call([
            RoleAndPermissionSeeder::class,
        ]);
        
    }
}
