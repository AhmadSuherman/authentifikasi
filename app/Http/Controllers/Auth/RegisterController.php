<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
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

    
    public function registerTeacher()
    {
        return view('auth.register-teacher');
    }

    public function registerStaff()
    {
        return view('auth.register-staff');
    }

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
            'usr_name' => ['required', 'string', 'max:255'],
            'usr_email' => ['required', 'string', 'max:255', 'unique:users,usr_email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'usr_phone' => ['required', 'min:11', 'max:14'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if($data['role'] == 1) {
        $students = User::create([
            'usr_name' => $data['usr_name'],
            'usr_email' => $data['usr_email'],
            'usr_phone' => $data['usr_phone'],
            'usr_password' => Hash::make($data['password']),
        ]);

        $students->assignRole('student');

        return $students;
        }     

        if($data['role'] == 2) {
        $students = User::create([
            'usr_name' => $data['usr_name'],
            'usr_email' => $data['usr_email'],
            'usr_phone' => $data['usr_phone'],
            'usr_password' => Hash::make($data['password']),
        ]);

        $students->assignRole('teacher');

        return $students;
        }

        if($data['role'] == 3) {
        $students = User::create([
            'usr_name' => $data['usr_name'],
            'usr_email' => $data['usr_email'],
            'usr_phone' => $data['usr_phone'],
            'usr_password' => Hash::make($data['password']),
        ]);

        $students->assignRole('staff');

        return $students;
        }     
    }
}
