<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $rows = User::query()->where('type' ,1)->where('id','!=',1)->get();
        return view('admin::index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::create');
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
            'email' => 'required|unique:users',
            'password' => 'required',
            'phone' => 'sometimes',
        ]);

        $data['password'] = bcrypt($request->password);
        $user = User::create($data + ['type' => 1]);

        Session::flash('message', __('common::common.add_message'));
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('admins.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $row = User::find($id);
        return view('admin::edit',compact('row'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'password' => 'sometimes',
            'phone' => 'sometimes',
        ]);

        if ($request->has('password') && $request->password !== null){
            $data['password'] = bcrypt($request->password);
        }else{
            $data['password'] = $user->password;
        }
        $user->update($data);

        Session::flash('message', __('common::common.edit_message'));
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('admins.index');
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
        return redirect()->route('admins.index');

    }
}
