<?php

namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

class AuthenController extends BaseController
{
    public function create(Request $request)
    {
    $results = new user;    
    $results ->user_username = $request->username;
    $results ->user_password1 = $request->password;
    $results ->user_email = $request->email;
    $results ->user_phone = $request->phone;
    $results->status = 1;
    $results ->save();
    return response()->json($this->response); 
    }

}
