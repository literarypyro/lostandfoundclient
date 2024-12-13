<?php
namespace App\Models;

use Eloquent;

class Category extends Eloquent {

	protected $table="categories";

	public function items() 
	{

		return $this->hasMany(Item::class,'category_id');


	}

	public function itemRequests()
	{

		return $this->hasMany(ItemRequests::class,'category_id');
	
		
	}


}
?>