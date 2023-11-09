<?php

use Illuminate\Database\Seeder;
use App\Post;
class PostDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()->count(8)->create(); // this line work in laravel 8
        factory(Post::class, 8)->create(); // this will work in laravel 7
    }
}
