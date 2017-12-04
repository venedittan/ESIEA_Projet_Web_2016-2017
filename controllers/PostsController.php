<?php

class PostsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /posts
	 *
	 * @return Response
	 */

protected $rules = [
		'name'=>'required | min:3',
		'content'=>'required | min:5',
];



	public function index()
	{
		$posts = Post::Paginate(5);
		return View::make('posts.index', compact('posts'));
 	}

	public function show($slug){
		 $post = Post::where('slug',$slug)->firstOrFail();
		 $author = $post->user;
		 $comments = $post->comments;
		 return View::make('posts.show', compact('post', 'author', 'comments'));

	}

	public function admin(){
		$posts = Post::all();
		return View::make('posts.admin',compact('posts'));
	}

	public function edit($id){
		$post = Post::find($id);
		if($post){
		return View::make('posts.edit',compact('post'));
		}
		else{
				return View::make('posts.create');
		}
	 }

	public function delete($id){
		$post = Post::find($id);
		$post->destroy($post->id);
		return Redirect::back()->with('success','Votre poste a bien été supprimé');
	}

	public function update($id){
		$inputs = Input::all();
		$validation = Validator::make($inputs,$this->rules);
		if($validation->fails()){
					return Redirect::back()->withErrors($validation);
		}
		else{

			 $post = Post::find($id);
 			 $post->name = $inputs['name'];
 			 $post->content = $inputs['content'];
 			 $post->save();
 			 return Redirect::route('home')->with('success','Votre post à bien été modifié');
		 	}
		}

		public function create(){
			$post = Post::find('id');
			$inputs = Input::all();
			$validation = Validator::make($inputs,$this->rules);
			if($validation->fails()){
						return Redirect::back()->withErrors($validation);
			}
			else{
			  $post = Post::create([
						 'name'=>$inputs['name'],
						 'content'=>$inputs['content'],
						 'slug'=>Str::slug($inputs['name']),
						 'user_id'=>Auth::user()->id,
					 ]);
					 $post->save();
					 return Redirect::route('home')->with('success','Votre post à bien été crée');
				 }
			}
}
