<?php

namespace App\Http\Controllers;

use App\Models\promotion;
use App\Models\producttype;
use App\Models\product;

use Laravel\Lumen\Routing\Controller as BaseController;

class AppController extends BaseController
{
    public function getTypeFood()  {
        $results = producttype::all();
        return response()->json($results);
    }

    public function getFoodList($id) {
        $results = product::where('prot_id', $id)->get();
        return response()->json($results);
    }

    public function getPromotion() {
        $results = Promotion::where('end_date', '>=', date("Y-m-d"))->get();
        return response()->json($results);
    }
}
