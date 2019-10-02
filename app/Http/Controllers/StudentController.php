<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Package;
use App\Models\PackagePrice;
use App\Models\UserCourse;
use App\Models\FavoriteTutor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

use App\Traits\HelpersTrait;

class StudentController extends Controller
{
    use HelpersTrait;

    private $data = [];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');        
    }
    
    public function profile(Request $request)
    {
        if ($request->isMethod('PUT')) {
            $inputs = $request->all();
            $data = $request->only(['name', 'mobile', 'country_id', 'city', 'level', 'corrections', 'goals', 'lang', 'desktop_notifications']);

            if (isset($inputs['name'])) {
				Auth::user()->update(['name' => $inputs['name']]);
			}

            if (isset($inputs['email'])) {
                Auth::user()->update(['email' => $inputs['email']]);
            }
			
            if (!empty($inputs['interests'])) {
                $data['interests'] = implode(',', $request->interests);
            } elseif (isset($inputs['interests'])) {
                $data['interests'] = '';
            }

            if (isset($data['country_id']) && !isset($data['desktop_notifications'])) {
                $data['desktop_notifications'] = 0;
            }

            if ($request->hasFile('image')) {

                
                request()->validate([
                    'image' => 'image|max:10000|mimes:jpeg,png,jpg,gif,svg'
                ]);                 

                 $data['image'] = $this->customUploadFile('image', 'students');
            }

            if (!empty($inputs['password']) && $inputs['password'] != 'password') {
                Auth::user()->update(['password' => Hash::make($inputs['password'])]);
            }

            if (count($data)) {
                Auth::user()->profile()->update($data);
            }
        }

        $this->getFavorites();
        $this->data['countries'] = Country::orderBy('name', 'asc')->get(['id', 'name']);

        return view('student.profile')->with($this->data);
    }

    public function subscribe()
    {
        $this->getFavorites();

        $this->data['packages'] = Package::all();
        $this->data['prices'] = [];

        $prices = PackagePrice::all();
        foreach ($prices as $price) {
            $this->data['prices'][$price->months][$price->days][$price->minutes] = $price->price_month;
        }

        $this->data['bodyAttributes'] = 'class="form-bg"';

        return view('student.subscribe')->with($this->data);
    }


    public function subscribe_course($id){
        $this->data['courseId'] = $id;
        $this->data['course'] = \App\Models\Course::findOrFail($id);
        $this->data['bodyAttributes'] = 'class="form-bg"';

        return view('subscribe_courses')->with($this->data);
    }
    
    public function subscribe_course_confirmation($id){
        \App\Models\Course::findOrFail($id);
        UserCourse::create([
            'student_id' => Auth::user()->fk_id,
            'course_id' => $id,
            'status' => 0
        ]);

        return redirect('/student/enrolled');
    }

    public function payment($months, $days, $minutes)
    {
		$this->getFavorites();
		$this->data['package'] = Package::where('months', $months)->firstOrFail();
		$this->data['price'] = PackagePrice::where(['months' => $months, 'days' => $days, 'minutes' => $minutes])->firstOrFail();
        
        return view('student.payment')->with($this->data);
    }

    public function enrollCourse($id)
    {
        $exists = UserCourse::where('student_id', Auth::user()->fk_id)->where('course_id', $id)->first();
        if (!$exists) {
            UserCourse::create(['student_id' => Auth::user()->fk_id, 'course_id' => $id, 'status' => 0]);
        }

        return redirect(route('student.enrolled'));
    }
    
    public function enrolled()
    {
        $this->getFavorites();

        $this->data['enrolled_courses'] = UserCourse::where('student_id', Auth::user()->fk_id)->where('status', 0)->orderBy('id', 'desc')->get();
        $this->data['courses_enrolled_count'] = UserCourse::where('student_id', Auth::user()->fk_id)->count();
        $this->data['courses_completed_count'] = UserCourse::where('status', 1)->where('student_id', Auth::user()->fk_id)->count();
        $this->data['courses_inprogress_count'] = UserCourse::where('status', 0)->where('student_id', Auth::user()->fk_id)->count();
        
        return view('student.enrolled')->with($this->data);
    }

    public function likeTutor(Request $request)
    {
        if (isset($request->tutor_id) && isset($request->value)) {
            $exists = FavoriteTutor::where('student_id', Auth::user()->fk_id)->where('tutor_id', $request->tutor_id)->first();
            if (!$exists && $request->value == 1) {
                FavoriteTutor::create(['student_id' => Auth::user()->fk_id, 'tutor_id' => $request->tutor_id]);
            } elseif ($exists && $request->value == 0) {
                $exists->delete();
            }
        }

        return response()->json(['success' => 1]);
    }
	
    private function getFavorites()
    {
        $this->data['favorites_ids'] = [];
        $this->data['favorites'][0] = [];
        $this->data['favorites'][1] = [];
        $favorites = @Auth::user()->profile->favorites;
        if ($favorites) {
            foreach ($favorites as $tutor) {
                $this->data['favorites'][$tutor->online][] = $tutor;
                $this->data['favorites_ids'][] = $tutor->id;
            }
        }
    }
}
