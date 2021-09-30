<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Library\Curl;
use App\Models\Search;

class SearchController extends Controller
{
    /**
     * Check if the value passed by url is on the database or go for it to the API and returns a value.
     *
     * @return array
     */
    public function index(Request $request)
    {
        $data = $request->all();

        $result = array('status' => 200,'response' => 'No parameter. Please add one called "q" with the value you want');

        if(isset($data['q'])){
            //Check if already exists on database
            $search = Search::all()->where('slug', '=', strtolower($data['q']))->sortBy('id');
            if(count($search) == 0){
                //No exists on database, then go to the API for the response
                $apiCall = Curl::call($data['q']);
                foreach($apiCall['response'] as $response){

                    if(strtolower($response['show']['name']) == strtolower($data['q'])){
                        $newSearch = array();
                        $newSearch['slug'] = strtolower($response['show']['name']);
                        $newSearch['value'] = $response['show']['name'];
                        Search::create($newSearch);
                        $result = array('status' => 200,'response' => $response['show']['name']);
                    }
                }
            } else {
                //Exist on database, then return the response from there.
                $search = $search->first();
                $result = array('status' => 200,'response' => $search['value']);
            }
        }

        return $result;
    }
}
