<?php

namespace Modules\Accent\Http\Controllers;

use App\Models\Accent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class AccentController extends Controller
{

    public function index()
    {
        $rows = Accent::all();
        return view('accent::index',compact('rows'));
    }

    public function create()
    {
        return view('accent::create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
        ]);
        Accent::create([
            'name' => $request->name,
        ]);

        Session::flash('message', __('common::common.add_message'));
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('accents.index');
    }

    public function show($id)
    {
        return view('accent::show');
    }

    public function edit($id)
    {
        $row = Accent::find($id);
        return view('accent::edit',compact('row'));
    }


    public function update(Request $request, $id)
    {
        $accent = Accent::find($id);
        $data = $request->validate([
            'name' => 'required|max:255',
        ]);
        $accent->update([
            'name' => $request->name,
        ]);

        Session::flash('message', __('common::common.edit_message'));
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('accents.index');
    }

    public function destroy($id)
    {
        $accent = Accent::find($id);
        $accent->delete();

        Session::flash('message', __('common::common.delete_message'));
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('accents.index');
    }
}
