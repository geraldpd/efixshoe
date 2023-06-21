<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Rules\IsValidPassword;
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'first_name' => ['required', 'string', 'max:255', 'regex:/^([^0-9]*)$/'],
            'last_name' => ['required', 'string', 'max:255', 'regex:/^([^0-9]*)$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contact_number' => ['required', 'digits:11', 'regex:/(09)[0-9]{9}/', 'numeric', 'unique:users'],
            'brgy' => ['required'],
            'city' => ['required'],
            'address' => ['required', 'max:1000'],
            'password' => ['required', 'string', 'min:8', 'confirmed', new IsValidPassword()],
        ], [
            'first_name.regex' => 'Invalid format. Characters only.',
            'last_name.regex' => 'Invalid format. Characters only.'
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
        $customer = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'contact_number' => $data['contact_number'],
            'address' => "{$data['address']}, {$data['brgy']}, {$data['city']}",
            'password' => Hash::make($data['password']),
        ]);

        $customer->assignRole('customer');

        return $customer;
    }
}
