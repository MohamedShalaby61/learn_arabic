<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Call;
use App\Models\User;
use App\Models\Tutor;
use App\Models\Student;
use App\Models\TutorTime;
use App\Models\Speciality;
use App\Models\UserCourse;
use App\Models\CourseTutor;

use App\Traits\HelpersTrait;
use Illuminate\Http\Request;
use App\Models\TutorSpeciality;
use Illuminate\Support\Collection;
use App\Models\TutoringPersonality;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Tutor\PostAvailabilityRequest;

class TutorController extends Controller
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
		$this->data['favorites_ids'] = [];
        $this->data['favorites'][0] = [];
        $this->data['favorites'][1] = [];
//        $this->middleware('auth');        
    }

    public function calls()
    {
        $this->data['calls'] = Call::where('tutor_id', Auth::user()->fk_id)->with('student')->orderBy('created_at', 'desc')->get();

        return view('tutor.calls')->with($this->data);
    }

    public function register(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'title' => ['required', 'string', 'max:255'],
                'video' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'mobile' => ['nullable', 'numeric', 'digits_between:0,15']
            ]);
            
            $data = $request->all();
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'mobile' => $data['mobile'],
                'password' => Hash::make($data['password']),
                'type' => 2
            ]);
            if ($request->hasFile('video')) {
                $data['video'] = $this->customUploadFile('video', 'tutors');
            }
            $tutorData = [
                'name' => $data['name'],
                'mobile' => $data['mobile'],
                'title' => $data['title'],
                'video' => $data['video'],
                'user_id' => $user->id
            ];
            $tutor = Tutor::create($tutorData);

            $user->fk_id = $tutor->id;
            $user->save();

            return redirect(route('login'));
        }

        return view('tutor.register')->with($this->data);
    }

    public function profile(Request $request)
    {
        if ($request->isMethod('PUT')) {
            $inputs = $request->all();
            $data = $request->only(['name', 'title', 'video', 'tutoring_personality_id', 'teaching_experience', 'profession', 'education', 'interests']);

            if (isset($inputs['name'])) {
				Auth::user()->update(['name' => $inputs['name']]);
			}
			
            if ($request->hasFile('image')) {
                $data['image'] = $this->customUploadFile('image', 'tutors');
            }

            if ($request->hasFile('video')) {
                $data['video'] = $this->customUploadFile('video', 'tutors');
            }

            if (!empty($inputs['password']) && $inputs['password'] != 'password') {
                Auth::user()->update(['password' => Hash::make($inputs['password'])]);
            }

            if (isset($inputs['specialities'])) {
                TutorSpeciality::where('tutor_id', Auth::user()->fk_id)->delete();
                if (!empty($inputs['specialities'])) {
                    $specialities = [];
                    foreach ($request->specialities as $speciality) {
                        $specialities[] = [
                            'tutor_id' => Auth::user()->fk_id,
                            'speciality_id' => $speciality
                        ];
                    }

                    TutorSpeciality::insert($specialities);
                }
            }
            
            if (!empty($inputs['levels'])) {
                $data['levels'] = implode(',', $request->levels);
            } elseif (isset($inputs['levels'])) {
                $data['levels'] = '';
            }
            
            if (!empty($inputs['certificates'])) {
                $data['certificates'] = implode(',', $request->certificates);
            } elseif (isset($inputs['certificates'])) {
                $data['certificates'] = '';
            }
            
            if (!empty($inputs['speaks'])) {
                $data['speaks'] = implode(',', $request->speaks);
            } elseif (isset($inputs['speaks'])) {
                $data['speaks'] = '';
            }
            
            if (!empty($inputs['enjoys_discussing'])) {
                $data['enjoys_discussing'] = implode(',', $request->enjoys_discussing);
            } elseif (isset($inputs['enjoys_discussing'])) {
                $data['enjoys_discussing'] = '';
            }

            if (count($data)) {
                Auth::user()->profile()->update($data);
            }
        }

        $this->data['specialities'] = Speciality::orderBy('name', 'asc')->get();
        $this->data['tutoringPersonalities'] = TutoringPersonality::orderBy('name', 'asc')->get();
        $this->data['tutorSpecialities'] = TutorSpeciality::where('tutor_id', Auth::user()->fk_id)->pluck('speciality_id')->toArray();
        
        return view('tutor.profile')->with($this->data);
    }
    public function tutorStudent()
    {
        $S_arr=[];
        $S_arr2=[];
        $S_arr3=[];
        $courses = CourseTutor::where('tutor_id', \auth()->id())->get()->pluck('course_id')->toArray();
        $toturCalls=Call::where('tutor_id',\auth()->id())->with('student')->get()->unique('student_id');
        if($toturCalls->count()>0){
            $S_arr2=$toturCalls->pluck('student_id')->toArray();
        }
        $student = UserCourse::with('students')->whereIn('course_id', $courses)->get();
        if($student->count()>0){
            $S_arr=$student->pluck('student_id')->toArray();
        }
        $studentTime=TutorTime::whereNotNull('booked_user_id')->where(['tutor_id'=>\auth()->user()->fk_id])->get();
        if($studentTime->count()>0){
            foreach ($studentTime as $st){
                array_push($S_arr3,$st->bookedUser->fk_id);
            }
        }
        $all=array_merge($S_arr2,$S_arr);
        $allStudent=array_merge($S_arr3,$all);
        $tutorStudent=Student::whereIn('id',$allStudent)->get();
        return view('tutor.student', compact('tutorStudent'));
    }

    public function availability(){
        return view('tutor.availability', compact('tutorAvailableTimes'));
    }
    public function postAvailability(PostAvailabilityRequest $request)
    {
        $final=[];
        // $tutorTimes = auth()->user()->profile->availableTimes->pluck('to', 'from')->toArray() ?? null;
        foreach ($request->from as $key=>$value){
           $from = Carbon::parse($value);
           $to = Carbon::parse($request->to[$key]);
            // dd($from, $to, date('Y-m-d', strtotime($request->date)), $value, $request->to);

           $data['from']=$value;
           $data['to']=$request->to[$key];
           $data['tutor_id']=\auth()->user()->fk_id;
           $data['date']=date('Y-m-d', strtotime($request->date));
           $data['status']=1;
           $data['created_at']=Carbon::now();
           $data['updated_at']=Carbon::now();
           array_push($final,$data);
       }
       TutorTime::insert($final);
       return back()->with('success','Done');
    }

    public function getTutorTime($date,$tutor)
    {
       $thisDate=date('Y-m-d',strtotime($date));
       $times=TutorTime::with(['bookedUser','tutor'])->where(['tutor_id'=>$tutor,'status'=>1,'date'=>$thisDate])->get();
        return view('profileTime',compact('times'));
    }
    public function bookTime(Request $request)
    {
        $time=TutorTime::find($request->time_id);
        if($time->booked_user_id ==null){
            $data['booked_datetime']=Carbon::now();
            $data['booked_user_id']=\auth()->id();
            $time->update($data);
        }else{
            return back()->withErrors('This Time is Booked');
        }

        return back()->with('success','Booked');
    }
    public function allTutorTimes()
    {
        $time=TutorTime::with(['bookedUser','tutor'])->where(['tutor_id'=>\auth()->user()->fk_id,'status'=>1])->get();
        return response()->json($time);
    }
    public function thisTutorTime($tutor)
    {
        $time=TutorTime::with(['bookedUser','tutor'])->where(['tutor_id'=>$tutor,'status'=>1])->get();
        return response()->json($time);
    }
    public function allStudentTimes()
    {
        $time=TutorTime::with(['bookedUser','tutor'])->where(['booked_user_id'=>\auth()->id(),'status'=>1])->get();
        return response()->json($time);
    }
    public function cancelTime($time)
    {
        $time=TutorTime::find($time);
        $data['status']=0;
        $time->update($data);
        return back()->with('success','canceled');
    }
    public function cancelStudentTime($time)
    {
        $time=TutorTime::find($time);
        $data['booked_user_id']=null;
        $data['booked_datetime']=null;
        $time->update($data);
        return back()->with('success','canceled');
    }
}
