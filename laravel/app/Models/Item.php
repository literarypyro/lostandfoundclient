<?php
namespace App\Models;

use Eloquent;

class Item extends Eloquent {

	protected $table="items";

	public function itemDetail(){
//		return $this->hasMany("\App\Models\Items","log_id")->whereRaw("log_type in ('cash','shortage','deposit') and transaction_type not in ('catransfer')");


		return $this->hasOne(ItemDetail::class,'item_id');	
	
	
	
	}

	public function identification(){

		return $this->hasOne(Identification::class,'item_id');	



	}
	
	public function itemStatus(){

		return $this->hasOne(ItemStatus::class,'item_id');	


	}
	public function itemType(){
		return $this->belongsTo(ItemType::class,'item_type_id');	


	}

	
	public function category(){

		return $this->belongsTo(Category::class,'category_id');	


	}
	
	public function foundRecord(){
		return $this->belongsTo(FoundRecord::class,'found_record_id');	

	}
	

}
?>