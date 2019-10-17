<?php

namespace Modules\Config\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Traits\HelpersTrait;
use DB;
use Session;

class ConfigController extends Controller
{
    use HelpersTrait;

    public function edit()
    {
        $row = DB::table('about_us')->first();
        return view('config::config',compact('row'));
    }

    public function update(Request $request)
    {
        //dd($request->all());
        $data = $request->validate([
            'aboutus_ar_one' => 'required',
            'aboutus_ar_two' => 'required',
            'aboutus_ar_three' => 'required',
            'aboutus_en_one' => 'required',
            'aboutus_en_two' => 'required',
            'aboutus_en_three' => 'required'
        ]);
        $about = DB::table('about_us')->first();
            $aboutUsData = [
                'aboutus_ar_one' => $request->aboutus_ar_one,
                'aboutus_ar_two' => $request->aboutus_ar_two,
                'aboutus_ar_three' => $request->aboutus_ar_three,
                'aboutus_en_one' => $request->aboutus_en_one,
                'aboutus_en_two' => $request->aboutus_en_two,
                'aboutus_en_three' => $request->aboutus_en_three,
            ];

            if($request->has('video')){
                $aboutUsData['video'] =  $this->customUploadFile('video', 'configs');
            }

            if(DB::table('about_us')->first() === null){
                DB::table('about_us')->insert($aboutUsData);
            }else{
                DB::table('about_us')->where('id',1)->update($aboutUsData);
            }

//            $about->update([
//                'aboutus_ar_one' => $request->about_ar_one,
//                'aboutus_ar_two' => $request->about_ar_two,
//                'aboutus_ar_three' => $request->about_ar_three,
//                'aboutus_en_one' => $request->about_en_one,
//                'aboutus_en_two' => $request->about_en_two,
//                'aboutus_en_three' => $request->about_en_three,
//            ]);


        Session::flash('message', __('common::common.edit_message'));
        Session::flash('alert-class', 'alert-success');
        return back();
    }
}
