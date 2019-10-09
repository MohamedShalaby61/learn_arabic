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

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
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
                'title' => ['required', 'string', 'max:255'],
                'video' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
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
        return view('tutor::edit');
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
        //
    }
}
