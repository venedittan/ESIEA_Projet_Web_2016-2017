<?php

class Post extends \Eloquent {
	protected $guarded = ['id','created_at'];

	public static function boot(){
		parent::boot();
		self::created(function($post){
		$post->counts_comment = 0;
	});
	self::deleted(function($post){
				$comments = $post->comments;
		foreach($comments as $comment)
				$comment->delete();
		});
		return true;
	}

	public function user(){
			return $this->BelongsTo('User');
	}

	public function Comments(){
			return $this->hasMany('Comment');
	}


}
