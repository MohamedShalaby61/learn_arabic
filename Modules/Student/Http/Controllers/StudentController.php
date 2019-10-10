<?php

namespace Modules\Student\Http\Controllers;

use App\Models\Accent;
use App\Models\Country;
use App\Models\Student;
use App\Models\TutoringPersonality;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Traits\HelpersTrait;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    use HelpersTrait;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $rows = User::query()->where('type' ,3)->get();
        return view('student::index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $countries = Country::all();
        $lessons_type = DB::table('lessons_types')->get();
        $lessons_personalities = TutoringPersonality::all();
        $accents = Accent::all();
        return view('student::create',compact('countries','accents','lessons_personalities','lessons_type'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
            ]);

            $data = $request->all();
            //dd($request->all());
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'mobile' => in_array('mobile',$data) ? $data['mobile'] : null,
                'password' => Hash::make($data['password']),
                'type' => 3
            ]);


            $studentData = $request->except(['email','password']);
            if ($request->image){
                $studentData['image'] = $this->customUploadFile('image', 'students');
            }


            if (!empty($data['interests'])) {
                $studentData['interests'] = implode(',', $request->interests);
            } elseif (isset($data['interests'])) {
                $studentData['interests'] = '';
            }


        }
        $student = Student::create($studentData + ['user_id'=>$user->id]);

        $user->fk_id = $student->id;
        $user->save();

        Session::flash('message', __('common::common.add_message'));
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('students.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('student::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $row = User::find($id);
        $student = Student::find($row);
        $countries = Country::all();
        $lessons_type = DB::table('lessons_types')->get();
        $lessons_personalities = TutoringPersonality::all();
        $accents = Accent::all();
        return view('student::create',compact('student','row','countries','accents','lessons_personalities','lessons_type'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        
    }
}
