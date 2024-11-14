<?php

namespace App\Http\Controllers;

use App\Services;
use App\Models;
//use \App\Controllers;
use Illuminate\Support\Str;
//use Illuminate\Http\Request;

use Request;

class ApiController extends Controller {

	private $apiService;

	public function __construct(ApiItemService $apiService){
		$this->apiService=$apiService;

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id=null,$component=null)
	{
		
	}
	
	public function refreshToken(Request $request){
		return $this->apiService->generateToken($request);
		
	}
	
	public function listCategory(){
		$item=$this->apiService->listCategory()->toArray();
		return $item;
	}
	public function listCountry(){
		$item=$this->apiService->listCountry()->toArray();
		return $item;
	}
	
	
	public function listFoundations(){


		try {
			$item=$this->apiService->listFoundations()->toArray();

			return response()->json($item,201);
		}
		catch(Exception $e){
			return response()->json(['error'=>$e->getMessage()],500);
		}	


	}
	
	
	public function listItemType(){
		try {
			$item=$this->apiService->listItemType()->toArray();

			return response()->json($item,201);
		}
		catch(Exception $e){
			return response()->json(['error'=>$e->getMessage()],500);
		}	


	}
	

	public function addCategory(Request $request){
		try {
			$item=$this->apiService->addCategory(($request->all())['type']);

			return response()->json($item,201);
		}
		catch(Exception $e){
			return response()->json(['error'=>$e->getMessage()],500);
		}	



	}

	public function addFoundation(Request $request){
		
		$input=$request->all();
		
		$request=new stdClass();
		
		$request->name=$input["name"];
		$request->address=$input["address"];
		$request->email=$input["email"];
		$request->contact_no=$input["contact_no"];
		
		$item=$this->apiService->addFoundation($request);
	
		return "Foundation successfully added";
	}
	
	public function addItemType(Request $request){

		try {
			$item=$this->apiService->addItemType($request->all());

			return response()->json($item,201);
		}
		catch(Exception $e){
			return response()->json(['error'=>$e->getMessage()],500);
		}	

	}
	

	public function listReceivers(){
		try {
			$item=$this->apiService->listReceivers()->toArray();

			return response()->json($item,201);
		}
		catch(Exception $e){
			return response()->json(['error'=>$e->getMessage()],500);
		}	
	}

	public function addReceiver(Request $request){

		
		$input=$request->all();
		
		$request=new stdClass();
		$request->firstName=$input["firstName"];
		$request->lastName=$input["lastName"];
		$request->position=$input["position"];

		try {
			$item=$this->apiService->addReceiver($request);

			return response()->json($item,201);
		}
		catch(Exception $e){
			return response()->json(['error'=>$e->getMessage()],500);
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
?>
