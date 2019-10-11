<?php

namespace Modules\Course\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{

    public function index()
    {
        $rows = Course::all();
        return view('course::index' , compact('rows'));
    }

    public function create()
    {
        return view('course::create');
    }

    
    public function store(Request $request)
    {
        if ($request->has('close')){
            return redirect()->route('courses.index');
        }

        $data = $request->validate([
                   'title'       => 'required|max:255' ,
                   'title_ar'       => 'required|max:255' ,
                   'description' => 'required' ,
                   'description_ar' => 'required' ,
                   'cost'        => 'required' ,
                   'image'       => 'max:255' ,
                   'suitable_for'=> 'required|max:300' ,
                   'suitable_for_ar'=> 'required|max:300' ,
                 ]);

        $data = $request->except(['add_and_close','add_and_go_to_lesson']);
        if($request->hasFile('image')){
            $data['image'] = $this->customUploadFile('image', 'courses');
        }

        $course = Course::create($data);

        if ($request->has('add_and_close')){
            Session::flash('message', __('common::common.add_message'));
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('courses.index');
        }

        if ($request->has('add_and_go_to_lesson')){
            Session::flash('message', __('common::common.add_message'));
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('lessons.create',$course->id);
        }

    }

    
    public function show($id)
    {
        return view('course::show');
    }

    
    public function edit($id)
    {
        $row = Course::find($id);
        $row =  DB::table('courses')
            ->where('id', $row->id)
            ->first();
        //dd($row);
        return view('course::edit',compact('row'));
    }

    
    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        $data = $request->validate([
            'title'       => 'required|max:255' ,
            'title_ar'       => 'required|max:255' ,
            'description' => 'required' ,
            'description_ar' => 'required' ,
            'cost'        => 'required' ,
            'image'       => 'max:255' ,
            'suitable_for'=> 'required|max:300' ,
            'suitable_for_ar'=> 'required|max:300' ,
        ]);


        if($request->hasFile('image')){
            $data['image'] = $this->customUploadFile('image', 'courses');
        }

        $course = $course->update($data);
        Session::flash('message', __('common::common.edit_message'));
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('courses.index');

    }

    
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        Session::flash('message', __('common::common.delete_message'));
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('courses.index');
       
    }
}
