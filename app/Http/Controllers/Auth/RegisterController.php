<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{
    /* 
        implement the registration
    */
    public function register(Request $request)
    {
        // Make sure the name, email
        // password and password_confirmation fields are required.
        // (the validator method is located inside the registerController)
        $this->validator($request->all())->validate();

        // A register event is created and will trigger any relevant
        // observes, such as sending a confirmation email or any code
        // that needs to be run as soon as the user is created.
        event(new Registered($user = $this->create($request->all())));

        // After the user is created, he's logged in
        //Auth::guard()->login($user);

        // And finally this is the hook that we want.
        // If thre is no registered() method or it return null,
        // redirect to some other URL.
        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /* 
        create a new user instance after a valid registration
    */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /* 
        The user has been registered
    */
    protected function registered(Request $request, $user)
    {
        $user->generateToken();

        return response()->json(['data' => $user->toArray()], 201);
    }

    /* 
        Get a validator for an incoming registeration request
    */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }
}
