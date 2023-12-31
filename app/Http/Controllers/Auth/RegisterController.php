<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
<<<<<<< HEAD
    /* protected $redirectTo = RouteServiceProvider::HOME; */
    protected $redirectTo = '/appointment';

=======
    protected $redirectTo = RouteServiceProvider::HOME2;
    // protected $redirectTo = 'auth.register';
>>>>>>> 5cdb635b1decd8a5efa001eed74e474bc2cd564b

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
<<<<<<< HEAD
        //$this->middleware('guest');
=======
        $this->middleware('guest');
>>>>>>> 5cdb635b1decd8a5efa001eed74e474bc2cd564b
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
<<<<<<< HEAD
            'role' => $data['role'],
=======
>>>>>>> 5cdb635b1decd8a5efa001eed74e474bc2cd564b
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
