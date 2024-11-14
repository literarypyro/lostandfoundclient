<?php
namespace App\Models;

use Eloquent;

class ItemType extends Eloquent {

	protected $table="item_types";

	public function items(){
//		return $this->hasMany("\App\Models\Items","log_id")->whereRaw("log_type in ('cash','shortage','deposit') and transaction_type not in ('catransfer')");
		return Attribute::make(
			get: fn()=>$this->hasMany(Item::class,'item_type_id'),

		);	
	}

}
?>