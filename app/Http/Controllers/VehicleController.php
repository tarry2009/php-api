<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input; 
use GuzzleHttp;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;


class VehicleController extends Controller {

 
	protected function buildFailedValidationResponse(Request $request, array $errors)
    {
        return response()->json([
            'error' => $errors,
        ], Response::HTTP_BAD_REQUEST);
    }
	
	/**
     * @SWG\Get(
     *   path="/vehicles/{modelYear}/{manufacturer}/{model}",
     *   description="Get vehicles",
     *   summary="Get vehicle detail",
     *   operationId="vehicles",
     *   consumes={"application/json"},
     *
     *   @SWG\Parameter(
     *          name="modelYear",
     *          description="modelYear of the vehicle",
     *          required=true,
     *          type="integer",
     *          in="path"
     *   ),
     *   @SWG\Parameter(
     *          name="manufacturer",
     *          description="manufacturer of the vehicle",
     *          required=true,
     *          type="integer",
     *          in="path"
     *   ),
     *   @SWG\Parameter(
     *          name="model",
     *          description="model of the vehicle",
     *          required=true,
     *          type="integer",
     *          in="path"
     *   ),     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=400, description="not acceptable"),
     *   @SWG\Response(response=401, description="unauthorized"),
     *   @SWG\Response(response=500, description="internal server error")
     * )
     */
    public function index(Request $request) {
		
		$newarray = $nhtsa = array();
		
		if (empty($request->model)) {
			return response()->json([
                'Count' => 0, 'Results'  => [],
            ], Response::HTTP_OK); 
		}
		
		if (empty($request->modelYear)) {
			return response()->json([
                'Count' => 0, 'Results'  => [],
            ], Response::HTTP_OK); 
		}
		 
		if (!empty($request->modelYear) && is_numeric($request->modelYear)){
 
			$http = new GuzzleHttp\Client; 
			
			$url = 'https://one.nhtsa.gov/webapi/api/SafetyRatings/modelyear/'.$request->modelYear.'/make/'.$request->manufacturer.'/model/'.$request->model.'?format=json';
			try {
				$response = $http->request('get', $url );
			} catch (GuzzleHttp\Exception\GuzzleException $e) {
				return response()->json( 
                ['code' => $e->getCode(), 'message' => $e->getMessage()]
				 , Response::HTTP_BAD_REQUEST); 
			}
			 
			$nhtsa = json_decode((string) $response->getBody(), true);
			
			$newarray['Count'] = $nhtsa['Count']; 
			$newarray['Results'] = [];
			
			if (!empty($nhtsa['Results']) && $request->withRating=='true'){
				
				foreach ($nhtsa['Results'] as $i=>$vid){ 
					 	
						$crash_rating_url = 'https://one.nhtsa.gov/webapi/api/SafetyRatings/VehicleId/'.$vid['VehicleId'].'?format=json';
						$crash_rating_data = $this->getData($crash_rating_url );
						 
						if (isset($crash_rating_data['Results'][0]['OverallRating'])){ 
							$newarray['Results'][$i]['CrashRating'] = $crash_rating_data['Results'][0]['OverallRating']; 
						}else
							$newarray['Results'][$i]['CrashRating'] = "Not Rated";
								 
					 
					$newarray['Results'][$i]['VehicleId'] = $vid['VehicleId'];
					$newarray['Results'][$i]['VehicleDescription'] = $vid['VehicleDescription'];
					
				}
				/** */
			}else
				$newarray['Results'] = $nhtsa['Results'];
			
				 
			 return response()->json( 
              $newarray
			 , Response::HTTP_OK); 
        
		} else {
			return response()->json([
                'Count' => 0, 'Results'  => [],
            ], Response::HTTP_OK); 
			 
		}
        
    } 
	  
	/**
	* getting results of a get api
	* 
	*  @returning json
	*/      
    public function getData($url = ''){ 
		if (empty($url))
		    return false;
		    
		return json_decode(file_get_contents($url), true);
	}
    
   
        
}
