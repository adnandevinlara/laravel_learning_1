<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Auther;
class AutherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	Auther::create([
       		'name' => 'Adnan Auther',
       		'email' => 'adnanauth@gmail.com',
       		'password' => Hash::make('password')
       	]);
    }
}
