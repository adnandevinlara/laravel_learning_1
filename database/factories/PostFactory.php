<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
$factory->define(Post::class, function (Faker $faker) {
	$min_user_id = DB::table('users')->min('id');
    $max_user_id = DB::table('users')->max('id');
    return [
        'title' => $this->faker->sentence,
        'body' => $this->faker->paragraph,
        'user_id' => $this->faker->numberBetween($min_user_id, $max_user_id),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
