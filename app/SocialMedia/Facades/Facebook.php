<?php

namespace App\SocialMedia\Facades;
// namespace App;
use Illuminate\Support\Facades\Facade;

class Facebook extends Facade{
	public static function getFacadeAccessor(){
		return "fb";
		// it is a simple name. no metter what it is..it will we use in service povider
		// or is k name is humne register krna ha service provider ko

		// coders tape login


		// dd(app()['Facebook']);
		// dd(app()->make('Facebook'));

	}
}