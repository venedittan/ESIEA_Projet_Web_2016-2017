<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function admin()
	{
		if(Auth::check()){

			return View::make('admin');
	}
	else{

		return Redirect::route('users.login')->with('error','Vous devez être connecté pour accéder à cette page');
 	}
	}



	public function showWelcome()
	{
		return View::make('hello');
	}

}
