<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role;
      $role->name = 'Admin';
      $role->save();

      $user = new User;
      $user->name = "admin";
      $user->email = "admin@admin.com";
      $user->password = bcrypt('password');
      $user->role_id = Role::whereName('Admin')->first()->id;
      $user->save();
    }
}
