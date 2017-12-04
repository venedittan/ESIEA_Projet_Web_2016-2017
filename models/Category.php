<?php

class Category extends \Eloquent {
	protected $guarded = ['id','created_at'];

	public function posts(){
			return $this->hasMany('Post');
	}


}
