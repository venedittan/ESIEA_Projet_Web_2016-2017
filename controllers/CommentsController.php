<?php

Class CommentsController extends BaseController{

public function admin(){
		$comments = Comment::all();
		return View::make('comments.admin',compact('comments'));
}

public function delete($id){
		$comment = Comment::find($id);
		$comment->delete();
		return Redirect::back()->with('success','Le commentaire a bien été supprimé');
}

		public function create($id){
			  $post = Post::find($id);
				$inputs = Input::all();
					Comment::create([
						'user_id' => Auth::user()->id,
						'post_id' => $post->id,
						'content' => $inputs['comment'],
				]);

				return Redirect::back()->with('success','Votre commentaire a bien été créé');
			}
}
