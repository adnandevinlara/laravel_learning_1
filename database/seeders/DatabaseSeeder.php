<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(ProjectSeeder::class);
        // DB::table('users')->insert([
        //     'name' => 'Adnan Zaib',
        //     'email' => 'adnanzaib486@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);


        // $this->call(TagSeeder::class);
        $this->call([PostDataSeeder::class]);
    }
}
