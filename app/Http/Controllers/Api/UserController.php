<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Validator;
use Mail;

class UserController extends Controller {

    public function login(Request $request) {
        $validationRules = [
            'email' => 'required',
            'password' => 'required|max:255'
        ];

        $validator = Validator::make($request->all(), $validationRules);
        if ($validator->fails()) {
            $messages = $validator->messages();

            return response()->json(compact('messages'));
        }

        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            // Authentication passed...
            $user = auth()->user();
            $user->api_token = str_random(60);
            $user->save();

            $userData = [
                'id' => $user->id,
                'type' => $user->type,
                'name' => !empty($user->name) ? $user->name : '',
                'email' => $user->email,
                'mobile' => !empty($user->profile->mobile) ? $user->profile->mobile : '',
                'image' => !empty($user->profile->image) ? $user->profile->image : '',
                'country_id' => !empty($user->profile->country_id) ? $user->profile->country_id : '',
                'country_name' => !empty($user->profile->country->name) ? $user->profile->country->name : '',
                'city' => !empty($user->profile->city) ? $user->profile->city : '',
            ];

            return response()->json(['token' => $user->api_token, 'user' => $userData]);
        } else {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }
    }

    public function logout() {
        if (auth()->user()) {
            $user = auth()->user();
            $user->api_token = '';
            $user->save();
        }
        
        return response()->json(['success' => true]);
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        if ($validator->fails()) {
            $messages = $validator->messages();

            return response()->json(compact('messages'));
        }

        $token = str_random(60);
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'api_token' => $token
        ];

        /*if ($request->image) {
            $img = createImageFromBase64($request->input('image'));
            if ($img) {
                $userData['image'] = $img;
            }
        }*/

        $user = User::create($userData);

        $studentData = [
            'name' => $request->name,
            'mobile' => !empty($request->mobile) ? $request->mobile : '',
            'user_id' => $user->id
        ];
        $student = Student::create($studentData);

        $user->fk_id = $student->id;
        $user->save();
        
        $output = [
            'id' => $user->id,
            'token' => $token
        ];

        return response()->json($output);
    }

    public function profile() {
        $user = auth()->user();
        
        $output = [
            'id' => $user->id,
            'type' => $user->type,
            'name' => !empty($user->name) ? $user->name : '',
            'email' => !empty($user->email) ? $user->email : '',
            'mobile' => !empty($user->profile->mobile) ? $user->profile->mobile : '',
            'image' => !empty($user->profile->image) ? $user->profile->image : '',
            'country_id' => !empty($user->profile->country_id) ? $user->profile->country_id : '',
            'country_name' => !empty($user->profile->country->name) ? $user->profile->country->name : '',
            'city' => !empty($user->profile->city) ? $user->profile->city : '',
        ];

        return response()->json($output);
    }
    
    public function updateProfile(Request $request) {
        $user = auth()->user();
        
        $validationRules = [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'country_id' => 'exists:countries,id'
        ];
        // validate all inputs
        $validator = Validator::make($request->all(), $validationRules);
        if ($validator->fails()) {
            $messages = $validator->messages();

            return response()->json(compact('messages'));
        }
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        
        $studentData = [];
        /*if ($request->input('image')) {
            $img = createImageFromBase64($request->input('image'));
            if ($img) {
                $user->image = $img;
                $studentData['image'] = url('images/'.$img);
            }
        }*/
        
        if ($request->input('mobile')) {
            $studentData['mobile'] = $request->mobile;
        }
        if ($request->input('country_id')) {
            $studentData['country_id'] = $request->country_id;
        }
        if ($request->input('city')) {
            $studentData['city'] = $request->city;
        }

        Student::where('id', $user->fk_id)->update($studentData);
        
        return response()->json(['success' => true]);
    }
    
    /*public function forgotPassword(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return response()->json(compact('messages'));
        } else {
            if ($user = User::where('email', $request->input('email'))->first()) {
                $token = str_random(8);

                \DB::table(config('auth.passwords.users.table'))->insert([
                    'email' => $user->email,
                    'token' => $token
                ]);

                Mail::send(config('auth.passwords.users.email'), ['token' => $token], function ($m) use ($user) {
                    $m->from('admin@diet.com', 'Dr Diet');

                    $m->to($user->email, $user->name)->subject('Your Password Reset code');
                });

                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        }
    }

    public function resetPassword(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'code' => 'required',
            'password' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return response()->json(compact('messages'));
        } else {
            $pw_reset = \DB::table('password_resets')->where(['email' => $request->email, 'token' => $request->code])->first();
            if (!$pw_reset) {
                return response()->json(['success' => false]);
            }

            \DB::table('password_resets')->where(['email' => $request->email, 'token' => $request->code])->delete();
            $user = User::where('email', $request->email)->firstOrFail();
            $user->update(['password' => bcrypt($request->password)]);
            $user->save();

            return response()->json(['success' => true]);
        }
    }

    public function changePassword(Request $request) {
        $user = validateToken(true);
        if (isset($user->error)) {
            return response()->json(['error' => $user->error], $user->error_code);
        }
        
        $profileData = array('answer_questions_status' => $user->answer_questions_status, 'payment_status' => $user->payment_status, 'complete_profile_status' => $user->complete_profile_status, 'send_weight_flag' => $user->send_weight_flag);
        unset($user->answer_questions_status);
        unset($user->payment_status);
        unset($user->complete_profile_status);
        unset($user->send_weight_flag);
        unset($user->error);
        unset($user->error_code);
        
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|max:255',
            'password' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return response()->json(compact('messages'));
        }
        
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            
            return response()->json(['success' => true] + $profileData);
        } else {
            return response()->json(['success' => false] + $profileData);
        }
    }*/
}
