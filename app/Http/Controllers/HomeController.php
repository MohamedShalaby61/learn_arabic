<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use App\Models\Testimonial;
use App\Models\Course;
use App\Models\CourseLesson;
use App\Models\Call;
use App\Models\TutorTime;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use Mail;

class HomeController extends Controller
{
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->type == 2 && (!Auth::user()->profile->image || !Auth::user()->profile->video || !Auth::user()->profile->teaching_experience || !Auth::user()->profile->education)) {
                return redirect('tutor/profile');
            }
            $this->getFavorites();
        } else {
            $this->data['favorites'][0] = [];
            $this->data['favorites'][1] = [];
        }

        $this->data['topTutors'] = Tutor::where('status', 1)->whereNotNull('image')->whereNotNull('teaching_experience')->whereNotNull('education')->orderBy('online', 'desc')->orderBy('rating', 'desc')->limit(6)->get();
        $this->data['testimonials'] = Testimonial::where('status', 1)->orderBy('created_at', 'desc')->limit(3)->get();

        return view('home')->with($this->data);
    }
    
    public function students()
    {
        $this->getFavorites();
        $this->data['tutors'] = Tutor::where('status', 1)->whereNotNull('image')->whereNotNull('teaching_experience')->whereNotNull('education')->orderBy('online', 'desc')->orderBy('rating', 'desc')->get();
        return view('students')->with($this->data);
    }

    public function ajaxStudents()
    {
        $this->getFavorites();
        $this->data['tutors'] = Tutor::where('status', 1)->whereNotNull('image')->whereNotNull('teaching_experience')->whereNotNull('education')->orderBy('online', 'desc')->orderBy('rating', 'desc')->get();

        return $this->data;
    }

    public function tutorProfile($id)
    {
        //$this->middleware('auth');

        $tutor = Tutor::findOrFail($id);

        $timesArr = [];
        $times = TutorTime::where(['tutor_id' => $id, 'status' => 1])->whereDate('date', '>', Carbon::now())->get();
        foreach ($times as $time) {
            $timestamp = strtotime($time->date);
            $year = date('Y', $timestamp);
            $month = date('n', $timestamp);
            $day = date('j', $timestamp);
            $timesArr[$year][$month][$day][] = [
                'startTime' => $time->from,
                'endTime' => $time->to,
                'text' => ''
            ];
        }

        return view('tutor_profile')->with(['tutor' => $tutor, 'timesArr' => $timesArr]);
    }

    public function schedule()
    {
        $this->getFavorites();
        
        return view('schedule')->with($this->data);
    }
    public function studentSchedule()
    {
        $this->getFavorites();

        return view('studentSchedule')->with($this->data);
    }

    public function about()
    {
        $this->getFavorites();
        
        return view('about')->with($this->data);
    }

    public function contact()
    {
        $this->getFavorites();

        return view('contact')->with($this->data);
    }

    public function contactSubmit(Request $request)
    {
        $data = $request->all();
        if (empty($data['name']) || empty($data['email']) || empty($data['message'])) {
            return response()->json(['type' => 'danger', 'message' => 'Error: you should fill the mandatory fields']);
        }

        Mail::send('emails.contact', ['data' => $data], function ($m) {
            $m->from('www-data@ubuntu-s-1vcpu-1gb-lon1-01', config('app.name', 'Learn Arabic'));
            $m->to('moh_ewida@hotmail.com', config('app.name', 'Learn Arabic'))->subject(config('app.name', 'Learn Arabic') . ' - New contact message');
        });

        return response()->json(['type' => 'success', 'message' => 'Success: We have received your message, and we will contact you soon']);
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
    
    public function courses()
    {
        $this->getFavorites();
        $this->data['courses'] = Course::where('status', 1)->get();
        
        return view('courses')->with($this->data);
    }
    
    public function courseDetails($id)
    {
        $this->getFavorites();
        $this->data['course'] = Course::with('lessons')->find($id);

        return view('course_details')->with($this->data);
    }
    
    public function courseLesson($id)
    {
        $this->getFavorites();
        $this->data['lesson'] = CourseLesson::find($id);

        return view('course_lesson')->with($this->data);
    }

    public function calls()
    {
        $this->getFavorites();

        if (Auth::user()->type == 2) {
            $this->data['calls'] = Call::where('tutor_id', Auth::user()->fk_id)->orderBy('id', 'desc')->get();
        } else {
            $this->data['calls'] = Call::where('student_id', Auth::user()->fk_id)->orderBy('id', 'desc')->get();
        }

        return view('calls')->with($this->data);
    }

    public function progress(){
        return view('progress');
    }
}
