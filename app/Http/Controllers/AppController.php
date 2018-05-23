<?php

namespace App\Http\Controllers;

use App\Models\promotion;
use App\Models\producttype;
use App\Models\product;
use App\Models\favorite;
use App\Models\basket;

use Laravel\Lumen\Routing\Controller as BaseController;

class AppController extends BaseController
{
    public function getTypeFood()  {
        $results = producttype::all();
        return response()->json($results);
    }

    public function getFoodList($id) {
        $results = product::where('prot_id', $id)->where('pro_status', 1)->get();
        return response()->json($results);
    }

    public function getPromotion() {
        $results = Promotion::where('end_date', '>=', date("Y-m-d"))->get();
        return response()->json($results);
    }

    public function getFavorite() {
        $pro_id = favorite::where('user_id', 25)->select('pro_id')->get();
        foreach ($pro_id as $value) {
            $product = product::where('pro_id', $value["pro_id"])->get();
            $results[] = $product['0'];
        }
        return response()->json($results);
    }

    public function getBasket() {
        $results = basket::all();
        return response()->json($results);
    }
}
