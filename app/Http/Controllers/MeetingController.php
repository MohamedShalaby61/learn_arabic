<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Traits\ZoomTrait;
use App\Models\Call;
use App\Models\Student;
use App\Models\Tutor;

class MeetingController extends Controller
{

    use ZoomTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');        
    }

    public function callTutor($id)
    {
        $callRecord = Call::create([
            'student_id' => Auth::user()->fk_id,
            'tutor_id' => $id,
            'join_url' => ''
        ]);
        $authTutor = Tutor::find($id);
        try {
        
            if(empty($authTutor->zoom_id))
            {
                $zoomUser = $this->getUserInfoByEmail(env('ZOOM_ADMIN_EMAIL'));
                $userId      = $zoomUser->id;
            }else{
                $userId = $authTutor->zoom_id;
            }


            $meetingData = [
                'topic' => 'Live call - ' . $callRecord->id,
                'type' => '1',
                'start_time' => '2019-06-16T09:00:00',
                'duration' => '60',
                'timezone' => 'Africa/Cairo',
                'password' => '',
                'agenda' => '',
                'settings' => [
                    'host_video' => 'true',
                    'participant_video' => 'true',
                    'cn_meeting' => 'false',
                    'in_meeting' => 'true',
                    'join_before_host' => 'false',
                    'mute_upon_entry' => 'true',
                    'watermark' => 'false',
                    'use_pmi' => 'false',
                    'approval_type' => '2',
                    'registration_type' => '1',
                    'enforce_login' => 'false',
                    'enforce_login_domains' => 'false',
                    'contact_name' => Auth::user()->name,
                    'contact_email' => Auth::user()->email
                ]
            ];
            $res = $this->createAMeeting($userId, $meetingData);
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong');
        }
            $callRecord->join_url = $res->join_url;
            $callRecord->save();


        return redirect()->away($res->join_url);
    }

    public function acceptCall($studentId)
    {
        $student = Student::find($studentId);
        $authTutor = Tutor::find(auth()->user()->fk_id);

        try {
            
            if(empty($authTutor->zoom_id))
            {
                $zoomUser = $this->getUserInfoByEmail(env('ZOOM_ADMIN_EMAIL'));
                $userId      = $zoomUser->id;
            }else{
                $userId = $authTutor->zoom_id;
            }

            $callRecord = Call::create([
                'student_id' => $student->id,
                'tutor_id' => Auth::user()->fk_id,
                'join_url' => ''
            ]);

            $meetingData = [
                'topic' => 'Live call - ' . $callRecord->id,
                'type' => 1,
    //            'start_time' => '2019-06-16T09:00:00',
    //            'duration' => 60,
                'timezone' => 'Africa/Cairo',
                'password' => '',
                'agenda' => '',
                'settings' => [
                    'host_video' => true,
                    'participant_video' => false,
                    'cn_meeting' => false,
                    'in_meeting' => true,
                    'join_before_host' => true,
                    'mute_upon_entry' => false,
                    'watermark' => false,
                    'use_pmi' => false,
                    'approval_type' => 2,
                    'registration_type' => '1',
                    'enforce_login' => false,
                    'enforce_login_domains' => false,
                    'contact_name' => $student->name,
                    'contact_email' => $student->user->email,
                    'waiting_room' => true
                ]
            ];
            $res = $this->createAMeeting($userId, $meetingData);
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong');
        }
        $callRecord->join_url = $res->join_url;
        $callRecord->save();
        return $res->join_url;
    }
    
    public function test()
    {
//        print_r($this->createUser('ewida.demo@gmail.com', 'Tutor 1'));
        print_r($this->listUsers());
        
//        $userId = 'GocFdEq1Ql2tvn6Yl9XlGg';
//        print_r($this->listMeetings($userId));
        
        //$meetingId = '862898338';
        //print_r($this->getMeetingInfo($meetingId));

        /*$userId      = 'GocFdEq1Ql2tvn6Yl9XlGg';
        $meetingData = [
            'topic' => 'Course 1',
            'type' => '2',
            'start_time' => '2019-06-16T09:00:00',
            'duration' => '60',
            'timezone' => 'Africa/Cairo',
            'password' => '123456',
            'agenda' => 'meeting description',
            'settings' => [
                'host_video' => 'true',
                'participant_video' => 'true',
                'cn_meeting' => 'false',
                'in_meeting' => 'true',
                'join_before_host' => 'true',
                'mute_upon_entry' => 'true',
                'watermark' => 'false',
                'use_pmi' => 'true',
                'approval_type' => '2',
                'registration_type' => '1',
                'enforce_login' => 'false',
                'enforce_login_domains' => 'false'
            ]
        ];
        print_r($this->createAMeeting($userId, $meetingData));*/
    }
}