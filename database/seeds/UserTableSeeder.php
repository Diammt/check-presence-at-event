<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Create 1 admin, 2 assistants, 10 clients
     * @return void
     */
    public function run()
    {

        Role::create(['name' => "ADMIN"]);
        Role::create(['name' => "ASSISTANT"]);
        Role::create(['name' => "CLIENT"]);

        // Create admin
        $user = User::create([
                    "lastname" => "admin",
                    "firstname" => "admin",
                    "active" => true,
                    "email" => "admin0@gmail.com",
                    "password" => Hash::make("adminadmin")
                ]);
        $user->assignRole("ADMIN");
        $user->assignRole("ASSISTANT");

        // Create assistants
        $user =  User::create([
                    "lastname" => "assistant1",
                    "firstname" => "assistant1",
                    "active" => true,
                    "email" => "assistant1@gmail.com",
                    "password" => Hash::make("assistant")
                ]);
        $user->assignRole("ASSISTANT");

        $user = User::create([
                    "lastname" => "assistant2",
                    "firstname" => "assistant2",
                    "active" => true,
                    "email" => "assistant2@gmail.com",
                    "password" => Hash::make("assistant")
                ]);
        $user->assignRole("ASSISTANT");

        // Create client
        for ($i=0; $i < NB_CLIENTS; $i++) {
            $user = factory(User::class)->create();
            $user->assignRole("CLIENT");
        }
    }
}
