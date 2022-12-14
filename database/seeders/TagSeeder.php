<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
        	[
        		'name' => 'PHP',
        		'slug' => 'php',
        		'created_at' => now(),
        		'updated_at' => now(),
        	],
        	[
        		'name' => 'LARAVEL',
        		'slug' => 'laravel',
        		'created_at' => now(),
        		'updated_at' => now(),
        	],
        	[
        		'name' => 'Livewire',
        		'slug' => 'livewire',
        		'created_at' => now(),
        		'updated_at' => now(),
        	]
        ]);
    }
}
