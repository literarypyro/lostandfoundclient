<?php
namespace App\Models;

use Eloquent;

class ItemRequest extends Eloquent {

	protected $table="item_requests";

	public function itemClaim(){


		return $this->hasOne(Claim::class,'log_id');

	}	

	public function requestDetail(){
		return $this->hasOne(RequestDetail::class,'request_id');

	}	

	public function requestStatus(){
		return $this->hasMany(RequestStatus::class,'request_id');

	}	

	public function category(){
		return $this->belongsTo(Category::class,'category_id');



	}	

	public function user(){
		return $this->belongsTo(LoginUser::class,'user_id');

	}	
	
}
?>