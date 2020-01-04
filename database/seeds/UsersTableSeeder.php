<?php

use Illuminate\Database\Seeder;

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
        'user_pic' => '2vcjL3ppQykgnkWo76qbRNrNfU2Gymr8XFmqpzhi.jpeg',
        'address_id' => '1',
        'remember_token' => 'JdFWYhEeI0EdSB2ibtMmRtkAskxQEZoh8IwlT9pXigJMs5Pcze7yujBUwcws',
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      ]);
    }
}
