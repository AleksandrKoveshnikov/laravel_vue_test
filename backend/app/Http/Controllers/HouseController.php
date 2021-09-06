<?php

namespace App\Http\Controllers;

use Illuminate\Http\{JsonResponse, Request};
use App\Http\Resources\HouseResource;
use App\Models\House;

class HouseController extends Controller
{
    
    public function index()
    {
        return 'test';
    }

    public function filtersDictionary()
    {
        $types = ['bedrooms', 'bathrooms', 'storeys', 'garages'];
        $dictionary = [
            'price' => [
                House::min('price'),
                House::max('price'),
            ],
        ];

        foreach ($types as $type) {
            $dictionary[$type] = array_column(House::select($type)->distinct()->get()->toArray(), $type);
        }

        return response()->json($dictionary, JsonResponse::HTTP_OK);
    }

    public function getResults(Request $request)
    {

        $resultHouses = House::query();

        $queries = [
            'Name' => [
                'type' => 'partial',
                'value' =>  $request->get('name')
            ],
            'Bathrooms' => [
                'type' => 'exact',
                'value' =>  $request->get('bathrooms')
            ],
            'Bedrooms' => [
                'type' => 'exact',
                'value' =>  $request->get('bedrooms')
            ],
            'Storeys' => [
                'type' => 'exact',
                'value' =>  $request->get('storeys')
            ],
            'Garages' => [
                'type' => 'exact',
                'value' =>  $request->get('garages')
            ],
            'Price' => [
                'type' => 'range',
                'value' =>  $request->get('price')
            ],
        ];

        foreach ($queries as $key => $array) {
            if ($array['value']) {
                switch ($array['type']) {
                    case 'exact':
                        $resultHouses = $resultHouses->where($key, $array['value']);
                        break;
                    case 'partial':
                        $resultHouses = $resultHouses->where($key, 'like', '%' . $array['value'] . '%');
                        break;
                    case 'range':
                        $resultHouses = $resultHouses->whereBetween($key, [min($array['value']), max($array['value'])]);
                        break;
                }
            }
        }

        return response()->json(HouseResource::collection($resultHouses->get()), JsonResponse::HTTP_OK);
    }
}
