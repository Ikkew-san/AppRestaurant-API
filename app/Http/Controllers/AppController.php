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
        $results = favorite::all();
        return response()->json($results);
    }

    public function getBasket() {
        $results = basket::all();
        return response()->json($results);
    }
}
