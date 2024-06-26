<?php

namespace App\Http\Controllers;

use App\shop;
use App\User;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //https://docs.developer.yelp.com/reference/v3_business_search
    public $API_HOST = 'https://api.yelp.com';

    public $SEARCH_PATH = '/v3/businesses/search';

    public $BUSINESS_PATH = '/v3/businesses/';  // Business ID will come after slash.

    public function index(Request $request)
    {
        $keyword = $request->input('keyword'); //リクエストから'keyword'パラメータを取得

        $query = shop::query(); //shopモデルのクエリービルダーを作成

        if (! empty($keyword)) {//部分一致を検索
            $query->where('keyword', 'LIKE', "%{$keyword}%")
     ->orWhere('shop_name', 'LIKE', "%{$keyword}%");
        }

        $shops = $query->get();

        return view('index', compact('shops', 'keyword')); //compact関数はスマートな記述にするもの
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

            $url_params['sort_by'] = 'review_count';

            $url = $host.$path.'?'.http_build_query($url_params); //条件に合致する情報の抜き出し　httpリクエスト 検索条件を増やす場合は$url_paramsの値に条件を加える

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
        $url_params['limit'] = 30; //引っ張ってくる店の個数

        return $this->request($this->API_HOST, $this->SEARCH_PATH, $url_params); //$thisはShopController
    }

    public function get_business($business_id)
    {
        $business_path = $this->BUSINESS_PATH.urlencode($business_id);

        return $this->request($this->API_HOST, $business_path);
    }

    public function query_api($term, $location, $counts)
    {
        $response = json_decode($this->search($term, $location)); //jsonをphpで扱えるようにするための物
        $business_id = $response->businesses[$counts]->id; //businessesはAPIレスポンスのビジネス情報の配列を返す

        $response = $this->get_business($business_id);

        $pretty_response = json_encode(json_decode($response), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        return $pretty_response;
    }

    public function yelp_api(Request $request)
    {
        $term = $request['term']; //indexでつけたなまえ
        $location = $request['location'];
        // $review_count = $request['review_count'];
        assert($API_KEY, 'Please supply your API key.');

        // API constants, you shouldn't have to change these.
        $API_HOST = 'https://api.yelp.com';
        $SEARCH_PATH = '/v3/businesses/search';
        $BUSINESS_PATH = '/v3/businesses/';  // Business ID will come after slash.

        // Defaults for our simple example.
        $DEFAULT_TERM = 'dinner';
        $DEFAULT_LOCATION = 'San Francisco, CA';
        $SEARCH_LIMIT = 10;
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

        $top_10_shops = array_slice($shop_information, 0, 9);
        // dd($top_10_shops);
        // $client = new Client();

        // $res = "https://maps.googleapis.com/maps/api/geocode/json?latlng=35.6585769,139.7454506&language=ja&key=AIzaSyDlKgPaV65IBh3J5HllqnB1OXJ9N1_WAMM";
        // $resp = $client->get($res);
        //  $responseBody = json_decode($resp->getBody(), true);
        //  if ($responseBody['status'] == 'OK') {
        //     // 住所情報を取得
        //     $address = $responseBody['results'][0]['formatted_address'];
        //     return response()->json(['address' => $address]);
        // } else {
        //     return response()->json(['error' => 'Unable to get address'], 500);
        // }
        //住所の変換
        $client = new Client();
        $apiKey = 'AIzaSyDlKgPaV65IBh3J5HllqnB1OXJ9N1_WAMM';
        $addresses = [];

        foreach ($top_10_shops as $shop) {
            $latitude = $shop->coordinates->latitude;
            $longitude = $shop->coordinates->longitude;

            $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng={$latitude},{$longitude}&language=ja&key={$apiKey}";
            $response = $client->get($url);
            $responseBody = json_decode($response->getBody(), true);

            if ($responseBody['status'] == 'OK') {
                $addre = $responseBody['results'][0]['formatted_address'];
                $filteredAddress = str_replace('日本、', '', $addre);
                $addresses[] = ['address' => $filteredAddress];
            } else {
                $addre = $responseBody['results'][0]['formatted_address'];
                $addresses[] = ['address' => 'Unable to get address'];
            }
        }

        return view('search_result')->with(['shop_info' => $top_10_shops, 'address' => $addresses]);
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
