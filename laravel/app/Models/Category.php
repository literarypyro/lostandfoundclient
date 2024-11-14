<?php
namespace App\Models;

use Eloquent;

class Category extends Eloquent {

	protected $table="categories";

	protected function items(): Attribute 
	{

		return Attribute::make(
			get: fn()=>$this->hasMany(Item::class,'category_id'),

		);
		

	}

	protected function itemRequests(): Attribute
	{

		return Attribute::make(
			get: fn()=>$this->hasMany(ItemRequests::class,'log_id'),
	
		);
		
	}


}
?>