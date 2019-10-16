<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Student;
use App\Models\Tutor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Traits\{HelpersTrait, ZoomTrait};

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
    use HelpersTrait;
    use ZoomTrait;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'mobile' => ['nullable', 'numeric', 'digits_between:0,15']
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
        $request = request();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'type' => $data['type'],
            'password' => Hash::make($data['password']),
        ]);

        if ($data['type'] == 2) {
            $tutorData = [
                'name' => $data['name'],
                'mobile' => $data['mobile'],
                'title' => $data['title'],
                'video' => '',
                'user_id' => $user->id
            ];
            if ($request->hasFile('video')) {
                $tutorData['video'] = $this->customUploadFile('video', 'tutors');
            }
            if($newZoomUser = $this->createUser($data['email'], $data['name']))
            {
                $tutorData['zoom_id'] = $newZoomUser->id;
            }
            $insertedRecord = Tutor::create($tutorData);

        } else {
            $studentData = [
                'name' => $data['name'],
                'mobile' => $data['mobile'],
                'user_id' => $user->id
            ];
            $insertedRecord = Student::create($studentData);
        }

        $user->fk_id = $insertedRecord->id;
        $user->save();
        
        return $user;
    }
}
