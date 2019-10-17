<?php

namespace Modules\Tutor\Http\Controllers;

use App\Models\Accent;
use App\Models\Country;
use App\Models\Tutor;
use App\Models\TutoringPersonality;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Traits\HelpersTrait;
use Illuminate\Support\Facades\Session;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    use HelpersTrait;

    public function index()
    {
        $rows = User::with(['profile'])->where('type','=',2)->get();
        return view('tutor::index',compact('rows'));
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
        return view('tutor::create',compact('countries','lessons_type','lessons_personalities','accents'));
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
                'mobile' => ['nullable', 'numeric', 'digits_between:0,15'],
            ]);

            $data = $request->all();
//dd($data);
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'mobile' => in_array('mobile',$data) ? $data['mobile'] : null,
                'password' => Hash::make($data['password']),
                'type' => 2
            ]);


            $tutorData = $request->except(['email','password']);
            if ($request->image){
                $tutorData['image'] = $this->customUploadFile('image', 'tutors');
            }

        }
            //$tutorData = array_filter($tutorData);

            //dd($tutorData);

            $tutor = Tutor::create($tutorData + ['user_id'=>$user->id]);

            $user->fk_id = $tutor->id;
            $user->save();

            Session::flash('message', __('common::common.add_message'));
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('tutors.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('tutor::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $row = User::find($id);
        $tutor = Tutor::find($row->fk_id);
        $countries = Country::all();
        $lessons_type = DB::table('lessons_types')->get();
        $lessons_personalities = TutoringPersonality::all();
        $accents = Accent::all();

        return view('tutor::edit',compact('tutor','row','countries','lessons_type','lessons_personalities','accents'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'title' => ['required', 'string', 'max:255'],
                'video' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
                'mobile' => ['nullable', 'numeric', 'digits_between:0,15'],
            ]);

            $data = $request->all();

            $user = User::find($id);
            $user->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'mobile' => in_array('mobile',$data) ? $data['mobile'] : null,
                'password' => $request->password !== null && $request->has('password') ? Hash::make($data['password']) : $user->password,
            ]);


            $tutorData = $request->except(['email','password']);
            if ($request->image){
                $tutorData['image'] = $this->customUploadFile('image', 'tutors');
            }

        $tutor = Tutor::find($user->fk_id);
        $tutor->update($tutorData);


        Session::flash('message', __('common::common.edit_message'));
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('tutors.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Session::flash('message', __('common::common.delete_message'));
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('tutors.index');
    }
}
