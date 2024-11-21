<?php

namespace App\Services;

use App\Models;
use App\Services\UserService;
use App\Services\ItemRequestService;
use App\Services\LocationService;

class ApiService {
	
	public static function listLocations(){
		$locationService=app(LocationService::class);
		return $locationService->listLocations();


	}

	public static function listCategories(){
		$locationService=app(CategoryService::class);
		return $locationService->listCategory();


	}


	public static function generateToken($request){
		
        $token = Str::random(60);

        $request->user()->forceFill([
            'api_token' => hash('sha256', $token),
		])->save();


		$data['token']=$token;

        return $data;
	}
	
}
?>



