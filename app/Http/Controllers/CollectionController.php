<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CollectionController extends Controller
{
	const PROJECT_TYPES = [
		'action',
		'base resource',
		'A W S',
		'lara beans'
	];

	const MOVIES_TYPES = [
		['id'=>1,'name'=>'action'],
		['id'=>2,'name'=>'base resource'],
		['id'=>3,'name'=>'A W S'],
		['id'=>4,'name'=>'lara beans']
	];
    function mapWithSlugs() {
    	dump('Convert name of arrays into slug using Slug function and iterate array with map function');
    	$slugs = [];
    	foreach(self::PROJECT_TYPES as $name){
    		$slugs[] = Str::slug($name);
    	}

    	return $slugs;

    	return collect(self::PROJECT_TYPES)->map(function ($name) {
    		return 'ESE_'.Str::slug($name);
    	})->toArray();
    }

    function mapWithKeys() {
    	dump('Convert value of arrays into keys. And also make other index value to someother key value using mapWithKeys method, Note: it will return us object');
    	return collect(self::MOVIES_TYPES)
    	->mapWithKeys(function ($name) {
    		return [$name['id'] => Str::slug($name['name'])];
    	})->toArray();

    	//output : {"1":"action","2":"base-resource","3":"a-w-s","4":"lara-beans"}
    }

    function eachMethod(){
    	dump("This is seeder example where we can create 'users' than for each other create 'listing' than assign/attach these listing with 'tags'.");
    	$tags = Tag::factory(20)->create();

    	User::factory(10)->create()->each(function ($user) use($tags) {
    		Listing::factory(rand(1,4)->create([
    			'user_id' => $user->id
    		]))->each(function ($listing) use($tags) {
    			$listing->tags()->attach($tags->random(2));
    		});
    	});
    }

    function pushMethod(){
    	$old_movies = self::MOVIES_TYPES;
    	$new_movies = collect();

    	collect($old_movies)->map(function($old_movies) use($new_movies) {
    		$new_movies->push($old_movies['name']);
    	});

    	return $new_movies[2];
    }

    function filterMethod() {
    	$collection = collect([
    		['name'=>'adnan','age'=>18],
    		['name'=>'zaib','age'=>20],
    		['name'=>'arsalan','age'=>12],
    		['name'=>'rao','age'=>11]
    	]);

    	$filtered = $collection->filter(function ($name) {
    		return substr($name['name'], 0,1) == 'A' || substr($name['name'], 0,1) == 'a' && $name['age'] >= 18;

    	});
    	// to json
    	return $filtered->values()->all();
    }

    function pluckMethod() {
    	$collection = collect([
    		['name'=>'adnan','age'=>18],
    		['name'=>'zaib','age'=>20],
    		['name'=>'arsalan','age'=>12],
    		['name'=>'rao','age'=>11]
    	]);

    	$filtered = $collection->pluck('name');
    	// to json
    	return $filtered->values()->all();
    }

    function containMethod() {
    	dump("contains method work similar to filter method but it return ");
    	// with simple array
    	// $collection = collect([
    	// 	'adnan',
    	// 	'zaib',
    	// 	'arsalan',
    	// 	'rao'
    	// ]);
    	// with nested associative array.
    	 $collection = collect([
    		['name'=>'adnan','age'=>18],
    		['name'=>'zaib','age'=>20],
    		['name'=>'arsalan','age'=>12],
    		['name'=>'rao','age'=>11]
    	]);

    	$contains = $collection->contains(function ($item) {
    		return substr($item['name'], 0,1) == 'b';
    	});
    	// to json
    	return $contains ? 'array contains' : 'array does not contain';
    }

    function partitionMethod() {
    	dump("This method much like with filter and contains. It uses closure function containing the current item in the array.");
    	dump("Using this we get two array of data. One array is the output of our condition(login) and second array is the reverse the condition(login");

    	$collection = collect([
    		'adnan',
    		'zaib',
    		'arsalan',
    		'rao'
    	]);

    	[$aboveFive, $underFive] = $collection->partition(function($item) {
    		return strlen($item) > 5;
    	});

    	// return $aboveFive;
    	return $underFive->values()->all();

    	// output : ["adnan","zaib","rao"]
    }

    function eachMethod2(){
    	$collection = collect([
    		['banana',23,'lahore'],
    		['apple',56,'kashmir'],
    		['sugar cane',20,'pindi']
    	]);

    	$collection->each(function($value) {
    		dump("We have {$value[1]} {$value[0]} in our store {$value[2]}.");
    	});

    	 dump("Note: problem is that it is dificult to determine which index contain which value.to solve that issue we have eachSpread method.");

    	$collection->eachSpread(function($product,$qty,$location) {
    		dump("We have {$qty} {$product} in our store {$location}.");
    	}); 
    }
}

// zBC$co3$9k