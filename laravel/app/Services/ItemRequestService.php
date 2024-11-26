<?php

namespace App\Services;

use App\Models;
use App\Services\UserService;
use App\Services\ItemRequestService;


class ItemRequestService {
	
	public static function listRequest($request){
		
		$record=$request->record;
		$type=$request->type;
		
		
		
		if($record==null){			
//		leave open for possibility of listing all items
			return false;
		}	
		else {
			if($type=="search"){
//				return \App\Models\User::with("ItemRequests")->itemRequests()->get();
			}
			else if($type=="claimRequest"){
				return \App\Models\Claim::with("ItemRequest")->find($record)->first();
			}
			else if($type=="single"){
				return \App\Models\ItemRequest::find($record)->first();
			}
			else if($type=="userRequests"){
				//$user=
//				return 
				
				$items=\App\Models\LoginUser::with("ItemRequests")->find($record)->itemRequests()->get();
				
				
				
//				$items=$user->items;
				if($items==true){	
						$k=0;

									
						foreach($items as $item){
							$items[$k]->details=\App\Models\RequestDetail::whereRaw("request_id=".$item->id)->get()->toArray();
							$items[$k]->category=\App\Models\Category::whereRaw("id=".$item->category_id)->first()->toArray();
									
//							$items[$k]->item_type=\App\Models\ItemType::whereRaw("id=".$item->item_type_id)->first()->toArray();
							$latest_status=\App\Services\ItemRequestService::getLatestStatus($item->id);
							
							if($latest_status){
								$items[$k]->latest_status=$latest_status->toArray();
							}
									
							$k++;
						}
						return $items;
				}
				else {
					return $items;
				}				
			}
			else if($type=="all"){
			
				return \App\Models\ItemRequest::orderBy('request_date','DESC')->first();
			}
			else if($type=="recent"){
				
				
				
				
				
				
				
				
				
				$items=\App\Models\ItemRequest::orderBy('request_date','DESC')->get();
//				$items=\App\Models\ItemRequest::all();
				if($items==true){	
						$k=0;
//						$items=$items->sortByDesc('request_date');

									
						foreach($items as $item){
							$items[$k]->details=\App\Models\RequestDetail::whereRaw("request_id=".$item->id)->get()->toArray();
							$items[$k]->category=\App\Models\Category::whereRaw("id=".$item->category_id)->first()->toArray();
									
//							$items[$k]->item_type=\App\Models\ItemType::whereRaw("id=".$item->item_type_id)->first()->toArray();
							$latest_status=\App\Services\ItemRequestService::getLatestStatus($item->id);
							
							$items[$k]->request_date_label=date("F d, Y",strtotime($items[$k]->request_date));
							
							
							$user_nf=\App\Services\ItemRequestService::getUserInformation($item);
							
							if($user_nf){
								$user_info=$user_nf->toArray();
							}
							
							if($latest_status){
								$items[$k]->latest_status=$latest_status->toArray();
							}
							if($user_info){
							//	$items[$k]->user_info=$user_info->toArray();
								$items[$k]->user_info=$user_info;
							}
							$k++;
						}
						return $items;
				}
				else {
					return $items;
				}
//				return $records;				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
			
//				return \App\Models\ItemRequest::orderBy('request_date','DESC')->get();
			}


			else {
				return \App\Models\ItemRequest::find($record)->first();
			}
				
		}	
		
	}
	


	public static function detailedItemRequests($request){
		
		$itemRequests=false;

		$itemRequests=\App\Services\ItemRequestService::listRequest($request);
		
		if($itemRequests==true){	
			$i=0;

			foreach($itemRequests as $itemRequest){
				$itemRequests[$i]->category=ItemRequestService::getCategory($itemRequest);
				$itemRequests[$i]->details=ItemRequestService::getRequestDetails($itemRequest);

//				$itemRequests[$i]->record=$itemRequests[i]->user_id;
//				$itemRequests[$i]->type="single";
				
				
//				$itemRequests[$i]->user=\App\Services\UserService::detailedUsers($itemRequest);


				
				$i++;				
			}
			return $itemRequests;
		}
		else {
			return $itemRequests;
		}
		return $itemRequests;
	}
	public static function addItemRequest($request){
		$itemRequestService=app(AddItemRequestService::class);
		return $itemRequestService->addItemRequest($request);


	}

	public static function addRequestDetails($request){
		$itemRequestService=app(AddItemRequestService::class);
		return $itemRequestService->addRequestDetails($request);


	}

	public static function addRequestStatus($request){
		$itemRequestService=app(AddRequestStatusService::class);
		return $itemRequestService->addRequestStatus($request);


	}

	public static function getCategory($request){

	
		$user=\App\Models\ItemRequest::with("Category")->find($request->id)->category()->first()->toArray();	

		return $user;
	
	
	
	}
	public static function getUserInformation($request){

		$user="";

	
//		$user=\App\Models\ItemRequest::with("RequestDetail")->find($request->id)->requestDetail()->first()->toArray();	

		if($request){
			$request2=new \stdClass();
			$request2->record=$request->user_id;
			$request2->type="single";	
		
			
			$user=\App\Services\UserService::detailedUsers($request2);
		}
		
		
		return $user;
	
	
	
	}
	
	
	
	
	public static function getRequestDetails($request){

		$user=\App\Models\ItemRequest::with("RequestDetail")->find($request->id)->requestDetail()->first()->toArray();	

		
		return $user;
	
	
	
	}


	public static function getRequestStatus($request){
//		$items=\App\Models\ItemRequest::with("RequestStatus")->find($request)->requestStatus()->get();	
		$statuses=\App\Models\RequestStatus::whereRaw("request_id=$request")->orderBy("status_date","DESC")->get();	

		
		
		$i=0;

		foreach($statuses as $status){
		//	$itemRequests[$i]->category=ItemRequestService::getCategory($itemRequest);
		
			if($i==0){  
				$statuses[$i]->latest=true;
			}
			
			else {
				$statuses[$i]->latest=false;
			}
			$statuses[$i]->status_type=\App\Models\RequestStatus::with("StatusType")->find($status->id)->statusType()->first()->toArray();
			
			$i++;				
		}
		

		
		
		return $statuses;
	}

	public static function getLatestStatus($request){
//		$items=\App\Models\Item::with("ItemStatus")->find($request)->itemStatus()->get();	

		
		$statuses=\App\Models\RequestStatus::whereRaw("request_id=$request")->orderBy("status_date","DESC")->first();	

		if($statuses){
			$statuses->status_type=$statuses->statusType()->first()->toArray();
		}
		
		return $statuses;
	}
}
?>



