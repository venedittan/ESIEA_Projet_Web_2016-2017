<?php

class Comment extends \Eloquent {
	protected $guarded = ['id','created_at'];

	public static function boot(){
		parent::boot();
		self::deleted(function($comment){
			if($comment->post){
				$comment->post->counts_comment = $comment->post->comments->count();
				$comment->post->save();
			}
		});
		self::created(function($comment){
			if($comment->post){
				$comment->post->counts_comment = $comment->post->comments->count();
				$comment->post->save();
			}
		});

		return true;
	}

	public function posts(){
		return $this->BelongsTo('Post');
	}

	public function user(){
			return $this->BelongsTo('User');
	}
}
