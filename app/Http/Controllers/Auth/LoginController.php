<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        Auth::validate($credentials);

        if (Auth::attempt($credentials)){
            $user = Auth::guard()->user();
            $user->generateToken();

            return response()->json([
                'data' => $user->toArray(),
            ]);
        }

        return $this->sendFailedLoginResponse($request);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = ['error' => trans('auth.failed')];

        return response()->json($errors, 422);
    }
}
