<?php

namespace App\Services;

use App\Models;
use App\Services\AddItemStatusService;


class AddRequestStatusService {
	
	public static function listItems($request){
		
		$record=$request->record;
		$type=$request->type;
		
		
		
		if($record==null){			
//		leave open for possibility of listing all items
			
			return false;
		}	
		else {
			if($type=="category"){
				
				return \App\Models\Item::whereRaw("category_id='$record'")->get();
			}
			else if($type=="itemType"){
				return \App\Models\Item::whereRaw("item_type_id='$record'")->get();
				
			}
			else if($type=="search"){
				return \App\Models\Item::whereRaw("item_title like '%%$record%'")->get();
			
			}
			else if($type=="single"){
				return \App\Models\Item::find($record)->first();
			}
			else {
				return \App\Models\Item::whereRaw("record_id='$record'")->get();
			}
				
		}	
		
	}
	
	public static function addRequestStatus($request){
		$item_request=new \App\Models\RequestStatus;
		
		$item_request->request_id=$request->request_id;
		$item_request->status_date=$request->status_date;
		$item_request->status_type_id=$request->status_type_id;
		$item_request->details=$request->status_details;
		
		$item_request->save();
		return $item_request;
	}
	
	
	public static function addClaim($request){
		$details=new \App\Models\Claim;
			
		$details->request_id=$request->request_id;
		$details->status_id=$request->status_id;
		$details->claim_date=$request->claim_date;
		$details->details=$request->details;
			
		$details->save();
	}		

/*	
	public static function addDisposal($request){
		$details=new \App\Models\Disposal;
			
		$details->status_id=$request->status_id;
		$details->details=$request->details;
		$details->disposal_date=$request->disposal_date;
			
		$details->save();
	}
*/
}

?>



