<?php

namespace App\Http\Controllers;

use App\Models\promotion;
use Laravel\Lumen\Routing\Controller as BaseController;

class AppController extends BaseController
{
    public function getPromotion() {
        $results = Promotion::where('end_date', '>=', date("Y-m-d"))->get();
        return response()->json($results);
    }
}
