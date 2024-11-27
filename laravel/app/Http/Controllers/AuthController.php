<?php

namespace App\Http\Controllers;

use App\User;

use App\Services\UserService;
use App\Models;
use App\Providers;

//use \App\Controllers;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Inertia\Inertia;


//use Request;

class AuthController extends Controller {

	
	private $userLoginService;

	public function __construct(UserService $userLoginService){
		$this->userLoginService=$userLoginService;
//		$this->statusType=$statusType;


	}

	/**
	 * Display a listing of the resource.
	 *
	 * 
	 */
	public function index($id=null,$component=null)
	{
		
	}
	
	public function loginUser(Request $request,)  {
		$input = $request->all();
		$request=new \stdClass();

		
		$request->username=$input["username"];
		$request->password=$input["password"];

		
		$auth=$this->userLoginService->loginUser($request);
		
		$userId=$auth['userid'];


		try {

//			to_route('request-dashboard')->with('requestid',$userId);
//			redirect('/dashboard')->with('requestid',$userId);
			return response()->json(['userid'=>$userId]);


		}
		catch(Exception $e){
			return response()->json(['error'=>$e->getMessage()],500);
		}
	

	}
	public function retrieveUser($id){

		$request=new stdClass();

		 $request->record=$id;
		 $request->type="single";		
		
		 $auth=$this->userLoginService->detailedUsers($request);
		 return \Response::json($auth);
		
	}
	
	public function registerUser(Request $request){
	
		$input = $request->all();
		$request=new \stdClass();

		$request->username=$input['username'];
		$request->password=$input['password'];

		$request->name=$input['name'];
//		$request->user_type=$input['user_type'];

		$request->user_type="user";

		$auth=$this->userLoginService->addUser($request);

//		return \Response::json($auth,200);
		return \Response::json($auth);
		
	}
	
	public static function logoutUser($request){
		$token = $request->user()->token();
		$token->revoke();
		$response = ['message' => 'You have been successfully logged out!'];
		return Inertia::render('Login');



	}		
	
	
	public function changePassword(){
		
		$input = Request::all();
		$request=new \stdClass();

		$request->user_id=$input['user_id'];
		$request->password=$input['password'];
		$request->new_password=$input['new_password'];

		
		$auth=$this->userLoginService->changePassword($request);

		return \Response::json($auth);
		
	}
	
	public function addUserProfile($id){

		$input = Request::all();
		$request=new \stdClass();


		$request->user_id=$id;
		
		$request->first_name=$input['first_name'];
		$request->middle_name=$input['middle_name'];
		$request->last_name=$input['last_name'];
//		$request->user_type=$input['user_type'];
		



		
		$auth=$this->userLoginService->addUserProfile($request);
		return \Response::json($auth);
		
		
	}

	public function addUserAddress($id){
		$input = Request::all();
		$request2=new \stdClass();


		$request2->profile_id=$id;
		
		$request2->unit=$input['unit'];
		$request2->street=$input['street'];
//		$request2->subdivision=$input['subdivision'];
		$request2->subdivision="";
		$request2->city=$input['city'];
		$request2->province=$input['province'];
		$request2->country_id=$input['country'];
		$request2->zip_code=$input['zip'];


		
		$auth=$this->userLoginService->addUserAddress($request2);
		return \Response::json($auth);
	}
	public function addUserContact($id){

		$input = Request::all();
		$request2=new \stdClass();


		$request2->profile_id=$id;
		
		$request2->landline=$input['landline'];
		$request2->mobile=$input['mobile'];
		$request2->email=$input['email'];
	
		
		$auth=$this->userLoginService->ddUserContact($request2);
		return \Response::json($auth);
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
