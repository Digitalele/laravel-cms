<?php

//Model

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
		//make as object of Carbon
		protected $dates = ['published_at'];

		public function author()
		{
				return $this->belongsTo(User::class);
		}

    public function getImageUrlAttribute($value)
    {
    		$imageUrl = "";
	    	if  (! is_null($this->image))
	    	{
	    		$imagePath = public_path() . "/img/" . $this->image;
	   			if (file_exists($imagePath)) $imageUrl = asset("img/" . $this->image);
	    	}

	    	return $imageUrl;
    }

    public function getDateAttribute($value)
    {
    		//make shure that published_at ! null
				return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }

    public function scopeLatestFirst($query)
    {
    		$query->orderBy('created_at', 'desc');
    }

    public function scopePublished($query)
    {	
    		//for time use carbon instead of NOW()
    		return $query->where('published_at', '<=', Carbon::now());
    }

}
