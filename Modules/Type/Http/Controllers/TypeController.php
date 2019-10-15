<?php

namespace Modules\Type\Http\Controllers;

use App\Models\LessonsType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $rows = LessonsType::all();
        return view('type::index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('type::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
        ]);
        LessonsType::create([
            'name' => $request->name,
        ]);

        Session::flash('message', __('common::common.add_message'));
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('types.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('type::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $row = LessonsType::find($id);
        return view('type::edit',compact('row'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $type = LessonsType::find($id);
        $data = $request->validate([
            'name' => 'required|max:255',
        ]);
        $type->update([
            'name' => $request->name,
        ]);

        Session::flash('message', __('common::common.edit_message'));
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('types.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $type = LessonsType::find($id);
        $type->delete();

        Session::flash('message', __('common::common.delete_message'));
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('types.index');
    }
}
