<?php

namespace App\Http\Controllers\Auth;

use App\Customer;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('site.auth.register');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
//            'username' => 'required|string|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
        $customer = Customer::create([
            'state' => 1,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        $user = $customer->user()->create([
            'name' => $data['name'],
            'username' => $data['email'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'state' => 0,
        ]);

        $roleId = Role::where('name', 'customer')->first()->id;

        $user->roles()->attach([
            'role_id' => $roleId
        ]);

        return $user;
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        \Log::info(class_basename(Auth::user()->loginable));
        if (class_basename(Auth::user()->loginable) == 'Customer') {
            return 'dashboard';
        }

        \Log::info('bade if');
        return strtolower(class_basename(Auth::user()->loginable));
    }
}
