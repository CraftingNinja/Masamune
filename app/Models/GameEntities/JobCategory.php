<?php

namespace App\Models\GameEntities;

class JobCategory extends GameEntityAbstract {

	protected $table = 'job_category';

	public function jobs()
	{
		return $this->belongsToMany(Job::class);
	}

	public function ventures()
	{
		return $this->hasMany(Venture::class);
	}

	public function leves()
	{
		return $this->hasMany(Leve::class);
	}

	public function items()
	{
		return $this->hasMany(Item::class);
	}

}
