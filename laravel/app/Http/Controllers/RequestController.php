<?php

namespace App\Http\Controllers;

use App\Services\ItemRequestService;
use App\Models\StatusType;
use App\Models\ItemRequest;
use App\Providers;
//use \App\Controllers;

class RequestController extends Controller {

	private $requestService;
	private $statusType;
	private $itemRequest;

	public function __construct(ItemRequestService $requestService,StatusType $statusType, ItemRequest $itemRequest){
		$this->requestService=$requestService;
		$this->statusType=$statusType;
		$this->itemRequest=$itemRequest;

	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id=null,$component=null)
	{

		return $this->retrieveRequest($id);
	}
	public function search($search_type,$search_term=null)
	{
		$request=new stdClass();
		$request->record=$search_term;
		$request->type=$search_type;
	//	$item=\App\Services\ItemRequestService::listRequest($request)->toArray();


		try {

			$item=$this->requestService->detailedItemRequests($request)->toArray();

			return Inertia::render('Request',[
				'requests'=>$item
			]);


		}
		catch(Exception $e){
			return response()->json(['error'=>$e->getMessage()],500);
		}


	}

	public function listMessages($id){
		$request=new stdClass();
		$request->request_id=$id;

		try {
			$message=$this->requestService->listMessages($request);

			return Inertia::render('Request',[
				'messages'=>$messages
			]);
		}
		catch(Exception $e){
			return response()->json(['error'=>$e->getMessage()],500);
		}
	}

	public function listRequests($record){
		$request=new stdClass();

		$this->search("userRequests",$record);

	}

	
	
	public function retrieveRequest($id){
		$item=$this->itemRequest->find($id);
//		$item->status=\App\Services\ItemRequestService::getRequestStatus($item->id)->latest()->get()->toArray();
		try {
			$item->details=$this->requestService->getRequestDetails($id);
			$item->category=$this->requestService->getCategory($id);
	
			return response()->json($item,201);
		}
		catch(Exception $e){
			return response()->json(['error'=>$e->getMessage()],500);
		}
	}
	
	public function status($id,$latest=null){
		$item=$this->requestService->find($id);

		if($latest==1){
			
			$status=$this->requestService->getLatestStatus($id);
			
			if($status){
					$item->status=$status->toArray();
			}
			else {
				
			}
		}
		else {
			$item->status=$this->requestService->getRequestStatus($id)->toArray();

		
		}
		try {
			return response()->json($item,201);
		}
		catch(Exception $e){
			return response()->json(['error'=>$e->getMessage()],500);
		}
	}

	public function addRequest($id,Request $request){
		
		$input = $request->all();

		$request=new stdClass();

		$request->user_id=$input['user_id'];

		$request->status=1;

		if($input["request_date"]==""){
			$request->request_date=date("Y-m-d");

		}
		else {
			$request->request_date=date("Y-m-d",strtotime($input["request_date"]));
		}	

		$request->description=$input["description"];

		

		$request->shape=$this->fillVoid($input['shape']);
		$request->category=$this->fillVoid($input['category']);
		$request->color=$this->fillVoid($input['color']);
		$request->length=$this->fillVoid($input['length']);
		$request->width=$this->fillVoid($input['width']);
		$request->other_details=$this->fillVoid($input['other_details']);
		
		$key=$this->requestService->addItemRequest($request);

		$request->request_id=$key;

		$response=$this->requestService->addRequestDetails($request);

		$request->status_date=date("Y-m-d");
		$request->status_type_id=1;
		$request->status_details="Request Received";

		$this->requestService->addRequestStatus($request);

		
		try {
			return response()->json($response,201);
		}
		catch(Exception $e){
			return response()->json(['error'=>$e->getMessage()],500);
		}
	}
	

	public function addMessage($id,Request $request){
		
		$input = $request->all();

		$request=new stdClass();

		$request->request_id=$id;


		$request->request_id=$id;
		$request->user_id=$input['user_id'];
		$request->message_date=date("Y-m-d H:i:s");
		$request->message=$input['message'];
		

		$response=$this->requestService->addMessage($request);
		try {
			return response()->json($item,201);
		}
		catch(Exception $e){
			return response()->json(['error'=>$e->getMessage()],500);
		}
	
	}	
	public function fillVoid($element){
		
		if($element==""){
			return "N/A";
		}
		
		return $element;
		
		
	}
	

	public function modifyRequestStatus($request,Request $req){

		$input = $req->all();
		$request=new stdClass();

		$request->status_date=date("Y-m-d H:i:s");

		$request->request_id=$input["request_id"];
		$request->status_type_id=$input["status_type"];
		$request->status_details=$input["details"];

		$request->status_type=$this->statusType->find($request->status_type_id)->first();

		
		
		$response=$this->requestService->addRequestStatus($request);

		if($request->status_type_id==3){
			$request->status_id=$response->id;
			$request->details=$request->status_details;

			$request->claim_date=date("Y-m-d H:i:s");

			$this->requestService->addClaim($request);
	
		}

		
		
		try {
			return response()->json($item,201);
		}
		catch(Exception $e){
			return response()->json(['error'=>$e->getMessage()],500);
		}
	}

	
	public function modifyRequest($id,$type,Request $request){
		
		$input = $request->all();
//		$request=new stdClass();

		$request=$input["request_updates"];
		
		if($type=="details"){
			$this->requestService->modifyRequestDetails($id,$request);	
			
		}
		else if($type=="request"){
			$this->requestService->modifyItemRequest($id,$request);
			
		}
		
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
			
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	
}
