<?php

class UserController extends BaseController {


	public function admin(){
		$users = User::all();
		return View::make('users.admin',compact('users'));
	}

	public function delete($id){
		$user = User::find($id);
		if($user->id > 1){
		$user->delete();
		return Redirect::back()->with('success','L\'utilisateur a bien été supprimé');
	}
		else{
		return Redirect::back()->with('error','Vous ne pouvez pas supprimer cet utilisateur');
		}

}
	public function permission($id){
		$user = User::find($id);

		if($user->is_admin){
			$user->is_admin = 0;
			if($user->id == 1){
			$user->is_admin = 1;

			return Redirect::back()->with('error','Vous ne pouvez pas changer de status pour cet utilisateur');
			}
			$user->save();
			}
	else{
		$user->is_admin = 1;
		$user->save();
	}



	return Redirect::back()->with('success','La permission a bien été modifié');
}

	public function login(){
		return View::make('users.login');
	}


	public function check(){

		$inputs = Input::all();
		if(Input::get('remember')){
			$remember = true;
		}
		else
		{
			$remember = false;
		}
			$inputs['username'] = e($inputs['username']);
			$inputs['password'] = e($inputs['password']);
			$validation = Validator::make($inputs,[
				'username' => 'required',
				'password' => 'required',
		]);
		if($validation->fails()){
				return Redirect::back()->withErrors($validation);
		}
		else{
			if(Auth::attempt(['username' => $inputs['username'], 'password' => $inputs['password']]))
			{
				 Auth::attempt(['username' => $inputs['username'], 'password' => $inputs['password']]);
				 return Redirect::route('home')->with('success','Vous êtes bien connecté');
			}
			else{
					return Redirect::back()->with('error',"Le mot de passe ou le nom d'utilisateur est inccorect");
			}
		}

	}

	public function logout(){
		Auth::logout();
		return Redirect::route('home')->with('success','Vous êtes maintenant déconnecté');

	}

	public function register(){
		return View::make('users.register');
	}

	public function store(){

		$inputs['username'] = e(Input::get('username'));
		$inputs['password'] = e(Input::get('password'));
		$inputs['password_confirm'] = e(Input::get('password_confirm'));
		$validation = Validator::make($inputs,[
				'username'=>'required|min:3|unique:users',
				'password'=>'required|min:4',
				'password_confirm'=>'same:password',
		]);

		if($validation->fails()){
			return Redirect::back()->withErrors($validation);
		}
		else {
			$user = User::create([
				'username'  => $inputs['username'],
				'password'  => Hash::make($inputs['password']),

			]);
			$user->save();

			return Redirect::route('users.login')->with('success','Vous pouvez maintenant vous connecter');

		}
	}


}
