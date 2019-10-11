<?php

namespace Modules\Lesson\Http\Controllers;

use App\Models\Course;
use App\Models\CourseLesson;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($id)
    {
        $course = Course::find($id);
        $rows = $course->lessons;
        return view('lesson::index',compact('rows','course'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create($id)
    {
        $row = Course::find($id);
        return view('lesson::create',compact('row'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'content' => 'required',
            'categories' => 'required',
            'course_id' => 'required',
        ]);

        $data = $request->except(['add_and_close','add_and_more']);
        if($request->hasFile('image')){
            $data['image'] = $this->customUploadFile('image', 'lessons');
        }
        $lesson = CourseLesson::create($data);

        if ($request->has('add_and_close')){
            Session::flash('message', __('common::common.add_message'));
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('courses.index');
        }

        if ($request->has('add_and_more')){
            Session::flash('message', __('common::common.add_message'));
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('lessons.create',$request->course_id);
        }
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $row = CourseLesson::find($id);
        return view('lesson::edit',compact('row'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $lesson = CourseLesson::find($id);
        $course = Course::find($lesson->course_id);
        $data = $request->validate([
            'name' => 'required',
            'content' => 'required',
        ]);

        if($request->hasFile('image')){
            $data['image'] = $this->customUploadFile('image', 'lessons');
        }
        $lesson->update($data);

        Session::flash('message', __('common::common.edit_message'));
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('lessons.index',$course->id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $lesson = CourseLesson::find($id);
        $lesson->delete();

        Session::flash('message', __('common::common.delete_message'));
        Session::flash('alert-class', 'alert-success');

        return back();
    }
}
