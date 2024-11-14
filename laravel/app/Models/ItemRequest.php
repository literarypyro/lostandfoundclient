<?php
namespace App\Models;

use Eloquent;

class ItemRequest extends Eloquent {

	protected $table="item_requests";

	public function itemClaim(){


		return Attribute::make(
			get: fn()=>$this->hasOne(Claim::class,'log_id'),

		);
	}	

	public function requestDetail(){
		return Attribute::make(
			get: fn()=>$this->hasOne(RequestDetail::class,'request_id'),

		);
	}	

	public function requestStatus(){
		return Attribute::make(
			get: fn()=>$this->hasMany(RequestStatus::class,'request_id'),

		);
	}	

	public function category(){
		return Attribute::make(
			get: fn()=>$this->belongsTo(Category::class,'category_id'),

		);


	}	

	public function user(){
		return Attribute::make(
			get: fn()=>$this->belongsTo(LoginUser::class,'user_id'),

		);
	}	
	
}
?>