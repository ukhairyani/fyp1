<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Driver;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'matricNo' => 'required|max:10|unique:users',
            'name' => 'required|max:50',
            'noIc' => 'required|max:15',
            'noTel' => 'required|max:15',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
            'gender' => 'required|max:10',
            'address' => 'required|max:50',
            'faculty' => 'required|max:50',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'matricNo' => $data['matricNo'],
            'name' => $data['name'],
            'noIc' => $data['noIc'],
            'noTel' => $data['noTel'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'gender' => $data['gender'],
            'address' => $data['address'],
            'faculty' => $data['faculty'],

        ]);
        $user->driver()->create([
            'user_id' => $user->id,
            'gambar_profile' => null,
            'noLesen' => null,
            'lesen_luput' => null,
            'gambar_lesen' => null,
            'gambar_ic' => null,
            'no_plat' => null,
            'jenis_kereta' => null,
            'roadtax_luput' => null,
        ]);
        return $user;
    }

}
