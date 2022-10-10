<?php

namespace App\Http\Controllers;

use App\shop;
use App\User;
use Exception;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public $API_HOST = 'https://api.yelp.com';

    public $SEARCH_PATH = '/v3/businesses/search';

    public $BUSINESS_PATH = '/v3/businesses/';  // Business ID will come after slash.

    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $query = shop::query();

        if (! empty($keyword)) {
            $query->where('keyword', 'LIKE', "%{$keyword}%")
     ->orWhere('shop_name', 'LIKE', "%{$keyword}%");
        }

        $shops = $query->get();

        return view('index', compact('shops', 'keyword'));
    }

    public function profile(User $user)
    {
        return view(profile)->with(['user' => $user]);
    }

    public function request($host, $path, $url_params = [])
    {
        // Send Yelp API Call
        try {
            $curl = curl_init();
            if (false === $curl) {
                throw new Exception('Failed to initialize');
            }

            $url = $host.$path.'?'.http_build_query($url_params);
            curl_setopt_array($curl, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,  // Capture response.
                CURLOPT_ENCODING => '',  // Accept gzip/deflate/whatever.
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => [
                    'authorization: Bearer '.env('YELP_APP_KEY'),
                    'cache-control: no-cache',
                ],
            ]);

            $response = curl_exec($curl);

            if (false === $response) {
                throw new Exception(curl_error($curl), curl_errno($curl));
            }
            $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if (200 != $http_status) {
                throw new Exception($response, $http_status);
            }

            curl_close($curl);
        } catch(Exception $e) {
            trigger_error(sprintf(
                'Curl failed with error #%d: %s',
                $e->getCode(), $e->getMessage()),
                E_USER_ERROR);
        }

        return $response;
    }

    public function search($term, $location)
    {
        $url_params = [];

        $url_params['term'] = $term;
        $url_params['location'] = $location;
        $url_params['limit'] = 10;

        return $this->request($this->API_HOST, $this->SEARCH_PATH, $url_params);
    }

    public function get_business($business_id)
    {
        $business_path = $this->BUSINESS_PATH.urlencode($business_id);

        return $this->request($this->API_HOST, $business_path);
    }

    public function query_api($term, $location, $counts)
    {
        $response = json_decode($this->search($term, $location));
        $business_id = $response->businesses[$counts]->id;

        $response = $this->get_business($business_id);

        $pretty_response = json_encode(json_decode($response), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        return $pretty_response;
    }

    public function yelp_api(Request $request)
    {
        $term = $request['term'];
        $location = $request['location'];
        assert($API_KEY, 'Please supply your API key.');

        // API constants, you shouldn't have to change these.
        $API_HOST = 'https://api.yelp.com';
        $SEARCH_PATH = '/v3/businesses/search';
        $BUSINESS_PATH = '/v3/businesses/';  // Business ID will come after slash.

        // Defaults for our simple example.
        $DEFAULT_TERM = 'dinner';
        $DEFAULT_LOCATION = 'San Francisco, CA';
        $SEARCH_LIMIT = 5;
        $longopts = [
            'term::',
            'location::',
        ];
        $pretty_response=$this->query_api($term, $location,1);
        $shop_information1=json_decode($pretty_response,false);

        $pretty_response=$this->query_api($term, $location,2);
        $shop_information2=json_decode($pretty_response,false);

        $pretty_response=$this->query_api($term, $location,3);
        $shop_information3=json_decode($pretty_response,false);

        return view('search_result')->with(['shop_info'=>$shop_information1,
                                            'shop_info2'=>$shop_information2,
                                            'shop_info3'=>$shop_information3]);
                                            $shop_information=array();

        if (! empty($keyword)) {
            $query->where('keyword', 'LIKE', "%{$keyword}%")
     ->orWhere('shop_name', 'LIKE', "%{$keyword}%");
        }

        $shops = $query->get();

        return view('index', compact('shops', 'keyword'));
    }

    public function profile(User $user)
    {
        return view(profile)->with(['user' => $user]);
    }

    public function request($host, $path, $url_params = [])
    {
        // Send Yelp API Call
        try {
            $curl = curl_init();
            if (false === $curl) {
                throw new Exception('Failed to initialize');
            }

            $url = $host.$path.'?'.http_build_query($url_params);
            curl_setopt_array($curl, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,  // Capture response.
                CURLOPT_ENCODING => '',  // Accept gzip/deflate/whatever.
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => [
                    'authorization: Bearer '.env('YELP_APP_KEY'),
                    'cache-control: no-cache',
                ],
            ]);

            $response = curl_exec($curl);

            if (false === $response) {
                throw new Exception(curl_error($curl), curl_errno($curl));
            }
            $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if (200 != $http_status) {
                throw new Exception($response, $http_status);
            }

            curl_close($curl);
        } catch(Exception $e) {
            trigger_error(sprintf(
                'Curl failed with error #%d: %s',
                $e->getCode(), $e->getMessage()),
                E_USER_ERROR);
        }

        return $response;
    }

    public function search($term, $location)
    {
        $url_params = [];

        $url_params['term'] = $term;
        $url_params['location'] = $location;
        $url_params['limit'] = 10;

        return $this->request($this->API_HOST, $this->SEARCH_PATH, $url_params);
    }

    public function get_business($business_id)
    {
        $business_path = $this->BUSINESS_PATH.urlencode($business_id);

        return $this->request($this->API_HOST, $business_path);
    }

    public function query_api($term, $location, $counts)
    {
        $response = json_decode($this->search($term, $location));
        $business_id = $response->businesses[$counts]->id;

        $response = $this->get_business($business_id);

        $pretty_response = json_encode(json_decode($response), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        return $pretty_response;
    }

    public function yelp_api(Request $request)
    {
        $term = $request['term'];
        $location = $request['location'];
        assert($API_KEY, 'Please supply your API key.');

        // API constants, you shouldn't have to change these.
        $API_HOST = 'https://api.yelp.com';
        $SEARCH_PATH = '/v3/businesses/search';
        $BUSINESS_PATH = '/v3/businesses/';  // Business ID will come after slash.

        // Defaults for our simple example.
        $DEFAULT_TERM = 'dinner';
        $DEFAULT_LOCATION = 'San Francisco, CA';
        $SEARCH_LIMIT = 5;
        $longopts = [
            'term::',
            'location::',
        ];

        $shop_information = [];
        for ($i = 0; $i < $SEARCH_LIMIT; $i++) {
            $pretty_response = $this->query_api($term, $location, $i);
            $shop_info = json_decode($pretty_response, false);
            array_push($shop_information, $shop_info);
        }

        usort($shop_information, function ($a, $b) {
            return $a->rating > $b->rating ? -1 : 1;
        });

        return view('search_result')->with(['shop_info' => $shop_information]);
    }

    public function currentLocation(Request $request)
    {
        $lat = $request->lat;
        $lng = $request->lng;

        return view('currentLocation', [
            'lat' => $lat,
            'lng' => $lng,
        ]);
    }
}
