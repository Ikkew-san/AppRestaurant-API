<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\profile;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

class AuthenController extends BaseController
{
    private $response = array('status' => 1, 'message' => 'success');

    public function create(Request $request)
    {
        $user = new user;    
        $profile = new profile;

        $user ->user_username = $request->username;
        $user ->user_password1 = $request->password;
        $user ->user_email = $request->email;
        $user ->status = 1;
        $user ->save();

        $qry = user::where('user_username' , $user['user_username'])->select('user_id')->get();
        $profile ->user_id = $qry[0]['user_id'];
        $profile ->prof_mobile = $request->phone;
        $profile ->save();
        return response()->json($this->response);
    }

    public function authen(Request $request)
    {  
        $result = user::where([
            ['user_username', $request->username],
            ['user_password1', $request->password]
        ])->get();
        return response()->json($result);
    }

    // public function logged(Request $request)
    // {
    //     $result = user::find($request->id);
    //     $result->status = $request->status;
    //     $result->save();
    //     return response()->json($this->response); 
    // }

    public function profile($id) 
    {
        $result = profile::where('user_id', $id)->where('status', 1)->get();
        return response()->json($result);
    }

}
