<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'tomimate',
        'email' => 'tomshieff@gmail.com',
        'password' => '$2y$10$WSdCIKv6M8br6vATFwq8guoNqSoI4Jz.jGfNKhdMuL2m2mz5Y3RK2',
        'user_pic' => 'default-avatar.jpg',
        'address_id' => '1',
        'cart_id' => '1',
        'remember_token' => Hash::make('tomtomtom'),
        'type' => App\User::ADMIN_TYPE,
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      ]);

      DB::table('carts')->insert([
        'user_id' => '1',
        'is_active' => '1',
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      ]);
    }
}
