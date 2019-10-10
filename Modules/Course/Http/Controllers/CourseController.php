<?php

namespace Modules\Course\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Course;

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
        $data =$request->validate([
                   'title'       => 'required|max:255' ,
                   'description' => 'required' ,
                   'cost'        => 'required' ,
                   'image'       => 'max:255' ,
                   'suitable_for'=> 'max:300' ,

                 ]);

        $input = $request->all();
        if($request->hasFile('image')){
            $input['image'] = $request->file('image');
            $allowedfileExtension=['jpg','png'];
            $extension = $input['image']->getClientOriginalExtension();
            $filename =pathinfo($input['image']->getClientOriginalName(), PATHINFO_FILENAME);
            $filename = md5($filename . time()) .'.' . $extension;            
            $check=in_array($extension,$allowedfileExtension);
            if($check){
                $path     = $input['image']->move(public_path("/storage") , $filename);
                $fileURL  = url('/storage/'. $filename);
                $user = User::create($input);
            }

        }

        $course = Course::create($input);

    }

    
    public function show($id)
    {
        return view('course::show');
    }

    
    public function edit($id)
    {
        return view('course::edit');
    }

    
    public function update(Request $request, $id)
    {
        $data =$request->validate([
                   'title'       => 'required|max:255' ,
                   'description' => 'required' ,
                   'cost'        => 'required' ,
                   'image'       => 'max:255' ,
                   'suitable_for'=> 'max:300' ,

                 ]);

        $input = $request->all();
        if($request->hasFile('image')){
            $input['image'] = $request->file('image');
            $allowedfileExtension=['jpg','png'];
            $extension = $input['image']->getClientOriginalExtension();
            $filename =pathinfo($input['image']->getClientOriginalName(), PATHINFO_FILENAME);
            $filename = md5($filename . time()) .'.' . $extension;            
            $check=in_array($extension,$allowedfileExtension);
            if($check){
                $path     = $input['image']->move(public_path("/storage") , $filename);
                $fileURL  = url('/storage/'. $filename);
                $user = User::create($input);
            }

        }

        $course = Course::create($input);

    }

    
    public function destroy($id)
    {
       
    }
}
