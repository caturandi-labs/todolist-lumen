<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class LoginController extends Controller
{
    use ApiResponser;
   
   public function index(Request $request)
   {
        $hasher = app()->make('hash');
        $username = $request->input('username');
        $password = $request->input('password');

        $login = User::where('username', $username)->first();
        if (!$login) {
            return response()->json([
                'success' => false,
                'message' => 'Credentials anda tidak dikenali oleh sistem kami'
            ]);
        }else{
            if ($hasher->check($password, $login->password)) {
                $api_token = base64_encode($login->username .':'.$login->password.':'. sha1(time()));
                $create_token = User::where('id', $login->id)->update(['api_token' => $api_token]);
                if ($create_token) {
                    $res['success'] = true;
                    $res['api_token'] = $api_token;
                    return response()->json($res);
                }
            }else{
                $res['success'] = true;
                $res['message'] = 'You username or password incorrect!';
                return response($res);
            }
        }
    }

    
}
